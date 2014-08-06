<?php
	class Content {
		private $idContent;
		private $publisher;
		private $source;
		private $title;
		private $text;
		private $description;
		private $postDate;
		private $expirationDate;
		private $type;
		private $_Medias;
		private $_Category;

		public function setIdContent($idContent){
			$this->idContent = $idContent;
		}

		public function getIdContent(){
			return $this->idContent;
		}

		public function setPublisher($publisher){
			$this->publisher = $publisher;
		}

		public function getPublisher(){
			return $this->publisher;
		}

		public function setSource($source){
			$this->source = $source;
		}

		public function getSource(){
			return $this->source;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setText($text){
			$this->text = $text;
		}

		public function getText(){
			return $this->text;
		}
		
		public function setDescription($description){
			$this->description = $description;
		}

		public function getDescription(){
			return $this->description;
		}

		public function setPostDate($postDate){
			$date = explode("/",$postDate);
			if(!isset($date[2])){
				$date = explode("-",$postDate);
			}
			$this->postDate = $date[2]."-".$date[1]."-".$date[0];
		}

		public function getPostDate(){
			return $this->postDate;
		}

		public function setExpirationDate($expirationDate){
			$date = explode("/",$expirationDate);
			if(!isset($date[2])){
				$date = explode("-",$expirationDate);
			}
			$this->expirationDate = $date[2]."-".$date[1]."-".$date[0];
		}

		public function getExpirationDate(){
			return $this->expirationDate;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getType(){
			return $this->type;
		}
		
		public function set_Medias($_Medias){
			$this->_Medias = $_Medias;
		}

		public function get_Medias(){
			return $this->_Medias;
		}
		
		public function set_Category($_Category){
			$this->_Category = $_Category;
		}

		public function get_Category(){
			return $this->_Category;
		}
	}