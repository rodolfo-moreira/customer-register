<?php
	use Datetime as DT;
	use DateTimeZone as DZ;
	use \Rodolfo\Customers\Entities\Customer;
	
	require_once("../Entities/Customer.php"); 
	require_once("../slice/connect.php");
	require_once("../Entities/Customer.php"); 
 	require_once("../dao/CustomerDao.php");

 	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$dateBirth = $_POST['date_birth'];
	$active = $_POST['active'];

	if($name == ""){

		return "O Campo nome não pode ser enviado em branco";
		exit;

	}else if($email == ""){

		return "O Campo email não pode ser enviado em branco";
		exit;

	}else if($dateBirth == ""){

		return "O Campo Data de Nascimento não pode ser enviado em branco";
		exit;

	}else if($active == "0" || $active == ""){

		return "O Campo Ativo deve ser selecionado";
		exit;

	}else{

		$date = new DT();
		$date->setTimezone(new DZ('America/Sao_Paulo'));
		$modified = $date->format('Y-m-d H:i:s');		

		$customer = new Customer($id, $name, $email, $dateBirth, $active, '', $modified, '');
		$customerDao = new CustomerDao($connect);

		$customerDao->updateCustomer($customer);

	}
