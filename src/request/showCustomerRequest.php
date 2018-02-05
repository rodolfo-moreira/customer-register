<?php
	
	require_once("../slice/connect.php");
	require_once("../Entities/Customer.php"); 
 	require_once("../dao/CustomerDao.php");

 	$id = $_GET['id'];

	$customerDao = new CustomerDao($connect);

	$customerObject = $customerDao->showCustomer($id);

	echo json_encode($customerObject);