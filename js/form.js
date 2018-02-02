$(document).on('click', '#addTelephone', function(){

	var renderForm = renderTelefoneForm();
	$('.formTelephone').append(renderForm);
});

function renderTelefoneForm(){
	
	var html = '';

	html += '<div class="form-row">';

		html += '<div class="form-group col-md-2 form-telephone">';
		  html += '<label for="ddd">DDD</label>';
		  html += '<input type="text" class="form-control" id="ddd" name="ddd" placeholder="DDD">';
		html += '</div>';

		html += '<div class="form-group col-md-6 form-telephone">';
		  html += '<label for="telephone">Telefone</label>';
		  html += '<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefone">';
		html += '</div>';

		html += '<div class="col-md-2 iconForm">';
		  html += '<a href="#" onclick="removeTel(this)"><i class="material-icons">delete</i></a>';
		html += '</div>';

	html += '</div>';

	return html;
}

function removeTel(btn){

	var row = btn.parentNode.parentNode;
  	row.parentNode.removeChild(row);

}


$(document).ready(function () {
	

    $('#registerClient').submit(function (e) {

    	e.preventDefault();

	    var form = this;
	    var data = $(form).find('.form-base :input');
	    var dataTelephone = $(form).find('.form-telephone :input');

	    console.log(data.serialize());

	   	var request;

	   	request = $.ajax({
	   		url: "validate/clientValidate.php",
	   		type: "POST",
	   		data: data
	   	});

	   	request.done(function(response, textStatus, jqXHR){
	   		console.log('work');
	   		console.log(response);
	   		console.log(textStatus);
	   		console.log(jqXHR);
	   	});

	   	request.fail(function(errorThrown, textStatus, jqXHR){
	   		console.log('doesnt work');
	   		console.log(errorThrown);
	   		console.log(textStatus);
	   		console.log(jqXHR);
	   	});


	
  	});

});