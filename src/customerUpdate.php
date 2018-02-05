<?php
	require_once("slice/header.php");	
?>

<div class="showAlert"></div>

<form id="editCustomer">

<?php
	require_once("slice/formularioBase.php");
?>

	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTelephone">Adicionar Telefone</button>
	<button type="submit" class="btn btn-success">Editar</button>

</form>

<div class="modal fade" id="modalTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Telefone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-row form-telephone-modal">

		  	<div class="form-group col-md-2">
		      <label for="ddd">DDD</label>
		      <input type="text" class="form-control" id="ddd" name="ddd" placeholder="DDD" required>
		    </div>

		    <div class="form-group col-md-6">
		      <label for="telephone">Telefone</label>
		      <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefone" required>
		    </div>
		    
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary saveTelephone" data-dismiss="modal">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/form.js"></script>
<script src="js/updateCustomer.js"></script>

<?php
	require_once("slice/footer.php");
?>