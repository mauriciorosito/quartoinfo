<?php
	class ContentMedia {
		private $idContentMedia;
		private $isMain;
		private $idContent;
		private $idMedia;

		public function setIdContentMedia($idContentMedia){
			$this->idContentMedia = $idContentMedia;
		}

		public function getIdContentMedia(){
			return $this->idContentMedia;
		}

		public function setIsMain($isMain){
			$this->isMain = $isMain;
		}

		public function getIsMain(){
			return $this->isMain;
		}

		public function setIdContent($idContent){
			$this->idContent = $idContent;
		}

		public function getIdContent(){
			return $this->idContent;
		}

		public function setIdMedia($idMedia){
			$this->idMedia = $idMedia;
		}

		public function getIdMedia(){
			return $this->idMedia;
		}
	}