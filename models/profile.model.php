<?php
	class Profile {
		private $idProfile;
		private $type;
		private $name;
		private $photo;
		private $registration;
		private $about;

		public function setIdProfile($idProfile){
			$this->idProfile = $idProfile;
		}

		public function getIdProfile(){
			return $this->idProfile;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getType(){
			return $this->type;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getName(){
			return $this->name;
		}

		public function setPhoto($photo){
			$this->photo = $photo;
		}

		public function getPhoto(){
			return $this->photo;
		}

		public function setRegistration($registration){
			$this->registration = $registration;
		}

		public function getRegistration(){
			return $this->registration;
		}

		public function setAbout($about){
			$this->about = $about;
		}

		public function getAbout(){
			return $this->about;
		}
	}
?>