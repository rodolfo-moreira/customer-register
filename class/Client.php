<?php
	
	class Client {

		private $id;
		private $nome;
		private $email;
		private $dateBirth;
		private $active;
		private $created;
		private $modified;

		function __construct($nome, $email, $dateBirth, $active, $created, $modified) {
			$this->nome = $nome;
			$this->email = $email;
			$this->dateBirth = $dateBirth;
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

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getDateBirth(){
			return $this->dateBirth;
		}

		public function setDateBirth($dateBirth){
			$this->dateBirth = $dateBirth;
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

		
	}