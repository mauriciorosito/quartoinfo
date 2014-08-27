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
    private $name;
    private $photo;
    private $registration;
    private $about;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdProfile() {
        return $this->idProfile;
    }

    public function getIdCourse() {
        return $this->idCourse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getHash() {
        return $this->hash;
    }

    public function getReminder() {
        return $this->reminder;
    }

    public function getReminderResponse() {
        return $this->reminderResponse;
    }

    public function getCanReceiveContent() {
        return $this->canReceiveContent;
    }

    public function getType() {
        return $this->type;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getRegistration() {
        return $this->registration;
    }

    public function getAbout() {
        return $this->about;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

    public function setIdCourse($idCourse) {
        $this->idCourse = $idCourse;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setHash($hash) {
        $this->hash = $hash;
    }

    public function setReminder($reminder) {
        $this->reminder = $reminder;
    }

    public function setReminderResponse($reminderResponse) {
        $this->reminderResponse = $reminderResponse;
    }

    public function setCanReceiveContent($canReceiveContent) {
        $this->canReceiveContent = $canReceiveContent;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setRegistration($registration) {
        $this->registration = $registration;
    }

    public function setAbout($about) {
        $this->about = $about;
    }
    
}