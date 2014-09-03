<?php

namespace models;

class Profile {

    private $idProfile;
    private $name;
    private $description;

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

}

?>