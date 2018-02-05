$(document).ready(function () {	
      
   	var request;

   	request = $.ajax({
   		url: "request/indexCustomerRequest.php",
   		type: "GET"

   	});

   	request.done(function(response, textStatus, jqXHR){
         var data = JSON.parse(response);
   		console.log(data);
   		var count = data.length;

   		var html = "";

   		html += '<table class="table">';
		  html += '<thead class="thead-dark">';
		    html += '<tr>';
		      html += '<th scope="col">Nome</th>';
		      html += '<th scope="col">E-mail</th>';
		      html += '<th scope="col">Data de Nascimento</th>';
            html += '<th scope="col">Telefones</th>';
		      html += '<th scope="col">Ativo</th>';
		      html += '<th scope="col">Editar</th>';
		      html += '<th scope="col">Excluir</th>';
		    html += '</tr>';
		  html += '</thead>';

   		html += '<tbody>';

   		for(var i = 0; i < count; i++){
   		html += '<tr>';
		      html += '<td>'+data[i].nome+'</th>';
		      html += '<td>'+data[i].email+'</td>';
		      html += '<td>'+dateBirth(data[i].dateBirth)+'</td>';

            html += '<td>';

            var telephonesArray = data[i].telephones;
            var count2 = telephonesArray.length;
            for(var i2 = 0; i2 < count2; i2++ ){
               html += telephonesArray[i2].ddd+' - '+telephonesArray[i2].telephone+'<br/>';
            }
           

            html += '</td>';		      

            if(data[i].active == 1){
               html += '<td>Ativado</td>';
            }else{
               html += '<td>Desativado</td>';
            }

		      html += '<td><a href="customerUpdate.php?id='+data[i].id+'"><i class="material-icons">mode_edit</i></a></td>';
		      html += '<td><a href="#" class="deleteCustomer" data-id="'+data[i].id+'"><i class="material-icons">delete</i></a></td>';
          
          html += '</tr>';
   		}

   		html += '</tbody>';
   		html += '</table>';

   		$('.bodyList').empty();
   		$('.bodyList').append(html);
   		
   	});

   	request.fail(function(errorThrown, textStatus, jqXHR){
   		  		
   		console.log(errorThrown);
   		console.log(textStatus);
   		console.log(jqXHR);

   		console.log('dosent work');
   	}); 

      $(document).on('click','.deleteCustomer',function(){  

         var element = $(this);
         var id = element.attr("data-id");

         var confirm = window.confirm("Tem certeza que deseja excluir?");
   
         if(confirm){

            var request;

            request = $.ajax({
               url: "request/deleteCustomerRequest.php",
               type: "GET",
               data: { id:id }

            });

            request.done(function(response, textStatus, jqXHR){

               var html = '';

               html += '<div class="alert alert-primary" role="alert">';
                 html += 'Excluído com sucesso!';
               html += '</div>';    

               $('.showAlert').append(html);          

               setTimeout(function(){
                  $('.showAlert').fadeOut(500, function() {
                  $(this).empty().show();
               });
               }, 3000);

               element.parent().parent().remove();
               
            });

            request.fail(function(errorThrown, textStatus, jqXHR){
                     
               console.log(errorThrown);
               console.log(textStatus);
               console.log(jqXHR);

               var html = '';
               html += '<div class="alert alert-danger" role="alert">';
                 html += 'Erro - Por favor tente mais tarde!';
               html += '</div>';    

               $('.showAlert').append(html);          

               setTimeout(function(){
                  $('.showAlert').fadeOut(500, function() {
                  $(this).empty().show();
               });
               }, 3000);
               
            }); 
           
            
         }    
         
         
      });

      function dateBirth(data){
         var date = new Date(data);
         return  date.getDate() + '/' + ("0" + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear()
      }
	

});