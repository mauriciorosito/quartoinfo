<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/Category.model.php");

class ControllerCategory extends Controller {
	
	protected function selectOne($contentCategory){
	$db = new Includes\Db();
        $lines = $db->query("select * from category where idCategory = :idCategory", array(
            'idCategory' => $category->getCategory(),
        ));
        $category = new Category();
        $category->setIdCategory($lines[0]["idCategory"]);
        $category->setName($lines[0]["name"]);
        $category->setType($lines[0]["type"]);
    
        return $category;
    }

	protected function selectAll(){
	 $db = new Includes\Db();
        $lines = $db->query("select * from category");
        $categories = array();
        foreach ($lines as $line) {
            $category = new Category();
            $category->setIdCategory($line["idCategory"]);
            $category->setName($line["name"]);
			$category->setType($line["type"]);
           
            $categories[] = $category;
        }
        return $categories;
	}
	
	protected function insert($category){
		$db = new Includes\Db();
		return $db->query("insert into category (name, type) values 
		(:name,:type) ", array(
			'name' => $category->getName(),
			'type' => $category->getType(),
		));
	}

	protected function update($category){
		$db = new Includes\Db();
		return $db->query('update category set name = :name , type = :type 
		where idCategory = :idCategory', array(
			'name' => $category->getName(),
			'type' => $category->getType(),
			'idCategory' => $category->getIdCategory(),
		));
	}	

	protected function delete($category){
		$db = new Includes\Db();
		$ret1 = $db->query("delete from category where idCategory = :idCategory", array('idCategory' => $category->getIdCategory(),		));
	}

}
