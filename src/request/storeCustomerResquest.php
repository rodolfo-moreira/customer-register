<?php
	
	use Datetime as DT;
	use DateTimeZone as DZ;
	use \Rodolfo\Customers\Entities\Customer;
	use \Rodolfo\Customers\Entities\Telephone;
	
	require_once("../Entities/Customer.php"); 
	require_once("../slice/connect.php");
 	require_once("../Entities/Telephone.php"); 
 	require_once("../dao/TelephoneDao.php");
 	require_once("../dao/CustomerDao.php");

	$name = $_POST['customer']['name'];
	$email = $_POST['customer']['email'];
	$dateBirth = $_POST['customer']['date_birth'];
	$active = $_POST['customer']['active'];

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
		$created = $date->format('Y-m-d H:i:s');
		$modified = $date->format('Y-m-d H:i:s');		

		$customer = new Customer('', $name, $email, $dateBirth, $active, $created, $modified, '');
		$customerDao = new CustomerDao($connect);

		$registerCustomer = $customerDao->storeCustomer($customer);

		if(!$registerCustomer){
			print_r("Erro");
		}else{
			print_r($registerCustomer);

			$telephones = $_POST['telephones'];

			foreach ($telephones as $tell) {

				
				$telephone = new Telephone('', $registerCustomer, $tell['ddd'], $tell['telephone'], 1, $created, $modified);
				$telephoneDao = new TelephoneDao($connect);

				$telephoneDao->storeTelephone($telephone);

				
			}
		}

		

	}
