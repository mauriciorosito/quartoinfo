<?php

namespace models;

class Profile {

    private $idProfile;
    private $name;
    private $description;
    private $is_admin;
    private $_Categories;
    
    public function get_Categories() {
        return $this->_Categories;
    }

    public function set_Categories($_Categories) {
        $this->_Categories = $_Categories;
    }

        public function getIdProfile() {
        return $this->idProfile;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getIs_admin() {
        return $this->is_admin;
    }

    public function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
    }


}

?>