<?php
	
	require_once("../slice/connect.php");
	require_once("../class/Client.php"); 
 	require_once("../dao/ClientDao.php");

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

		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
		$created = $date->format('Y-m-d H:i:s');
		$modified = $date->format('Y-m-d H:i:s');		

		$client = new Client($name, $email, $dateBirth, $active, $created, $modified);
		$clientDao = new ClientDao($connect);

		$clientDao->storeClient($client);

	}
