<?php
	class Course {
		private $idCourse;
		private $name;
                private $type;
                private $alias;
                private $description;
                public function getIdCourse() {
                    return $this->idCourse;
                }

                public function getName() {
                    return $this->name;
                }

                public function getType() {
                    return $this->type;
                }

                public function getAlias() {
                    return $this->alias;
                }

                public function getDescription() {
                    return $this->description;
                }

                public function setIdCourse($idCourse) {
                    $this->idCourse = $idCourse;
                }

                public function setName($name) {
                    $this->name = $name;
                }

                public function setType($type) {
                    $this->type = $type;
                }

                public function setAlias($alias) {
                    $this->alias = $alias;
                }

                public function setDescription($description) {
                    $this->description = $description;
                }



	}
?>