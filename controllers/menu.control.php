<?php

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/menu.model.php");

class ControllerMenu extends Controller {
    
protected function selectOne($menu){
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

	protected function selectAll(){
		list($menus) = func_get_args();
		$db = new Includes\Db();
		$lines = $db->query('select * from menu');
		$menus = array();
		foreach($lines as $line){
			$menu = new Menu();
			$menu->setIdMenu($line["idMenu"]);
			$menu->setDescription($line["description"]);
			$menu->setTitle($line["title"]);
			$menu->setLocalization($line["localization"]);
			
			$menus[] = $menu;
		}
		return $menus;
	}
	
	protected function insert($menu){
		$db = new Includes\Db();
		return $db->query('insert into menu (title, description, localization) values 
		(:title, :description, :localization) ',array(
			'title' => $menu->getTitle(),
			'description' => $menu->getDescription(),
			'localization' => $menu->getLocalization(),
			
		));
	}

	protected function update($menu){
		$db = new Includes\Db();
		return $db->query('update menu set title = :title , description = :description, 
		localization = :localization where idMenu = :idMenu', array(
			'title' => $menu->getTitle(),
			'description' => $menu->getDescription(),
			'localization' => $menu->getLocalization(),
			'idMenu' => $menu->getIdMenu(),
		));
	}	

	protected function delete($menu){
		$db = new Includes\Db();
		$ret = $db->query('delete from menu where idMenu = :idMenu', array(
			'idMenu' => $menu->getIdMenu(),
		));
	}	
}
