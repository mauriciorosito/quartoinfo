<?php

class UserSearch {

    private $idUser;
    private $idCourse;
    private $name;
    private $email;
    private $registration;
    private $about;
    private $courseName;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdCourse() {
        return $this->idCourse;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRegistration() {
        return $this->registration;
    }

    public function getAbout() {
        return $this->about;
    }

    public function getCourseName() {
        return $this->courseName;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdCourse($idCourse) {
        $this->idCourse = $idCourse;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRegistration($registration) {
        $this->registration = $registration;
    }

    public function setAbout($about) {
        $this->about = $about;
    }

    public function setCourseName($courseName) {
        $this->courseName = $courseName;
    }


   
    
}

?>