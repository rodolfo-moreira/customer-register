<?php

	use Rodolfo\Customers\Entities\Customer;

	class CustomerDao{

		private $connect;

		function __construct($connect){
			$this->connect = $connect;
		}

		function indexCustomer(){

			$customers = array();
			$returnCustomers = mysqli_query($this->connect, "SELECT * FROM customers ORDER BY id DESC");

			while($customerArray = mysqli_fetch_assoc($returnCustomers)){

				$id = $customerArray['id'];
				$nome = $customerArray['nome'];
				$email = $customerArray['email'];
				$dateBirth = $customerArray['date_birth'];
				$active = $customerArray['active'];
				$created = $customerArray['created'];
				$modified = $customerArray['modified'];

				$returnTelephones = mysqli_query($this->connect, "SELECT * FROM telephones WHERE id_customer = '{$id}' ORDER BY id DESC");

				$telephones = array();		
				while($telephonesArray = mysqli_fetch_assoc($returnTelephones)){
					$telephones[] = array( "ddd"=>$telephonesArray['ddd'], "telephone"=>$telephonesArray['number_telephone']);
				}
			
				

				$customer = new Customer($id, $nome, $email, $dateBirth, $active, $created, $modified, $telephones);

				array_push($customers, $customer);

			}		

			return $customers;

		}

		function showCustomer($id){

			$returnCustomer = mysqli_query($this->connect, "SELECT * FROM customers WHERE id = '{$id}' ");
			$searchCustomer = mysqli_fetch_assoc($returnCustomer);

			$id = $searchCustomer['id'];
			$nome = $searchCustomer['nome'];
			$email = $searchCustomer['email'];
			$dateBirth = $searchCustomer['date_birth'];
			$active = $searchCustomer['active'];
			$created = $searchCustomer['created'];
			$modified = $searchCustomer['modified'];

			$returnTelephones = mysqli_query($this->connect, "SELECT * FROM telephones WHERE id_customer = '{$id}' ORDER BY id DESC");

			while($telephonesArray = mysqli_fetch_assoc($returnTelephones)){
				$telephones[] = array("id"=>$telephonesArray['id'],"id_customer"=>$telephonesArray['id_customer'],"ddd"=>$telephonesArray['ddd'],"telephone"=>$telephonesArray['number_telephone']);
			}

			$customer = new Customer($id, $nome, $email, $dateBirth, $active, $created, $modified, $telephones);

			return $customer;

		}

		function storeCustomer(Customer $customer){

			$store_customer = "INSERT INTO customers (nome, email, date_birth, active, created, modified) value ('{$customer->getNome()}','{$customer->getEmail()}', '{$customer->getDateBirth()}', {$customer->getActive()}, '{$customer->getCreated()}', '{$customer->getModified()}' )";

			$result_store = mysqli_query($this->connect, $store_customer);

			if ( $result_store === false ) {
			  printf("error: %s\n", mysqli_error($this->connect));
			}
			else {
			  $last_id = $this->connect->insert_id;
			  return $last_id;
			}

		}

		

		function updateCustomer(Customer $customer){

			$updateCustomer = "UPDATE customers SET nome = '{$customer->getNome()}', email = '{$customer->getEmail()}', date_birth = '{$customer->getDateBirth()}', active = {$customer->getActive()}, modified = '{$customer->getModified()}' WHERE id = {$customer->getId()}";
			$resultCustomer = mysqli_query($this->connect, $updateCustomer);
			return $resultCustomer;

		}

		function deleteCustomer($id){
			
			$deleteCustomer = "DELETE FROM customers WHERE id = {$id}";
			return mysqli_query($this->connect, $deleteCustomer);
		}
	}