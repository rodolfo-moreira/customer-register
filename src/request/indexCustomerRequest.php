<?php

	require_once("../slice/connect.php");
	require_once("../Entities/Customer.php"); 
 	require_once("../dao/CustomerDao.php");


	$customerDao = new CustomerDao($connect);

	$customerArray = $customerDao->indexCustomer();

	echo json_encode($customerArray);