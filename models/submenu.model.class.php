<?php

class subMenu{
    public $idSubMenu;
    public $title;
    public $type;
    public $description;
    public $idMenu;
    
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
   
}    