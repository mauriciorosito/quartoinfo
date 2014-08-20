<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subMenu
 *
 * @author kathiane.050996
 */
class Profile extends Controller {

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from subMenu");
        $subMenus = array();
        foreach ($lines as $line) {
            $subMenu = new Profile();
            $subMenu->setIdSubMenu($line["idSubMenu"]);
            $subMenu->setTitle($line["Title"]);
            $subMenu->setType($line["Type"]);
            $subMenu->setDescription($line["Description"]);

            $subMenus[] = $subMenu;
        }
        return $subMenus;
    }

    protected function selectOne($subMenu) {
        $db = new Includes\Db();
        $lines = $db->query('select * from subMenu where idSubMenu = :idSubMenu', array(
            'idSubMenu' => $subMenu->getIdSubMenu(),
        ));
        $subMenu = new Profile();
        $subMenu->setIdSubMenu($lines[0]["idSubMenu"]);
        $subMenu->setTitle($lines[0]["Title"]);
        $subMenu->setType($lines[0]["Type"]);
        $subMenu->setDescription($lines[0]["Description"]);

        return $subMenu;
    }

    protected function insert($subMenu) {
        $db = new Includes\Db();
        return $db->query('insert into subMenu (idSubMenu,  Title, Type, Description) values 
		(NULL, :Title, :Type, :Description) ', array(
                    'idSubMenu' => $subMenu->getIdSubMenu(),
                    'Title' => $subMenu->getTitle(),
                    'Type' => $subMenu->getType(),
                    'Description' => $subMenu->getDescription(),
        ));
    }

    protected function update($subMenu) {
        $db = new Includes\Db();
        return $db->query('update subMenu set idSubMenu = :idSubMenu,  Title = :Title, Type = :Type, Description = :Description where idSubMenu = :idSubMenu', array(
                    'idSubMenu' => $course->getIdSubMenu(),
                    'Title' => $course->getTitle(),
                    'Type' => $course->getType(),
                    'Description' => $course->getDescription(),
        ));
    }

    protected function delete($subMenu) {
         $db = new Includes\Db();

        $ret2 = $db->query("delete from subMenu where idSubMenu = :idSubMenu", array(
            'idSubMenu' => $subMenu->getIdSubMenu(),
        )); // ???? verificar!!!!!

        $ret1 = $db->query("delete from subMenu where idSubMenu = :idSubMenu", array(
            'idSubMenu' => $subMenu->getIdSubMenu(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

//put your code here
}