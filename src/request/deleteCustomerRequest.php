<?php
	
	use Rodolfo\Customers\Entities\Customer;

	require_once("../slice/connect.php");
	require_once("../Entities/Customer.php"); 
 	require_once("../dao/CustomerDao.php");

 	$id = $_GET['id'];

	$customerDao = new CustomerDao($connect);

	$customerDelete = $customerDao->deleteCustomer($id);

	return $customerDelete;