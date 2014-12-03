<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/links.model.php");

class ControllerLinks extends Controller {
    public $total;
    
    protected function selectAll(){
        list($page) = func_get_args();
        $page = (($page - 1) * 10);
        $db = new Includes\Db();
        $lines = $db->query(
            "select * from links order by id limit :page, 10",
            array('page'=>$page)
        );
        
        $this->total = $db->query(
            "select count(*) from links order by id"
        );
        
        $links = array();
        foreach($lines as $line){
            $link = new Links();
            $link->setId($line["id"]);
            $link->setTitle($line["title"]);
            $link->setDescription($line["description"]);
            $link->setUrl($line["url"]);
            $links[] = $link;
        }
        return $links;
    }
    protected function selectOne($obj){
	$db = new Includes\Db();
	$line = $db->query("select * from links where id = '".$obj->getId()."'");
        return $line;
    }
    protected function insert($obj){
	$db = new Includes\Db();
        $query = "insert into links ";
        $query .= "(title, description, url) ";
        $query .= "values ('".$obj->getTitle()."', ";
        $query .= "'".$obj->getDescription()."', ";
        $query .= "'".$obj->getUrl()."')";
	$line = $db->query($query);
        return $line;
    }
    protected function update($obj){
	$db = new Includes\Db();
        $query = "update links set ";
        $query .= "title = ".$obj->getTitle().", ";
        $query .= "description = ".$obj->getDescription().", ";
        $query .= "url = ".$obj->getUrl()." ";
        $query .= "where id= '".$obj->getId()."'";
        $line = $db->query(
                'update links set title = :title, description = :description, url = :url where id = :id',
                array(
                    'title' => $obj->getTitle(),
                    'description' => $obj->getDescription(),
                    'url' => $obj->getUrl(),
                    'id' => $obj->getId()
                )
                );
        return $line;
    }
    protected function delete($obj){
	$db = new Includes\Db();
        $query = "delete from links where id='".$obj->getId()."'";
        $line = $db->query($query);
        return $line;
    }
    public function search($title){
	$db = new Includes\Db();
        $lines = $db->query(
           "SELECT * FROM links WHERE title LIKE :title",
            array('title' => '%'.$title.'%')
        );
        $links = array();
        foreach($lines as $line){
            $link = new Links();
            $link->setId($line["id"]);
            $link->setTitle($line["title"]);
            $link->setDescription($line["description"]);
            $link->setUrl($line["url"]);
            $links[] = $link;
        }
        return $links;
    }
}
?>