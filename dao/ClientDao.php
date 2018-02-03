<?php

	class ClientDao{

		private $connect;

		function __construct($connect){
			$this->connect = $connect;
		}

		function indexClient(){

		}

		function showClient(){

		}

		function storeClient(Client $client){

			$store_cliente = "INSERT INTO clients (nome, email, date_birth, active, created, modified) value ('{$client->getNome()}','{$client->getEmail()}', '{$client->getDateBirth()}', {$client->getActive()}, '{$client->getCreated()}', '{$client->getModified()}' )";

			$result_store = mysqli_query($this->connect, $store_cliente);

			if ( $result_store === false ) {
			  printf("error: %s\n", mysqli_error($this->connect));
			}
			else {
			  echo 'done.';
			}

		}

		

		function updateClient(){

		}

		function deleteClient(){

		}
	}