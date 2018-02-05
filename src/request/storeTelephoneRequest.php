<?php

	use \Datetime as DT;
	use \DateTimeZone as DZ;
	use \Rodolfo\Customers\Entities\Telephone;

	require_once("../slice/connect.php");
 	require_once("../Entities/Telephone.php"); 
 	require_once("../dao/TelephoneDao.php");

 	$id = $_POST['id'];
	$ddd = $_POST['ddd'];
	$telephone = $_POST['telephone'];

	$date = new DT();
	$date->setTimezone(new DZ('America/Sao_Paulo'));
	$created = $date->format('Y-m-d H:i:s');
	$modified = $date->format('Y-m-d H:i:s');		

	$telephone = new Telephone('', $id, $ddd, $telephone, 1, $created, $modified);
	$telephoneDao = new TelephoneDao($connect);

	$registerTelephone = $telephoneDao->storeTelephone($telephone);

	echo json_encode($telephoneDao->showTelephone($registerTelephone));







