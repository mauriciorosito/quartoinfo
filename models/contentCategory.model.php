<?php 
	class ContentCategory {
		private $idContentCategory;
		private $idCategory;
		private $idContent;

		public function setIdContentCategory($idContentCategory){
			$this->idContentCategory = $idContentCategory;
		}

		public function getIdContentCategory(){
			return $this->idContentCategory;
		}

		public function setIdCategory($idCategory){
			$this->idCategory = $idCategory;
		}

		public function getIdCategory(){
			return $this->idCategory;
		}

		public function setIdContent($idContent){
			$this->idContent = $idContent;
		}

		public function getIdContent(){
			return $this->idContent;
		}
	}
?>