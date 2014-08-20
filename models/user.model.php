<?php

class User {

    private $idUser;
    private $idProfile;
    private $idCourse;
    private $email;
    private $login;
    private $hash;
    private $reminder;
    private $reminderResponse;
    private $canReceiveContent;
    private $type;
   

    
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

    public function getIdProfile() {
        return $this->idProfile;
    }

    public function setIdCourse($idCourse) {
        $this->idCourse = $idCourse;
    }

    public function getIdCourse() {
        return $this->idCourse;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setHash($hash) {
        $this->hash = $hash;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setReminder($reminder) {
        $this->reminder = $reminder;
    }

    public function getReminder() {
        return $this->reminder;
    }

    public function setReminderResponse($reminderResponse) {
        $this->reminderResponse = $reminderResponse;
    }

    public function getReminderResponse() {
        return $this->reminderResponse;
    }

    public function setCanReceiveContent($canReceiveContent) {
        $this->canReceiveContent = $canReceiveContent;
    }

    public function getCanReceiveContent() {
        return $this->canReceiveContent;
    }

}

?>