<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/media.model.php");

class ControllerMedia extends Controller {
	
	protected function selectOne($media){
		$db = new Includes\Db();
		$lines = $db->query('select * from media where idFile = :idFile', array(
			'idFile' => $media->getIdMedia(),
		));
		$media = new Media();
		$media->setIdMedia($lines[0]["idFile"]);
		$media->setName($lines[0]["name"]);
		$media->setPath($lines[0]["path"]);
		$media->setAttachment($lines[0]["attachment"]);
		$media->setType($lines[0]["type"]);
		$media->setRestrict($lines[0]["is_restrict"]);
		$media->setDescription($lines[0]["description"]);
		return $media;
	}

	protected function selectAll(){
		list($media) = func_get_args();
		$db = new Includes\Db();
		$lines = $db->query("select * from media where idFile = :idFile order by idCategory", array(
			'idFile' => $media->getIdMedia(),
		));
		$medias = array();
		foreach($lines as $line){
			$media = new media();
			$media->setIdFile($line["idFile"]);
			$media->setName($line["name"]);
			$media->setPath($line["path"]);
			$media->setAttachment($line["attachment"]);
			$media->setType($line["type"]);
			$media->setRestrict($line["is_restrict"]);
			$media->setDescription($line["description"]);
			$medias[] = $media;
		}
		return $medias;
	}
	
	protected function insert($media){
		$db = new Includes\Db();
		return $db->query('insert into media (name, path, attachment, type, is_restrict, description) values 
		(:name, :path,:attachment,:type,:is_restrict,:description) ',array(
			'name' => $media->getName(),
			'path' => $media->getPath(),
			'attachment' => $media->getAttachment(),
			'type' => $media->getType(),
			'is_restrict' => $media->getRestrict(),
			'description' => $media->getDescription(),
		));
	}

	protected function update($media){
		$db = new Includes\Db();
		return $db->query('update media set name = :name , path = :path, attachment = :attachment, type = :type, is_restrict = :is_restrict, description = :description  
		where idFile = :idFile', array(
			'name' => $media->getName(),
			'path' => $media->getPath(),
			'attachment' => $media->getAttachment(),
			'type' => $media->getType(),
			'is_restrict' => $media->getRestrict(),
			'description' => $media->getDescription(),
		));
	}	

	protected function delete($media){
		$db = new Includes\Db();
		
		$ret = $db->query('delete from media where idFile = :idFile', array(
			'idFile' => $media->getIdMedia(),
		));
	}	
	
	protected function selectMaxId(){
		$db = new Includes\Db();
		$lines = $db->query("select max(idFile) from media");
		$media = new Media();
		$media->setIdMedia($lines[0]["max(idFile)"]);
		return($media);
	}
	
}