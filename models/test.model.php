<?php
	class Test {
		private $id_user;
		private $name;
		private $age;
		private $_email;

		public function setId_user($id_user){
			$this->id_user = $id_user;
		}

		public function getId_user(){
			return $this->id_user;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getName(){
			return $this->name;
		}

		public function setAge($age){
			$this->age = $age;
		}

		public function getAge(){
			return $this->age;
		}

		public function setEmail($email){
			$this->_email = $email;
		}

		public function getEmail(){
			return $this->_email;
		}
	}
?>