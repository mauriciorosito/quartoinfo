<?php

class Menu{
    public $idMenu;
    public $title;
    public $localization;
    public $description;
    
    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getLocalization() {
        return $this->localization;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setLocalization($localization) {
        $this->localization = $localization;
    }

    public function setDescription($description) {
        $this->description = $description;
    }



}

