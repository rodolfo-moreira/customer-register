<?php

	$store = $_POST;
	echo $store;

	exit;

	class ClientDao(){

		private $conect;

		function __construct($conect){
			$this->conect = $conect;
		}

		function indexClient(){

		}

		function showClient(){

		}

		function storeClient(Client $client){

			$store_cliente = "INSERT INTO clients (nome, email, date_birth, active, created, modified) value ('{$client->getNome()}',{$client->getEmail()},'{$client->getDateBirth()}', {$client->getActive()}, {$client->getCreated()}), {$client->getModified()})";

			$result_store = mysqli_query($conect, $store_cliente);

			return $result_store;
		}

		

		function updateClient(){

		}

		function deleteClient(){

		}
	}