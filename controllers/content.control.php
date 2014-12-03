<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("contentMedia.control.php");
include_once("contentCategory.control.php");
include_once("../../models/content.model.php");
include_once("../../models/contentMedia.model.php");
include_once("../../models/contentCategory.model.php");

class ControllerContent extends Controller {
	
	protected function selectPreviewNews(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where postDate <= '" . date("Y-m-d") . "' and expirationDate >= '" . date("Y-m-d") . "' and type = 'N' order by postDate desc limit 0,3");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setTitle($line["title"]);
			$content->setDescription($line["description"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);

			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
		protected function selectPreviewEvents(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where postDate <= '" . date("Y-m-d") . "' and expirationDate >= '" . date("Y-m-d") . "' and type = 'E' order by postDate desc limit 0,3");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setTitle($line["title"]);
			$content->setDescription($line["description"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);

			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
		protected function selectPreviewOportunities(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where postDate <= '" . date("Y-m-d") . "' and expirationDate >= '" . date("Y-m-d") . "' and type = 'O' order by postDate desc limit 0,3");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setTitle($line["title"]);
			$content->setDescription($line["description"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);

			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
	protected function selectOnePage($content){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where idContent = :idContent and type='P'", array(
			'idContent' => $content->getIdContent(),
		));
		
		if($lines == null) {
			return null;
		}
		
		$content = new Content();
		$content->setIdContent($lines[0]["idContent"]);
		$content->setPublisher($lines[0]["publisher"]);
		$content->setSource($lines[0]["source"]);
		$content->setTitle($lines[0]["title"]);
		$content->setText($lines[0]["text"]);
		$content->setDescription($lines[0]["description"]);
		$content->setPostDate($lines[0]["postDate"]);
		$content->setExpirationDate($lines[0]["expirationDate"]);
		$content->setType($lines[0]["type"]);

		$contentMedia = new contentMedia;
		$contentMedia->setIdContent($content->getIdContent());
		$controllerContentMedia = new ControllerContentMedia();
		$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);

		$content->set_Medias($contentMedia);


		$contentCategory = new contentCategory;
		$contentCategory->setIdContent($content->getIdContent());
		$controllerContentMedia = new ControllerContentCategory();
		$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
		$content->set_Category($contentCategory);
			
		return $content;
	}
	
	protected function selectOne($content){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where idContent = :idContent", array(
			'idContent' => $content->getIdContent(),
		));
		
		if($lines == null) {
			return null;
		}
		
		$content = new Content();
		$content->setIdContent($lines[0]["idContent"]);
		$content->setPublisher($lines[0]["publisher"]);
		$content->setSource($lines[0]["source"]);
		$content->setTitle($lines[0]["title"]);
		$content->setText($lines[0]["text"]);
		$content->setDescription($lines[0]["description"]);
		$content->setPostDate($lines[0]["postDate"]);
		$content->setExpirationDate($lines[0]["expirationDate"]);
		$content->setType($lines[0]["type"]);

		$contentMedia = new contentMedia;
		$contentMedia->setIdContent($content->getIdContent());
		$controllerContentMedia = new ControllerContentMedia();
		$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);

		$content->set_Medias($contentMedia);


		$contentCategory = new contentCategory;
		$contentCategory->setIdContent($content->getIdContent());
		$controllerContentMedia = new ControllerContentCategory();
		$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
		$content->set_Category($contentCategory);
			
		return $content;
	}
	protected function selectAll(){
		$db = new Includes\Db();
	    $lines = $db->query("select * from content where type <> 'P' order by postDate desc");
	    $contents = array();
	    foreach($lines as $line){
		   $content = new Content();
		   $content->setIdContent($line["idContent"]);
		   $content->setPublisher($line["publisher"]);
		   $content->setSource($line["source"]);
		   $content->setTitle($line["title"]);
		   $content->setText($line["text"]);
		   $content->setDescription($line["description"]);
		   $content->setPostDate($line["postDate"]);
		   $content->setExpirationDate($line["expirationDate"]);
		   $content->setType($line["type"]);

		   $contentMedia = new contentMedia;
		   $contentMedia->setIdContent($content->getIdContent());
		   $controllerContentMedia = new ControllerContentMedia();
		   $contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
		   $content->set_Medias($contentMedia);


		   $contentCategory = new contentCategory;
		   $contentCategory->setIdContent($content->getIdContent());
		   $controllerContentMedia = new ControllerContentCategory();
		   $contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
		   $content->set_Category($contentCategory);

		   $contents[] = $content;
	   }
	   return $contents;
	}
	
	protected function selectAllNews(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where type='N' order by postDate desc");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setPostDate($line["postDate"]);
			$content->setExpirationDate($line["expirationDate"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
	protected function selectAllEvents(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where type='E' order by postDate desc");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setPostDate($line["postDate"]);
			$content->setExpirationDate($line["expirationDate"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
	protected function selectAllOportunities(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where type='O' order by postDate desc");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setPostDate($line["postDate"]);
			$content->setExpirationDate($line["expirationDate"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
	protected function selectAllPages(){
		$db = new Includes\Db();
		$lines = $db->query("select * from content where type='P'");
		$contents = array();
		foreach($lines as $line){
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
		}
		return $contents;
	}
	
	protected function insert($content){
		$db = new Includes\Db();
		return $db->query('insert into content (idContent, publisher, title, source, text, description, postDate, expirationDate, type) values 
		(NULL, :publisher, :title, :source, :text, :description, :postDate
		, :expirationDate, :type) ', array(
			'publisher' => $content->getPublisher(),
			'title' => $content->getTitle(),
			'source' => $content->getSource(),
			'text' => $content->getText(),
			'description' => $content->getDescription(),
			'postDate' => $content->getPostDate(),
			'expirationDate' => $content->getExpirationDate(),
			'type' => $content->getType(),
		)); 
	}
	protected function update($content){
		$db = new Includes\Db();
		return $db->query('update content set publisher = :publisher, title = :title, source = :source, text = :text
		, description =  :description, postDate =  :postDate, expirationDate = :expirationDate
		, type = :type where IdContent = :idContent', array(
			'publisher' => $content->getPublisher(),
			'title' => $content->getTitle(),
			'source' => $content->getSource(),
			'text' => $content->getText(),
			'description' => $content->getDescription(),
			'postDate' => $content->getPostDate(),
			'expirationDate' => $content->getExpirationDate(),
			'type' => $content->getType(),
			'idContent' => $content->getIdContent(),
		));
	}

	protected function delete($content){
		$db = new Includes\Db();
		
		$ret2 = $db->query("delete from contentmedia where IdContent = :idContent", array(
			'idContent' => $content->getIdContent(),
		));

		$ret1 = $db->query("delete from content where IdContent = :idContent", array(
			'idContent' => $content->getIdContent(),
		));
		
		if($ret1 && $ret2){
			return true;
		} else{
			return false;
		}
	}

	protected function selectMaxId(){
		$db = new Includes\Db();
		$lines = $db->query("select max(idContent) from content");
		$content = new Content();
		$content->setIdContent($lines[0]["max(idContent)"]);
		return($content);
	}
	
	protected function selecionarPaginacaoPaginas($pag) {
        $db = new Includes\Db();
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from content where type = 'P' ";
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idContent DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY title " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $contents = array();
        foreach ($lines as $line) {
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setPostDate($line["postDate"]);
			$content->setExpirationDate($line["expirationDate"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
        }
        return $contents;
    }

    protected function contarPaginasPaginas($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limite . ") as pages FROM content where type = 'P'");
        return ceil($lines[0]['pages']);
    }
	
	protected function selecionarPaginacaoConteudos($pag) {
        $db = new Includes\Db();
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from content where type <> 'P' ";
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idContent DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY title " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $contents = array();
        foreach ($lines as $line) {
			$content = new Content();
			$content->setIdContent($line["idContent"]);
			$content->setPublisher($line["publisher"]);
			$content->setSource($line["source"]);
			$content->setTitle($line["title"]);
			$content->setText($line["text"]);
			$content->setDescription($line["description"]);
			$content->setPostDate($line["postDate"]);
			$content->setExpirationDate($line["expirationDate"]);
			$content->setType($line["type"]);

			$contentMedia = new contentMedia;
			$contentMedia->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentMedia();
			$contentMedia = $controllerContentMedia->actionControl('selectAll', $contentMedia);
			$content->set_Medias($contentMedia);


			$contentCategory = new contentCategory;
			$contentCategory->setIdContent($content->getIdContent());
			$controllerContentMedia = new ControllerContentCategory();
			$contentCategory = $controllerContentMedia->actionControl('selectAll', $contentCategory);
			$content->set_Category($contentCategory);

			$contents[] = $content;
        }
        return $contents;
    }

    protected function contarPaginasConteudos($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limite . ") as pages FROM content where type <> 'P'");
        return ceil($lines[0]['pages']);
    }

}
