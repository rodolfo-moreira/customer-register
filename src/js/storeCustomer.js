$(document).ready(function () {
	

    $('#registerCustomer').submit(function (e) {

    	e.preventDefault();

	    var form = this;
	  
	    var data = { };
		$.each($(form).find('.form-base :input').serializeArray(), function() {
		    data[this.name] = this.value;
		});
		

		var formTelephone = $(form).find('.form-telephone');
		var countTell = formTelephone.length;

		var tellArray = [];

		for(var i = 0; i < countTell; i++){

			var inputObj = jQuery(formTelephone[i]);
			var tdObject = jQuery(inputObj[0]);
			var contObject = tdObject.length;

			var c2Array = new Array();

			for (var i8 = 0; i8 < contObject; i8++) {

				var input8 = jQuery(tdObject[i8]);
				
				var input82 = jQuery(input8[0]);
				var dddValue = input82[0].children[0].children[1].value;
				var tellValue = input82[0].children[1].children[1].value;				

				c2Array = { ddd : dddValue, telephone : tellValue};


			}
			
			tellArray[tellArray.length] = c2Array;

		}

	    var body = {
	    	customer: data,
	    	telephones: tellArray
	    }

	   	var request;

	   	request = $.ajax({
	   		url: "request/storeCustomerResquest.php",
	   		type: "POST",
	   		data: body
	   	});

	   	request.done(function(response, textStatus, jqXHR){

	   		$(form).find('.form-base :input').val('');
	   		$(form).find('.form-telephone :input').val('');

	   		var html = '';
	   		html += '<div class="alert alert-primary" role="alert">';
			  html += 'Cadastro Efetuado com sucesso!';
			html += '</div>';		

	   		$('.showAlert').append(html);	   		

	   		setTimeout(function(){
	   			$('.showAlert').fadeOut(500, function() {
				   $(this).empty().show();
				});
	   		}, 3000);
	   		
	   	});

	   	request.fail(function(errorThrown, textStatus, jqXHR){
	   		//console.log('dosent work');
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


	
  	});

});