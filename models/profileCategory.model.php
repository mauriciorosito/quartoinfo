<?php

class ProfileCategory {
    
    private $idProfileCategory;
    private $idProfile;
    private $idCategory;
    private $permType; //edit, view, add, delete
    
    public function getIdProfileCategory() {
        return $this->idProfileCategory;
    }

    public function setIdProfileCategory($idProfileCategory) {
        $this->idProfileCategory = $idProfileCategory;
    }
    
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