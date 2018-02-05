<?php
	require_once("slice/header.php");	
?>

<div class="showAlert"></div>

<form id="registerCustomer">

<?php
	require_once("slice/formularioBase.php");
?>
 	<button type="button" class="btn btn-info" id="addTelephone">Adicionar Telefone</button>
  	<button type="submit" class="btn btn-success">Cadastrar</button>

</form>
<script src="js/form.js"></script>
<script src="js/storeCustomer.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
<?php
	require_once("slice/footer.php");
?>