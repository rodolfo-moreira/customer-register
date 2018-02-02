<?php
	require_once("slice/header.php");
?>

<form>
  <div class="form-row">

  	<div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Nome">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="E-mail">
    </div>
    
  </div>

  <div class="form-row">

	  <div class="form-group col-md-6">
	    <label for="inputDathBirth">Data de Nascimento</label>
	    <input type="text" class="form-control" id="inputDathBirth" placeholder="11/11/2011">
	  </div>

	  <div class="form-group col-md-6">
	      <label for="inputActive">Ativo</label>
	      <select id="inputActive" class="form-control">
	        <option selected value="0">Selecione...</option>
	        <option value="1">Ativado</option>
	        <option value="2">Desativado</option>
	      </select>
	    </div>

  </div>


  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<?php
	require_once("slice/footer.php");
?>