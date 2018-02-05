<?php

	namespace Rodolfo\Customers\Entities;
	
	class Telephone implements \JsonSerializable{

		private $id;
		private $id_customer;
		private $ddd;
		private $number;
		private $active;
		private $created;
		private $modified;

		function __construct($id, $id_customer, $ddd, $number, $active, $created, $modified) {
			$this->id = $id;
			$this->id_customer = $id_customer;
			$this->ddd = $ddd;
			$this->number = $number;
			$this->active = $active;
			$this->created = $created;
			$this->modified = $modified;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getIdCustomer(){
			return $this->id_customer;
		}

		public function setIdCustomer($id_customer){
			$this->id_customer = $id_customer;
		}

		public function getDdd(){
			return $this->ddd;
		}

		public function setDdd($ddd){
			$this->ddd = $ddd;
		}

		public function getNumber(){
			return $this->number;
		}

		public function setNumber($number){
			$this->number = $number;
		}

		public function getActive(){
			return $this->active;
		}

		public function setActive($active){
			$this->active = $active;
		}

		public function getCreated(){
			return $this->created;
		}
		
		public function setCreated($created){
			$this->created = $created;
		}

		public function getModified(){
			return $this->modified;
		}
		
		public function setModified($modified){
			$this->modified = $modified;
		}

		public function jsonSerialize(){
	        $vars = get_object_vars($this);
	        return $vars;
	    }

		
	}