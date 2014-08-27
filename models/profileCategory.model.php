<?php

class ProfileCategory {

    private $idProfile;
    private $idCategory;
    private $permType; //edit, view, add, delete

    public function getIdProfile() {
        return $this->idProfile;
    }

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function getPermType() {
        return $this->permType;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function setPermType($permType) {
        $this->permType = $permType;
    }

}

?>