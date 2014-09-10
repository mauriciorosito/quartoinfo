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

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/profile.model.php");

class ControllerProfile extends Controller {

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from profile");
        $profiles = array();
        foreach ($lines as $line) {
            $profile = new \models\Profile();
            $profile->setIdProfile($line["idProfile"]);
            $profile->setName($line["name"]);
            $profile->setDescription($line["description"]);

            $profiles[] = $profile;
        }
        return $profiles;
    }

    protected function selectOne($profile) {
        $db = new Includes\Db();
        $lines = $db->query('select * from profile where idProfile = :idProfile', array(
            'idProfile' => $profile->getIdProfile(),
        ));
        $profile = new \models\Profile();
        $profile->setIdProfile($lines[0]["idProfile"]);
        $profile->setName($lines[0]["name"]);
        $profile->setIs_admin($lines[0]["is_admin"]);

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

        return $db->query("delete from profile where IdProfile = :idProfile", array(
            'idProfile' => $profile->getIdProfile(),
        )); 
    }
    
    protected function selectAllCategories() {
        $db = new Includes\Db();
        $lines = $db->query("select * from idProfile");
        $categories = array();
        
        return $lines;
    }
    
    protected function selectMaxId() {
        $db = new Includes\Db();
        $lines = $db->query("select max(idProfile) as  id from profile");
        
        return $lines[0]['id'];
    }

    protected function deleteProfileCategory($profilecategory) {
        $db = new Includes\Db();

        return $db->query("delete from profilecategory where idProfileCategory = :idProfileCategory", array(
            'idProfileCategory' => $profile->getIdProfileCategory(),
        ));
    }
    
    protected function updateProfileCategory($profilecategory) {
        $db = new Includes\Db();
        return $db->query('update profilecategory set idProfile = :idProfile, idProfile = :idCategory, permType = :permType where idProfileCategory = :idProfileCategory', array(
                    'idProfile' => $profile->getIdProfile(),
                    'idProfile' => $profile->getIdCategory(),
                    'permType' => $profile->getPermType(),
                    'idProfileCategory' => $profile->getIdProfileCategory(),
        ));
    }
//put your code heree
}
