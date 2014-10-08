<?php

class subMenu{
    public $idSubMenu;
    public $title;
    public $type;
    public $description;
    public $idMenu;
    public $url;
    public $idCategory;
    public $position;
    public $idPage;
    
    public function getIdPage() {
        return $this->idPage;
    }

    public function setIdPage($idPage) {
        $this->idPage = $idPage;
    }

        public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

        public function getIdSubMenu() {
        return $this->idSubMenu;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getIdMenu() {
        return $this->idMenu;
    }

    public function setIdSubMenu($idSubMenu) {
        $this->idSubMenu = $idSubMenu;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }


}    