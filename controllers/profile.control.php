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
            $profile->setIs_admin($line["is_admin"]);
            $profile->setCan_edit($line["can_edit"]);
            $profile->setCan_view($line["can_view"]);
            $profile->setCan_create($line["can_create"]);
            $profile->setCan_delete($line["can_delete"]);

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
        $profile->setIs_admin($lines[0]["is_admin"]);
        $profile->setCan_edit($lines[0]["can_edit"]);
        $profile->setCan_view($lines[0]["can_view"]);
        $profile->setCan_create($lines[0]["can_create"]);
        $profile->setCan_delete($lines[0]["can_delete"]);

        return $profile;
    }

    protected function insert($profile) {
        $db = new Includes\Db();
        return $db->query('insert into profile (idProfile,  name, is_admin, can_edit, can_view, can_create, can_delete) values 
		(NULL, :name, :is_admin, :can_edit, :can_view, :can_create, :can_delete) ', array(
                    'idProfile' => $profile->getIdProfile(),
                    'name' => $profile->getName(),
                    'is_admin' => $profile->getIs_admin(),
                    'can_edit' => $profile->getCan_edit(),
                    'can_view' => $profile->getCan_view(),
                    'can_create' => $profile->getCan_create(),
                    'can_delete' => $profile->getCan_delete(),
        ));
    }

    protected function update($profile) {
        $db = new Includes\Db();
        return $db->query('update profile set  name = :name, is_admin = :is_admin, can_edit = :can_edit, can_view = :can_view, can_create = :can_create, can_delete = :can_delete where idProfile = :idProfile', array(
                    'idProfile' => $profile->getIdProfile(),
                    'name' => $profile->getName(),
                    'is_admin' => $profile->getIs_admin(),
                    'can_edit' => $profile->getCan_edit(),
                    'can_view' => $profile->getCan_view(),
                    'can_create' => $profile->getCan_create(),
                    'can_delete' => $profile->getCan_delete(),
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

//put your code heree
}
