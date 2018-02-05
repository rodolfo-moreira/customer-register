$(document).on('click', '#addTelephone', function(){

	var renderForm = renderTelefoneForm();
	$('.formTelephone').append(renderForm);
});

function renderTelefoneForm(){
	
	var html = '';

	html += '<div class="form-row form-telephone">';

		html += '<div class="form-group col-md-2">';
		  html += '<label for="ddd">DDD</label>';
		  html += '<input type="text" class="form-control" id="ddd" name="ddd" placeholder="DDD" >';
		html += '</div>';

		html += '<div class="form-group col-md-6">';
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


