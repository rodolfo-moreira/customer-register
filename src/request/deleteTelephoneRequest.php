<?php
	
	require_once("../slice/connect.php");
	require_once("../Entities/Telephone.php"); 
 	require_once("../dao/TelephoneDao.php");

 	$id = $_GET['id'];

	$telephoneDao = new TelephoneDao($connect);

	$telephoneDelete = $telephoneDao->deleteTelephone($id);

	return $telephoneDelete;