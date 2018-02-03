<?php
	require_once("slice/header.php");
?>

<form id="registerClient">
  <div class="form-row">

  	<div class="form-group col-md-6 form-base">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
      <div class="valid-feedback">
        Ok!
      </div>
    </div>

    <div class="form-group col-md-6 form-base">
      <label for="email">Email</label>
      <input type="email" class="form-control"  id="email" name="email" placeholder="E-mail" required>
    </div>
    
  </div>

  <div class="form-row">

	  <div class="form-group col-md-6 form-base">
	    <label for="date_birth">Data de Nascimento</label>
	    <input type="date" class="form-control" id="date_birth" name="date_birth" placeholder="11/11/2011" required>
	  </div>

	  <div class="form-group col-md-6 form-base">
	      <label for="active">Ativo</label>
	      <select id="active" name="active" class="form-control" required>
	        <option selected value="">Selecione...</option>
	        <option value="1">Ativado</option>
	        <option value="2">Desativado</option>
	      </select>
	    </div>

  </div>

  <div class="formTelephone">

	  <div class="form-row form-telephone">

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

  <button type="button" class="btn btn-info" id="addTelephone">Adicionar Telefone</button>

  <button type="submit" class="btn btn-success">Cadastrar</button>

</form>
	
<script src="js/form.js"></script>

<?php
	require_once("slice/footer.php");
?>