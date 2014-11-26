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
                    $idCourse = filter_var($idCourse, FILTER_SANITIZE_STRING);
                    $this->idCourse = $idCourse;
                }

                public function setName($name) {
                    $name = filter_var($name, FILTER_SANITIZE_STRING);
                    $this->name = $name;
                }

                public function setType($type) {
                    $type = filter_var($type, FILTER_SANITIZE_STRING);
                    $this->type = $type;
                }

                public function setAlias($alias) {
                    $alias = filter_var($alias, FILTER_SANITIZE_STRING);
                    $this->alias = $alias;
                }

                public function setDescription($description) {
                    $description = filter_var($description, FILTER_SANITIZE_STRING);
                    $this->description = $description;
                }



	}
?>