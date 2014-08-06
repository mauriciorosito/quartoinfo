<?php
	class Category {
		private $idCategory;
		private $name;
		private $type;

		public function setIdCategory($idCategory){
			$this->idCategory = $idCategory;
		}

		public function getIdCategory(){
			return $this->idCategory;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getName(){
			return $this->name;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getType(){
			return $this->type;
		}
	}
?>