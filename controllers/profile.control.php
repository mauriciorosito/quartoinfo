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
include_once("../../models/category.model.php");
include_once("../../models/profileCategory.model.php");

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
            $profile->setIs_admin($line["is_admin"]);

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
        $profile->setDescription($lines[0]["description"]);
        $profile->setIs_admin($lines[0]["is_admin"]);
        $profile->set_Categories($this->selectProfileCategories($profile));

        return $profile;
    }

    protected function insert($profile) {
        $db = new Includes\Db();
//        $profiles = $this->selectAll();
//        foreach ($profiles as $prof) {
//            echo $prof[11]['name'];
//        }
        return $db->query('insert into profile (idProfile,  name, description, is_admin) values 
		(NULL, :name, :description, :is_admin) ', array(
                    'name' => $profile->getName(),
                    'description' => $profile->getDescription(),
                    'is_admin' => $profile->getIs_admin(),
        ));
    }

    protected function update($profile) {
        print_r($profile);
        $db = new Includes\Db();
        $this->deleteProfileCategories($profile);
        return $db->query('update profile set  name = :name, description = :description, is_admin = :is_admin  where idProfile = :idProfile', array(
                    'idProfile' => $profile->getIdProfile(),
                    'name' => $profile->getName(),
                    'description' => $profile->getDescription(),
                    'is_admin' => $profile->getIs_admin()
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
        $lines = $db->query("select * from category");
        
        return $lines;
    }
    
    protected function selectMaxId() {
        $db = new Includes\Db();
        $lines = $db->query("select max(idProfile) as  id from profile");
        
        return $lines[0]['id'];
    }

    protected function deleteProfileCategories($profile) {
        $db = new Includes\Db();

        return $db->query("delete from profilecategory where idProfile = :idProfile", array(
                    'idProfile' => $profile->getIdProfile(),
        ));
    }
    
    protected function insertProfileCategory($profile) {
        $db = new Includes\Db();
        return $db->query('insert into profilecategory (idProfileCategory,  idProfile, idCategory, permType) values 
		(NULL, :idProfile, :idCategory, :permType) ', array(
                    'idProfile' => $profile->getIdProfileCategory(),
                    'idProfile' => $profile->getIdProfile(),
                    'idCategory' => $profile->getIdCategory(),
                    'permType' => $profile->getPermType(),
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
    
    protected function selectProfileCategories($profile) {
        $db = new \Includes\Db();
        $lines = $db->query('select * from profilecategory where idProfile = :idProfile', array('idProfile' => $profile->getIdProfile()));
        $categories = array();
        foreach ($lines as $line) {
            $category = new Category();
            $category->setIdCategory($line['idCategory']);
            $category->setType($line['permType']);
            array_push($categories, $category);
        }
        return $categories;
    }
    
    protected function selecionarPaginacao($pag) {
        $db = new Includes\Db();
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from profile ";
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idProfile DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY name " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $profiles = array();
        foreach ($lines as $line) {
            $profile = new \models\Profile();
            $profile->setIdProfile($line["idProfile"]);
            $profile->setName($line["name"]);
            $profile->setDescription($line["description"]);
            $profile->setIs_admin($line["is_admin"]);

            $profiles[] = $profile;
        }
        return $profiles;
    }

    protected function contarPaginas($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limite . ") as pages FROM profile");
        return ceil($lines[0]['pages']);
    }
    
//put your code heree
}