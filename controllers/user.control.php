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
include_once("../../models/userSearch.model.php");
include_once("../../controllers/profile.control.php");

class ControllerUser extends Controller {

    public function checkLogin($user) {

        session_start();
        $db = new Includes\Db();
        $line = $db->query("SELECT * FROM user WHERE email=:email OR login=:login", array(
            'email' => $user->getEmail(),
            'login' => $user->getEmail()
        ));

        if ($line[0]['hash'] == $user->getHash()) {
            $_SESSION['idUser'] = $line[0]['idUser'];

            $p = new \models\Profile();
            $p->setIdProfile($line[0]["idProfile"]);
            $cp = new ControllerProfile();
            $profile = $cp->actionControl("selectOne", $p);

            if ($profile->getIs_admin() == 1) {
                $_SESSION['limited'] = 'A';
                header('location: content.list.php');
            } else {
                $_SESSION['limited'] = 'E';
                header('location: student.list.php');
            }
        }
        return false;
    }

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user order by name");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setName($line["name"]);
            $user->setRegistration($line["registration"]);
            $user->setAbout($line["about"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);

            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);

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
        $user->setRegistration($lines[0]["registration"]);
        $user->setAbout($lines[0]["about"]);
        $user->setLogin($lines[0]["login"]);
        $user->setHash($lines[0]["hash"]);
        $user->setReminder($lines[0]["reminder"]);
        $user->setReminderResponse($lines[0]["reminderResponse"]);
        $user->setCanReceiveContent($lines[0]["canReceiveContent"]);

        $course = new Course();
        $course->setIdCourse($user->getIdCourse());
        $controllerCourse = new ControllerCourse();
        $course = $controllerCourse->actionControl('selectOne', $course);

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
        if ($this->verifyExistenceLogin($user) == 0) {
            $db = new Includes\Db();
            return $db->query('insert into user (idUser, idProfile, idCourse, email, name, registration, about, login, hash, reminder, reminderResponse, canReceiveContent) values 
		(NULL, :idProfile, :idCourse, :email, :name, :registration, :about, :login, :hash, :reminder
		, :reminderResponse, :canReceiveContent) ', array(
                        'idProfile' => $user->getIdProfile(),
                        'idCourse' => $user->getIdCourse(),
                        'email' => $user->getEmail(),
                        'name' => $user->getName(),
                        'registration' => $user->getRegistration(),
                        'about' => $user->getAbout(),
                        'login' => $user->getLogin(),
                        'hash' => $user->getHash(),
                        'reminder' => $user->getReminder(),
                        'reminderResponse' => $user->getReminderResponse(),
                        'canReceiveContent' => $user->getCanReceiveContent(),
            ));
        } else {
            return false;
        }
    }

    protected function update($user) {
        $db = new Includes\Db();
        return $db->query('update user set idProfile = :idProfile, idCourse = :idCourse, email = :email, name = :name, registration = :registration, about = :about, login = :login
		, hash =  :hash, reminder =  :reminder, reminderResponse = :reminderResponse
		, canReceiveContent = :canReceiveContent where idUser = :idUser', array(
                    'idProfile' => $user->getIdProfile(),
                    'idCourse' => $user->getIdCourse(),
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'registration' => $user->getRegistration(),
                    'about' => $user->getAbout(),
                    'login' => $user->getLogin(),
                    'hash' => $user->getHash(),
                    'reminder' => $user->getReminder(),
                    'reminderResponse' => $user->getReminderResponse(),
                    'canReceiveContent' => $user->getCanReceiveContent(),
                    'idUser' => $user->getIdUser()
        ));
    }

    protected function verifyExistenceLogin($user) {
        $db = new Includes\Db();
        $lines = $db->query("select count(*) as qtde from user where login = :login or email = :email ", array(
            'login' => $user->getLogin(),
            'email' => $user->getEmail(),
        ));

        return $lines[0]["qtde"];
    }

    protected function updatePassword($user) {
        $db = new Includes\Db();
        return $db->query('update user set hash =  :hash where idUser = :idUser', array(
                    'hash' => $user->getHash(), 'idUser' => $user->getIdUser()
        ));
    }

    protected function generatePassword() {
        $new_password = uniqid(rand());
        $new_password = substr($new_password, 0, 7);
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

        $ret1 = $db->query("delete from user where idUser = :idUser", array(
            'idUser' => $user->getIdUser(),
        ));

        if ($ret1) {
            return true;
        } else {
            return false;
        }
    }

    protected function selectAllGrowing($search) {
        $db = new Includes\Db();

        if ($search != "") {
            $search = "where "
                    . "name like '%" . $search . "%' "
                    . "or registration like '%" . $search . "%' "
                    . "or courseName like '%" . $search . "%' ";
        }

        $lines = $db->query("select * from userSearch " . $search . " order by name");
        /*
         * create view userSearch as 
          select u.idUser, u.name, u.idCourse, u.email, u.about, u.registration, c.name as courseName
          from user u
          join course c on c.idCourse = u.idCourse
          join profile p on p.idProfile = u.idProfile
          where p.is_admin = 0
         */
        $users = array();
        foreach ($lines as $line) {
            $userSearch = new UserSearch();
            $userSearch->setIdUser($line["idUser"]);
            $userSearch->setIdCourse($line["idCourse"]);
            $userSearch->setCourseName($line["courseName"]);
            $userSearch->setEmail($line["email"]);
            $userSearch->setName($line["name"]);
            $userSearch->setRegistration($line["registration"]);
            $userSearch->setAbout($line["about"]);
            $users[] = $userSearch;
        }

        return $users;
    }

    protected function selectAllDescending($search) {
        $db = new Includes\Db();

        if ($search != "") {
            $search = "where "
                    . "name like '%" . $search . "%' "
                    . "or registration like '%" . $search . "%' "
                    . "or courseName like '%" . $search . "%' ";
        }

        $lines = $db->query("select * from userSearch order by name desc");
        $users = array();
        foreach ($lines as $line) {
            $userSearch = new UserSearch();
            $userSearch->setIdUser($line["idUser"]);
            $userSearch->setIdCourse($line["idCourse"]);
            $userSearch->setCourseName($line["courseName"]);
            $userSearch->setEmail($line["email"]);
            $userSearch->setName($line["name"]);
            $userSearch->setRegistration($line["registration"]);
            $userSearch->setAbout($line["about"]);
            $users[] = $userSearch;
        }

        return $users;
    }

    protected function selectPagination($pag) {
        $db = new Includes\Db();
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from userSearch ";
        if (isset($pag['pesquisa'])) {
            $sql = "select * from userSearch where name like '%" . $pag['pesquisa'] . "%' or registration like '%" . $pag['pesquisa'] . "%' or courseName like '%" . $pag['pesquisa'] . "%'";
        }
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY name asc ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY name " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        
        $lines = $db->query($sql);
        $users = array();
        foreach ($lines as $line) {
            $userSearch = new UserSearch();
            $userSearch->setIdUser($line["idUser"]);
            $userSearch->setIdCourse($line["idCourse"]);
            $userSearch->setCourseName($line["courseName"]);
            $userSearch->setEmail($line["email"]);
            $userSearch->setName($line["name"]);
            $userSearch->setRegistration($line["registration"]);
            $userSearch->setAbout($line["about"]);
            $users[] = $userSearch;
        }
        return $users;
    }

    protected function countPages($limit) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limit . ") as pages FROM userSearch");
        return ceil($lines[0]['pages']);
    }

    protected function countPagesWithSearch($pesquisa) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ 5 ) as pages FROM userSearch where name like '%" . $pesquisa . "%' or registration like '%" . $pesquisa . "%' or courseName like '%" . $pesquisa . "%'");
        return ceil($lines[0]['pages']);
    }

}
