<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/contentMedia.model.php");

class ControllerContentMedia extends Controller {
	
	protected function selectIdMedia($contentMedia){
		$db = new Includes\Db();
		$lines = $db->query('select * from contentmedia where isMain = 1 and idContent = :idContent', array(
			'idContent' => $contentMedia->getIdContent(),
		));
		if(!empty($lines)){
			$contentMedia = new contentMedia();
			$contentMedia->setIdContentMedia($lines[0]["idContentMedia"]);
			$contentMedia->setIsMain($lines[0]["isMain"]);
			$contentMedia->setIdContent($lines[0]["idContent"]);
			$contentMedia->setIdMedia($lines[0]["idMedia"]);
			return $contentMedia;
		}
	}
	
	protected function selectMedias($contentMedia){
		$db = new Includes\Db();
		$lines = $db->query('select * from contentmedia where idContent = :idContent', array(
			'idContent' => $contentMedia->getIdContent(),
		));
		$contentsMedias = array();
		if(!empty($lines)){
			foreach($lines as $line){
			$contentMedia = new contentMedia();
			$contentMedia->setIdContentMedia($line["idContentMedia"]);
			$contentMedia->setIsMain($line["isMain"]);
			$contentMedia->setIdContent($line["idContent"]);
			$contentMedia->setIdMedia($line["idMedia"]);
			$contentsMedias[] = $contentMedia;
		}
		}
		return $contentsMedias;
	}
	
	protected function selectOne($contentMedia){
		$db = new Includes\Db();
		$lines = $db->query('select * from contentmedia where idContentMedia = :idContentMedia', array(
			'idContentMedia' => $contentMedia->getIdContentMedia(),
		));
		$contentMedia = new contentMedia();
		$contentMedia->setIdContentMedia($lines[0]["idContentMedia"]);
		$contentMedia->setIsMain($lines[0]["isMain"]);
		$contentMedia->setIdContent($lines[0]["idContent"]);
		$contentMedia->setIdMedia($lines[0]["idMedia"]);
		return $contentMedia;
	}

	protected function selectAll(){
		list($contentMedia) = func_get_args();
		$db = new Includes\Db();
		$lines = $db->query('select * from contentmedia where idContent = :idContent order by idMedia', array(
			'idContent' => $contentMedia->getIdContent(),
		));
		$contentsMedias = array();
		foreach($lines as $line){
			$contentMedia = new contentMedia();
			$contentMedia->setIdContentMedia($line["idContentMedia"]);
			$contentMedia->setIsMain($line["isMain"]);
			$contentMedia->setIdContent($line["idContent"]);
			$contentMedia->setIdMedia($line["idMedia"]);
			$contentsMedias[] = $contentMedia;
		}
		return $contentsMedias;
	}
	
	protected function insert($contentMedia){
		$db = new Includes\Db();
		return $db->query('insert into contentMedia (isMain, idContent, idMedia) values 
		(:isMain, :idContent,:idMedia) ',array(
			'isMain' => $contentMedia->getIsMain(),
			'idContent' => $contentMedia->getIdContent(),
			'idMedia' => $contentMedia->getIdMedia(),
		));
	}

	protected function update($contentMedia){
		$db = new Includes\Db();
		return $db->query('update contentMedia set isMain = :isMain , idContent = :idContent, 
		IdMedia = :idMedia where IdContentMedia = :idContentMedia', array(
			'isMain' => $contentMedia->getIsMain(),
			'idContent' => $contentMedia->getIdContent(),
			'idMedia' => $contentMedia->getIdMedia(),
			'idContentMedia' => $contentMedia->getIdContentMedia(),
		));
	}	

	protected function delete($contentMedia){
		$db = new Includes\Db();
		
		$ret = $db->query('delete from contentMedia where IdContentMedia = :idContentMedia', array(
			'idContentMedia' => $content->getIdContentMedia(),
		));
	}	
}

	