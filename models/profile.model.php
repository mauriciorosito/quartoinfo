<?php

class Profile {

    private $idProfile;
    private $name;
    private $is_admin;
    private $can_edit;
    private $can_view;
    private $can_create;
    private $can_delete;
    
    public function getIdProfile() {
        return $this->idProfile;
    }

    public function getName() {
        return $this->name;
    }

    public function getIs_admin() {
        return $this->is_admin;
    }

    public function getCan_edit() {
        return $this->can_edit;
    }

    public function getCan_view() {
        return $this->can_view;
    }

    public function getCan_create() {
        return $this->can_create;
    }

    public function getCan_delete() {
        return $this->can_delete;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
    }

    public function setCan_edit($can_edit) {
        $this->can_edit = $can_edit;
    }

    public function setCan_view($can_view) {
        $this->can_view = $can_view;
    }

    public function setCan_create($can_create) {
        $this->can_create = $can_create;
    }

    public function setCan_delete($can_delete) {
        $this->can_delete = $can_delete;
    }
    
}