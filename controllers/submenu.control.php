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
        $submenu->setIdMenu($lines[0]["idMenu"]);
        $submenu->setPosition($lines[0]["position"]);
        $submenu->setIdPage($lines[0]["idPage"]);

        return $submenu;
    }

    protected function selectAllFromMenu($menu) {
        list($submenus) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query('select * from submenu where idMenu ="' . $menu->getIdMenu() . '" ORDER BY position');
        $submenus = array();
        foreach ($lines as $line) {
            $submenu = new subMenu();
            $submenu->setIdSubMenu($line["idSubMenu"]);
            $submenu->setUrl($line["url"]);
            $submenu->setTitle($line["title"]);
            $submenu->setType($line["type"]);
            $submenu->setDescription($line["description"]);
            $submenu->setIdCategory($line["idCategory"]);
            $submenu->setPosition($line["position"]);
            $submenu->setIdPage($line["idPage"]);

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
        $line = $db->query('select count(*) as quantidade from menu where title = :title', array(
            'title' => $menu->getTitle(),
        ));

        $qtde = $line[0]["quantidade"];

        if ($qtde > 0) {
            
            
        } else {

            $sql = "SELECT MAX(position) as position FROM submenu WHERE idMenu ='" . $submenu->getIdMenu() . "'";

            $line = $db->query($sql);
            $pos = $line[0]['position'] + 1;

            $submenu->setPosition($pos);

            return $db->query('insert into submenu (url, position, type, title, description, idMenu, idCategory) values 
		(:url, :position, :type, :title, :description, :idMenu, :idCategory)', array(
                        'url' => $submenu->getUrl(),
                        'position' => $submenu->getPosition(),
                        'type' => $submenu->getType(),
                        'title' => $submenu->getTitle(),
                        'description' => $submenu->getDescription(),
                        'idMenu' => $submenu->getIdMenu(),
                        'idCategory' => $submenu->getIdCategory(),
            ));
        }
    }

    protected function removeSubMenu($submenu) {
        $db = new Includes\Db();
        return $db->query('delete from submenu where idSubMenu = "' . $submenu->getIdSubMenu() . "'");
    }

    protected function update($subMenu) {
        $db = new Includes\Db();

        return $db->query('update submenu set position = :position , url = :url, 
		title = :title, type = :type, description = :description, idCategory = :idCategory, idPage = :idPage where idSubMenu = :idSubMenu', array(
                    'position' => $subMenu->getPosition(),
                    'url' => $subMenu->getUrl(),
                    'title' => $subMenu->getTitle(),
                    'type' => $subMenu->getType(),
                    'description' => $subMenu->getDescription(),
                    'idCategory' => $subMenu->getIdCategory(),
                    'idPage' => $subMenu->getIdPage(),
                    'idSubMenu' => $subMenu->getIdSubMenu()
        ));
    }

    protected function delete($subMenu) {
        $db = new Includes\Db();

        $subMenu = $this->selectOne($subMenu);
        
        if ($subMenu->getPosition() == 1) {
           $db->query("UPDATE submenu SET position = position - 1 WHERE idMenu = :idMenu", array(
               "idMenu" => $subMenu->getIdMenu()
            )); 
        }
        return $db->query('delete from submenu where idSubMenu = :idSubMenu', array(
                    'idSubMenu' => $subMenu->getIdSubMenu(),
        ));
    }

    protected function upOneLevel($subMenu) {
        $db = new Includes\Db();

        $newPos = $subMenu->getPosition() + 1;

        $db->query('update submenu set position = :position where idMenu = :idMenu AND position = :oldPosition', array(
            'position' => $newPos,
            'idMenu' => $subMenu->getIdMenu(),
            'oldPosition' => $subMenu->getPosition()
        ));

        return $db->query('update submenu set position = :position where idSubMenu = :idSubMenu', array(
                    'position' => $subMenu->getPosition(),
                    'idSubMenu' => $subMenu->getIdSubMenu()
        ));
    }

    protected function downOneLevel($subMenu) {
        $db = new Includes\Db();

        $newPos = $subMenu->getPosition() - 1;

        $db->query('update submenu set position = :position where idMenu = :idMenu AND position = :oldPosition', array(
            'position' => $newPos,
            'idMenu' => $subMenu->getIdMenu(),
            'oldPosition' => $subMenu->getPosition()
        ));

        return $db->query('update submenu set position = :position where idSubMenu = :idSubMenu', array(
                    'position' => $subMenu->getPosition(),
                    'idSubMenu' => $subMenu->getIdSubMenu()
        ));
    }
    
    protected function selecionarPaginacao($pag) {
        $db = new Includes\Db();

        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        
        $sql = "select * from submenu where idMenu = '" . $pag['idMenu'] . "'";
        
       
          
        if (isset($pag['pesquisa'])){
            $sql .= " and (title like '%" . $pag['pesquisa'] . "%' or description like '%".$pag['pesquisa']."%')";
        }
        
        
   
        

        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $subMenus = array();
        foreach ($lines as $line) {
            $submenu = new subMenu();
            $submenu->setIdSubMenu($line["idSubMenu"]);
            $submenu->setUrl($line["url"]);
            $submenu->setTitle($line["title"]);
            $submenu->setType($line["type"]);
            $submenu->setDescription($line["description"]);
            $submenu->setIdCategory($line["idCategory"]);
            
            $subMenus[] = $submenu;
        }

        return $subMenus;
    }

    protected function contarPaginas($pag) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ "  . $pag['limite'] . ") as pages FROM submenu where idMenu = '" . $pag['idMenu'] . "'");
        return ceil($lines[0]['pages']);
    }

    protected function contarPaginas2($pag) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ 5 ) as pages FROM submenu where idMenu = '" . $pag['idMenu'] . "' and (title like '%" . $pag['pesquisa'] . "%' or description like '%" . $pag['pesquisa'] . "%')");
        return ceil($lines[0]['pages']);
    }
    public function getLastPos($idMenu) {
        $db = new Includes\Db();

        $sql = "SELECT MAX(position) as position FROM submenu WHERE idMenu ='" . $idMenu . "'";

        $line = $db->query($sql);

        return $line[0]['position'];
    }

}
