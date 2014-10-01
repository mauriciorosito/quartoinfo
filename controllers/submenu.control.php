<?php

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/submenu.model.php");

class ControllerSubMenu extends Controller {

    protected function selectOne($submenu) {
        $db = new Includes\Db();
        $lines = $db->query('select * from submenu where idSubMenu = :idSubMenu', array(
            'idSubMenu' => $submenu->getIdSubMenu(),
        ));
        $submenu = new Submenu();
        $submenu->setIdSubMenu($lines[0]["idSubMenu"]);
        $submenu->setUrl($lines[0]["url"]);
        $submenu->setTitle($lines[0]["title"]);
        $submenu->setType($lines[0]["type"]);
        $submenu->setDescription($lines[0]["description"]);
        $submenu->setIdCategory($lines[0]["idCategory"]);
        return $submenu;
    }

    protected function selectAllFromMenu($menu) {
        list($submenus) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query('select * from submenu where idMenu ="' . $menu->getIdMenu() . '"');
        $submenus = array();
        foreach ($lines as $line) {
            $submenu = new subMenu();
            $submenu->setIdSubMenu($line["idSubMenu"]);
            $submenu->setUrl($line["url"]);
            $submenu->setTitle($line["title"]);
            $submenu->setType($line["type"]);
            $submenu->setDescription($line["description"]);
            $submenu->setIdCategory($line["idCategory"]);

            $submenus[] = $submenu;
        }
        return $submenus;
    }

    protected function selectAll() {
        list($submenus) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query('select * from submenu');
        $submenus = array();
        foreach ($lines as $line) {
            $submenu = new Submenu();
            $submenu->setIdSubMenu($line["idSubMenu"]);
            $submenu->setUrl($line["url"]);
            $submenu->setTitle($line["title"]);
            $submenu->setType($line["type"]);
            $submenu->setDescription($line["description"]);
            $submenu->setIdCategory($line["idCategory"]);

            $submenus[] = $submenu;
        }
        return $submenus;
    }

    protected function insert($submenu) {
        $db = new Includes\Db();
        return $db->query('insert into submenu (url, type, title, description, idMenu, idCategory) values 
		(:url, :type, :title, :description, :idMenu, :idCategory)', array(
                    'url' => $submenu->getUrl(),
                    'type' => $submenu->getType(),
                    'title' => $submenu->getTitle(),
                    'description' => $submenu->getDescription(),
                    'idMenu' => $submenu->getIdMenu(),
                    'idCategory' => $submenu->getIdCategory()
        ));
    }

    protected function removeSubMenu($submenu) {
        $db = new Includes\Db();
        return $db->query('delete from submenu where idSubMenu = "' . $submenu->getIdSubMenu() . "'");
    }

    //a fazer
    protected function update($contentMedia) {
        $db = new Includes\Db();
        return $db->query('update contentMedia set isMain = :isMain , idContent = :idContent, 
		IdMedia = :idMedia where IdContentMedia = :idContentMedia', array(
                    'isMain' => $contentMedia->getIsMain(),
                    'idContent' => $contentMedia->getIdContent(),
                    'idMedia' => $contentMedia->getIdMedia(),
                    'idContentMedia' => $contentMedia->getIdContentMedia(),
        ));
    }

    protected function delete($contentMedia) {
        $db = new Includes\Db();

        $ret = $db->query('delete from contentMedia where IdContentMedia = :idContentMedia', array(
            'idContentMedia' => $content->getIdContentMedia(),
        ));
    }

}
