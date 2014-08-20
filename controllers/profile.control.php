<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author kathiane.050996
 */
class Profile extends Controller {

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from profile");
        $profiles = array();
        foreach ($lines as $line) {
            $profile = new Profile();
            $profile->setIdProfile($line["idProfile"]);
            $profile->setName($line["name"]);
            $profile->setPhoto($line["photo"]);
            $profile->setRegistration($line["registration"]);
            $profile->setReminder($line["reminder"]);
            $profile->setAbout($line["about"]);


            $profiles[] = $profile;
        }
        return $profiles;
    }

    protected function selectOne($profile) {
        $db = new Includes\Db();
        $lines = $db->query('select * from profile where idProfile = :idProfile', array(
            'idProfile' => $profile->getIdProfile(),
        ));
        $profile = new Profile();
        $profile->setIdProfile($lines[0]["idProfile"]);
        $profile->setName($lines[0]["name"]);
        $profile->setPhoto($lines[0]["photo"]);
        $profile->setRegistration($lines[0]["registration"]);
        $profile->setReminder($lines[0]["reminder"]);
        $profile->setAbout($lines[0]["about"]);

        return $profile;
    }

    protected function insert($profile) {
        $db = new Includes\Db();
        return $db->query('insert into profile (idProfile,  name, photo, registration, reminder, about) values 
		(NULL, :name, :photo, :registration, :reminder, :about) ', array(
                    'idProfile' => $profile->getIdProfile(),
                    'name' => $profile->getName(),
                    'photo' => $profile->getPhoto(),
                    'registration' => $profile->getRegistration(),
                    'reminder' => $profile->getReminder(),
                    'about' => $profile->getAbout(),
        ));
    }

    protected function update($profile) {
        $db = new Includes\Db();
        return $db->query('update profile set idProfile = :idProfile,  name = :name, photo = :photo, registration = :registration, reminder = :reminder, about = :about where idProfile = :idProfile', array(
                    'idProfile' => $course->getIdProfile(),
                    'name' => $course->getName(),
                    'photo' => $course->getPhoto(),
                    'registration' => $course->getRegistration(),
                    'reminder' => $course->getReminder(),
                    'about' => $course->getAbout(),
        ));
    }

    protected function delete($profile) {
         $db = new Includes\Db();

        $ret2 = $db->query("delete from profile where IdProfile = :idProfile", array(
            'idProfile' => $profile->getIdProfile(),
        )); // ???? verificar!!!!!

        $ret1 = $db->query("delete from profile where idProfile = :idProfile", array(
            'idProfile' => $profile->getIdProfile(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

//put your code here
}
