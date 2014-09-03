<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author kathiane.050996
 */
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/user.model.php");
include_once("../../models/profile.model.php");
include_once("../../models/user.model.php");
include_once("../../controllers/profile.control.php");

class ControllerUser extends Controller {

    public function checkLogin($user) {

        session_start();
        $db = new Includes\Db();
        $line = $db->query("SELECT * FROM user WHERE email=:email", array(
            'email' => $user->getEmail(),
        ));

        if ($line[0]['hash'] == $user->getHash()) {
            $_SESSION['idUser'] = $line[0]['idUser'];
            
            $p = new Profile();
            $p->setIdProfile($line[0]["idProfile"]);
            $cp = new ControllerProfile();
            $profile = $cp->actionControl("selectOne", $p);
            
            if ($profile->getIs_admin() == 1) {
                $_SESSION['limited'] = 'A';
                header('location: content.list.php');
            } else{
                $_SESSION['limited'] = 'E';
                header('location: estudante.php');
            }
        } 
        return false;
    }

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setName($line["name"]);
            $user->setPhoto($line["photo"]);
            $user->setRegistration($line["registration"]);
            $user->setAbout($line["about"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);


            $profile = new Profile();
            $profile->setIdProfile($user->getIdUser());
            $controllerProfile = new ControllerProfile();
            $profile = $controllerProfile->actionControl('selectOne', $profile);
            //$content->set_Medias($contentMedia);


            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);
            //$contentCategory->set_Category($contentCategory);

            $users[] = $user;
        }
        return $users;
    }

    protected function selectOne($user) {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where idUser = :idUser", array(
            'idUser' => $user->getIdUser(),
        ));
        $user = new User();
        $user->setIdUser($lines[0]["idUser"]);
        $user->setIdProfile($lines[0]["idProfile"]);
        $user->setIdCourse($lines[0]["idCourse"]);
        $user->setEmail($lines[0]["email"]);
        $user->setName($lines[0]["name"]);
        $user->setPhoto($lines[0]["photo"]);
        $user->setRegistration($lines[0]["registration"]);
        $user->setAbout($lines[0]["about"]);
        $user->setLogin($lines[0]["login"]);
        $user->setHash($lines[0]["hash"]);
        $user->setReminder($lines[0]["reminder"]);
        $user->setReminderResponse($lines[0]["reminderResponse"]);
        $user->setCanReceiveContent($lines[0]["canReceiveContent"]);
        $user->setType($lines[0]["type"]);


        $profile = new Profile();
        $profile->setIdProfile($user->getIdUser());
        $controllerProfile = new ControllerProfile();
        $profile = $controllerProfile->actionControl('selectOne', $profile);
        //$content->set_Medias($contentMedia);


        $course = new Course();
        $course->setIdCourse($user->getIdCourse());
        $controllerCourse = new ControllerCourse();
        $course = $controllerCourse->actionControl('selectOne', $course);
        //$contentCategory->set_Category($contentCategory);

        return $user;
    }

    protected function selectByProfile($user) {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where idProfile = :idProfile", array(
            'idProfile' => $user->getIdProfile(),
        ));
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setName($line["name"]);
            $user->setPhoto($line["photo"]);
            $user->setRegistration($line["registration"]);
            $user->setAbout($line["about"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);

            $users[] = $user;
        }

        return $users;
    }

    protected function insert($user) {
        $db = new Includes\Db();
        return $db->query('insert into user (idUser, idProfile, idCourse, email, name, photo, registration, about, login, hash, reminder, reminderResponse, canReceiveContent, type) values 
		(NULL, :idProfile, :idCourse, :email, :login, :hash, :reminder
		, :reminderResponse, :canReceiveContent, :type) ', array(
                    'idProfile' => $user->getIdProfile(),
                    'idCourse' => $user->getIdCourse(),
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'photo' => $user->getPhoto(),
                    'registration' => $user->getRegistration(),
                    'about' => $user->getAbout(),
                    'login' => $user->getLogin(),
                    'hash' => $user->getHash(),
                    'reminder' => $user->getReminder(),
                    'reminderResponse' => $user->getReminderResponse(),
                    'canReceiveContent' => $user->getCanReceiveContent(),
                    'type' => $user->getType(),
        ));
    }

    protected function update($user) {
        $db = new Includes\Db();
        return $db->query('update user set idProfile = :idProfile, idCourse = :idCourse, email = :email, name = :name, photo = :photo, registration = :registration, about = :about, login = :login
		, hash =  :hash, reminder =  :reminder, reminderResponse = :reminderResponse
		, canReceiveContent = :canReceiveContent, type = :type where idUser = :idUser', array(
                    'idProfile' => $user->getIdProfile(),
                    'idCourse' => $user->getIdCourse(),
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'photo' => $user->getPhoto(),
                    'registration' => $user->getRegistration(),
                    'about' => $user->getAbout(),
                    'login' => $user->getLogin(),
                    'hash' => $user->getHash(),
                    'reminder' => $user->getReminder(),
                    'reminderResponse' => $user->getReminderResponse(),
                    'canReceiveContent' => $user->getCanReceiveContent(),
                    'type' => $user->getType(),
        ));
    }

    protected function updatePassword($user) {
        $db = new Includes\Db();
        return $db->query('update user set hash =  :hash, where idUser = :idUser', array(
                    'hash' => $user->getHash(),
        ));
    }

    protected function generatePassword() {
        $new_password = uniqid(rand());
        return $new_password;
    }

    protected function checkEmail($email) {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where email = :email", array(
            'email' => $email,
        ));
        if (isset($lines[0]["idUser"])) {
            $user = new User();
            $user->setIdUser($lines[0]["idUser"]);
            return $user;
        } else {
            return false;
        }
    }

    protected function delete($user) {
        $db = new Includes\Db();

        $ret2 = $db->query("delete from profile where IdPrfile = :idUser", array(
            'idUser' => $user->getIdUser(),
        )); // ???? verificar!!!

        $ret1 = $db->query("delete from user where idUser = :idUser", array(
            'idUser' => $user->getIdUser(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

}
