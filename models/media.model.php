<?php
	class Media {
		private $idFile;
		private $name;
		private $path;
		private $attachment;
		private $type;
		private $is_restrict;
		private $description;

		public function setIdMedia($idFile){
			$this->idFile = $idFile;
		}

		public function getIdMedia(){
			return $this->idFile;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getName(){
			return $this->name;
		}

		public function setPath($path){
			$this->path = $path;
		}

		public function getPath(){
			return $this->path;
		}

		public function setAttachment($attachment){
			$this->attachment = $attachment;
		}

		public function getAttachment(){
			return $this->attachment;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getType(){
			return $this->type;
		}

		public function setRestrict($is_restrict){
			$this->is_restrict = $is_restrict;
		}

		public function getRestrict(){
			return $this->is_restrict;
		}

		public function setDescription($description){
			$this->description = $description;
		}

		public function getDescription(){
			return $this->description;
		}
	}
?>