$(document).ready(function () {	

     $(document).on('click','.deleteTel',function(e){ 

         e.preventDefault(); 

         var idTelephone = $(this).attr("data-id");

         var confirm = window.confirm("Tem certeza que deseja excluir?");
   
         if(confirm){

            console.log(idTelephone);

            var request;

            request = $.ajax({
               url: "request/deleteTelephoneRequest.php",
               type: "GET",
               data: { id:idTelephone }

            });

            request.done(function(response, textStatus, jqXHR){

                location.reload();
                               
            });

            request.fail(function(errorThrown, textStatus, jqXHR){
                
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

                console.log(errorThrown);
                console.log(textStatus);
                console.log(jqXHR);               
            }); 
           
            $(this).parent().parent().remove();
         }    
         
         
      });

   function justDate(data){
      var date = new Date(data);
      return date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-' + date.getDate()
   }

   var getUrlParameter = function getUrlParameter(sParam) {
       var sPageURL = decodeURIComponent(window.location.search.substring(1)),
           sURLVariables = sPageURL.split('&'),
           sParameterName,
           i;

       for (i = 0; i < sURLVariables.length; i++) {
           sParameterName = sURLVariables[i].split('=');

           if (sParameterName[0] === sParam) {
               return sParameterName[1] === undefined ? true : sParameterName[1];
           }
       }
   };

   var id = getUrlParameter('id');

   var request;

   request = $.ajax({
      url: "request/showCustomerRequest.php",
      type: "GET",
      data: {id: id}

   });

   request.done(function(response, textStatus, jqXHR){

      var data = JSON.parse(response);
      console.log(data);

      var date_birth = justDate(data.dateBirth);
      $('#editCustomer').append('<div class="form-group form-base"><input type="hidden" id="id" name="id" value="'+id+'"></div>');
      $('#name').val(data.nome);
      $('#email').val(data.email);
      $('#date_birth').val(date_birth);
      $('#active').val(data.active);

      $('.formTelephone').empty();

      var telephones = data.telephones;
      var count = telephones.length;

      var html = '';

      for(var i = 0; i < count; i++){

        html += '<div class="form-row form-telephone">';

          html += '<div class="form-group">';
            html += '<input type="hidden" id="id" name="id" value="'+telephones[i].id+'">';
          html += '</div>';

          html += '<div class="form-group">';
            html += '<input type="hidden" id="id_customer" name="id_customer" value="'+telephones[i].id_customer+'">';
          html += '</div>';

          html += '<div class="form-group col-md-2">';
            html += '<label for="ddd">DDD</label>';
            html += '<input type="text" class="form-control" id="ddd" name="ddd" placeholder="DDD" value="'+telephones[i].ddd+'" readonly>';
          html += '</div>';

          html += '<div class="form-group col-md-6">';
            html += '<label for="telephone">Telefone</label>';
            html += '<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefone" value="'+telephones[i].telephone+'" readonly>';
          html += '</div>';

          if(count == 1){            

          }else{

            html += '<div class="col-md-2 iconForm">';
              html += '<a href="#" class="deleteTel" data-id="'+telephones[i].id+'"><i class="material-icons">delete</i></a>';
            html += '</div>';

          }

          
          
        html += '</div>';
      }

      $('.formTelephone').append(html);

      
              
      
   });

   request.fail(function(errorThrown, textStatus, jqXHR){
      
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

      console.log(errorThrown);
      console.log(textStatus);
      console.log(jqXHR);

      console.log('dosent work');
   });
   
   $('#editCustomer').submit(function (e) {

      e.preventDefault();

       var form = this;
       var data = $(form).find('.form-base :input');

       console.log(data);

         var request;

         request = $.ajax({
            url: "request/updateCustomerRequest.php",
            type: "POST",
            data: data.serialize()
         });

         request.done(function(response, textStatus, jqXHR){
            
            var html = '';

            html += '<div class="alert alert-primary" role="alert">';
              html += 'Editado com sucesso!';
            html += '</div>';   

            $('.showAlert').append(html);       

            setTimeout(function(){
              $('.showAlert').fadeOut(500, function() {
               $(this).empty().show();
            });
            }, 3000);

         });

         request.fail(function(errorThrown, textStatus, jqXHR){
            
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

            console.log(errorThrown);
            console.log(textStatus);
            console.log(jqXHR);
         });


   
   });

   $(document).on('click','.saveTelephone',function(e){
      
      var form = $(this);
      var dataTelephone = $(this).parents().find('.form-telephone-modal :input').serialize();
      var data = dataTelephone+'&id='+id;
      var request;

       request = $.ajax({
          url: "request/storeTelephoneRequest.php",
          type: "POST",
          data: data
       });

       request.done(function(response, textStatus, jqXHR){

          location.reload();
          
          /*var html = '';

            html += '<div class="alert alert-primary" role="alert">';
              html += 'Telefone adicionado com sucesso!';
            html += '</div>';   

            $('.showAlert').append(html);       

            setTimeout(function(){
              $('.showAlert').fadeOut(500, function() {
               $(this).empty().show();
            });
            }, 3000);


          form.parents().find('.form-telephone-modal :input').val("");

          var dataTelephone = JSON.parse(response);
          var html = '';


            html += '<div class="form-row form-telephone">';

              html += '<div class="form-group">';
                html += '<input type="hidden" id="id" name="id" value="'+dataTelephone.id+'">';
              html += '</div>';

              html += '<div class="form-group">';
                html += '<input type="hidden" id="id_customer" name="id_customer" value="'+dataTelephone.id_customer+'">';
              html += '</div>';

              html += '<div class="form-group col-md-2">';
                html += '<label for="ddd">DDD</label>';
                html += '<input type="text" class="form-control" id="ddd" name="ddd" placeholder="DDD" value="'+dataTelephone.ddd+'" readonly>';
              html += '</div>';

              html += '<div class="form-group col-md-6">';
                html += '<label for="telephone">Telefone</label>';
                html += '<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefone" value="'+dataTelephone.number+'" readonly>';
              html += '</div>';
              
              html += '<div class="col-md-2 iconForm">';
                html += '<a href="#" class="deleteTel" data-id="'+dataTelephone.id+'"><i class="material-icons">delete</i></a>';
              html += '</div>';

            html += '</div>';
          

          $('.formTelephone').append(html);*/


       });

       request.fail(function(errorThrown, textStatus, jqXHR){
          
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

          console.log('dosent work');
          console.log(errorThrown);
          console.log(textStatus);
          console.log(jqXHR);
       });

   });
   

});