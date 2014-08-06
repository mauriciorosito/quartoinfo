<?php
	class Course {
		private $idCourse;
		private $name;

		public function setIdCourse($idCourse){
			$this->idCourse = $idCourse;
		}

		public function getIdCourse(){
			return $this->idCourse;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getName(){
			return $this->name;
		}
	}
?>