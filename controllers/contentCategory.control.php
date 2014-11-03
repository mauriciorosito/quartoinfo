<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/contentCategory.model.php");

class ControllerContentCategory extends Controller {
	
	protected function selectOne($contentCategory){
		$db = new Includes\Db();
		$lines = $db->query('select * from contentcategory where idContentCategory = :idContentCategory', array(
			'idContentCategory' => $contentCategory->getIdContentCategory(),
		));
		$contentCategory = new contentCategory();
		$contentCategory->setIdContentMedia($lines[0]["idContentMedia"]);
		$contentCategory->setIsMain($lines[0]["isMain"]);
		$contentCategory->setIdContent($lines[0]["idContent"]);
		$contentCategory->setIdMedia($lines[0]["idMedia"]);
		return $contentCategory;
	}

	protected function selectAll(){
		list($contentCategory) = func_get_args();
		$db = new Includes\Db();
		$lines = $db->query("select * from contentcategory where idContent = :idContent order by idCategory", array(
			'idContent' => $contentCategory->getIdContent(),
		));
		$contentsCategories = array();
		foreach($lines as $line){
			$contentCategory = new contentCategory();
			$contentCategory->setIdContentCategory($line["idContentCategory"]);
			$contentCategory->setIdContent($line["idContent"]);
			$contentCategory->setIdCategory($line["idCategory"]);
			$contentsCategories[] = $contentCategory;
		}
		return $contentsCategories;
	}
	
	protected function insert($contentCategory){
		$db = new Includes\Db();
		return $db->query("insert into contentCategory (idCategory, idContent) values 
		(:idCategory,:idContent) ", array(
			'idCategory' => $contentCategory->getIdCategory(),
			'idContent' => $contentCategory->getIdContent(),
		));
	}

	protected function update($contentCategory){
		$db = new Includes\Db();
		return $db->query('update contentCategory set idCategory = :idCategory , 
		idContent = :idContent where IdContentCategory = :idContentCategory', array(
			'idCategory' => $contentCategory->getIdCategory(),
			'idContent' => $contentCategory->getIdContent(),
			'idContentCategory' => $contentCategory->getIdContentCategory(),
		));
	}	

	protected function delete($contentCategory){
		$db = new Includes\Db();
		
		$ret = $db->query('delete from contentCategory where IdContentCategory = :IdContentCategory', array(
			'IdContentCategory' =>  $content->getIdContentCategory(),
		));
	}
	

	
}
