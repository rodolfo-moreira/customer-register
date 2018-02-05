<?php
	
	use Rodolfo\Customers\Entities\Telephone;

	class TelephoneDao{

		private $connect;

		function __construct($connect){
			$this->connect = $connect;
		}

		function showTelephone($id){

			$returnTelephone = mysqli_query($this->connect, "SELECT * FROM telephones WHERE id = '{$id}' ");
			$searchTelephone = mysqli_fetch_assoc($returnTelephone);

			$id = $searchTelephone['id'];
			$id_customer = $searchTelephone['id_customer'];
			$ddd = $searchTelephone['ddd'];
			$telephone = $searchTelephone['number_telephone'];
			$active = $searchTelephone['active'];
			$created = $searchTelephone['created'];
			$modified = $searchTelephone['modified'];

			$telephone = new Telephone($id, $id_customer, $ddd, $telephone, $active, $created, $modified);

			return $telephone;

		}

		function showTelephoneCustomer($id){

			$returnTelephone = mysqli_query($this->connect, "SELECT * FROM telephones WHERE id_customer = '{$id}' ");
			$searchTelephone = mysqli_fetch_assoc($returnTelephone);

			$id = $searchTelephone['id'];
			$id_customer = $searchTelephone['id_customer'];
			$ddd = $searchTelephone['ddd'];
			$telephone = $searchTelephone['number_telephone'];
			$active = $searchTelephone['active'];
			$created = $searchTelephone['created'];
			$modified = $searchTelephone['modified'];

			$telephone = new Telephone($id, $id_customer, $ddd, $telephone, $active, $created, $modified);

			return $telephone;

		}

		function storeTelephone(Telephone $telephone){

			$store_telephone = "INSERT INTO telephones (id_customer, ddd, number_telephone, active, created, modified) value ({$telephone->getIdCustomer()}, {$telephone->getDdd()}, {$telephone->getNumber()}, {$telephone->getActive()}, '{$telephone->getCreated()}', '{$telephone->getModified()}' )";

			$result_store = mysqli_query($this->connect, $store_telephone);

			if ( $result_store === false ) {
			  printf("error: %s\n", mysqli_error($this->connect));
			}
			else {
			  $last_id = $this->connect->insert_id;
			  return $last_id;
			}

		}

		
		function deleteTelephone($id){
			
			$deleteTelephone = "DELETE FROM telephones WHERE id = {$id}";
			return mysqli_query($this->connect, $deleteTelephone);
		}
	}