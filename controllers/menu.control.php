<?php

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/menu.model.php");

class ControllerMenu extends Controller {

    protected function selectOne($menu) {
        $db = new Includes\Db();
        $lines = $db->query('select * from menu where idMenu = :idMenu', array(
            'idMenu' => $menu->getIdMenu(),
        ));
        $menu = new Menu();
        $menu->setIdMenu($lines[0]["idMenu"]);
        $menu->setDescription($lines[0]["description"]);
        $menu->setLocalization($lines[0]["localization"]);
        $menu->setTitle($lines[0]["title"]);

        return $menu;
    }

    protected function selectAll() {
        list($menus) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query('select * from menu');
        $menus = array();
        foreach ($lines as $line) {
            $menu = new Menu();
            $menu->setIdMenu($line["idMenu"]);
            $menu->setDescription($line["description"]);
            $menu->setTitle($line["title"]);
            $menu->setLocalization($line["localization"]);

            $menus[] = $menu;
        }
        return $menus;
    }

    protected function insert($menu) {
        $db = new Includes\Db();
        return $db->query('insert into menu (title, description, localization) values 
		(:title, :description, :localization) ', array(
                    'title' => $menu->getTitle(),
                    'description' => $menu->getDescription(),
                    'localization' => $menu->getLocalization(),
        ));
    }

    protected function update($menu) {
        $db = new Includes\Db();
        return $db->query('update menu set title = :title , description = :description, 
		localization = :localization where idMenu = :idMenu', array(
                    'title' => $menu->getTitle(),
                    'description' => $menu->getDescription(),
                    'localization' => $menu->getLocalization(),
                    'idMenu' => $menu->getIdMenu(),
        ));
    }

    protected function delete($menu) {
        $db = new Includes\Db();

        $ret = $db->query('delete from menu where idMenu = :idMenu', array(
            'idMenu' => $menu->getIdMenu(),
        ));
    }

    protected function selecionarPaginacao($pag) {
        $db = new Includes\Db();

        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from menu ";
        
        if (isset($pag['pesquisa'])){
            $sql .= " where title like '%" . $pag['pesquisa'] . "%' or description like '%".$pag['pesquisa']."%'";
        }
        
        
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idMenu DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY title " . $pag['ordenacao'] . " ";
        } else if ($pag['ordenacao'] == "localizacao") {
            $sql .= "ORDER BY localization asc ";
        }
        
       

        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $menus = array();
        foreach ($lines as $line) {
            $menu = new Menu();
            $menu->setIdMenu($line["idMenu"]);
            $menu->setDescription($line["description"]);
            $menu->setTitle($line["title"]);
            $menu->setLocalization($line["localization"]);

            $menus[] = $menu;
        }

        return $menus;
    }

    protected function contarPaginas($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ "  . $limite . ") as pages FROM menu");
        return ceil($lines[0]['pages']);
    }

    protected function contarPaginas2($pesquisa) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ 5 ) as pages FROM menu where title like '%" . $pesquisa . "%' or description like '%" . $pesquisa . "%'");
        return ceil($lines[0]['pages']);
    }

    public function searchMenus($pag, $page = 1) {
        $db = new Includes\Db();
        var_dump($pag);
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = $db->query("select * from menu where name like '%" . $pag['pesquisa'] . "%' or description like '%" . $pag['pesquisa'] . "%'");
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idMenu DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY title " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $menus = array();
        foreach ($lines as $line) {
             $menu = new Menu();
            $menu->setIdMenu($line["idMenu"]);
            $menu->setDescription($line["description"]);
            $menu->setTitle($line["title"]);
            $menu->setLocalization($line["localization"]);

            $menus[] = $menu;
        }
        return $menus;
    }

}
