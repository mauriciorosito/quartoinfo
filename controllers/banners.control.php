<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/banners.model.php");

class ControllerBanners extends Controller {
    public $total;
    
    protected function selectAll(){
        list($page) = func_get_args();
        $page = (($page - 1) * 10);
        $db = new Includes\Db();
        $lines = $db->query(
            "select * from banners order by id limit :page, 10",
            array('page'=>$page)
        );
        
        $this->total = $db->query(
            "select count(*) from banners order by id"
        );
        
        $banners = array();
        foreach($lines as $line){
            $banner = new Banners();
            $banner->setId($line["id"]);
            $banner->setTitle($line["title"]);
            $banner->setDescription($line["description"]);
            $banner->setHref($line["href"]);
            $banner->setSrc($line["src"]);
            $banner->setAlt($line["alt"]);
            $banner->setType($line["type"]);
            $banners[] = $banner;
        }
        return $banners;
    }
    protected function selectOne($obj){
	$db = new Includes\Db();
	$line = $db->query("select * from banners where id = '".$obj->getId()."'");
        return $line;
    }
    protected function insert($obj){
	$db = new Includes\Db();
        $query = "insert into banners ";
        $query .= "(title, description, href, src, alt, type) ";
        $query .= "values ('".$obj->getTitle()."', ";
        $query .= "'".$obj->getDescription()."', ";
        $query .= "'".$obj->getHref()."', ";
        $query .= "'".$obj->getSrc()."', ";
        $query .= "'".$obj->getAlt()."', ";
        $query .= "'".$obj->getType()."')";
	$line = $db->query($query);
        return $line;
    }
    protected function update($obj){
	$db = new Includes\Db();
        $query = "update banners set ";
        $query .= "title = ".$obj->getTitle().", ";
        $query .= "description = ".$obj->getDescription().", ";
        $query .= "href = ".$obj->getHref().", ";
        $query .= "src = ".$obj->getSrc().", ";
        $query .= "alt = ".$obj->getAlt().", ";
        $query .= "type = ".$obj->getType().", ";
        $line = $db->query($query);
        return $line;
    }
    protected function delete($obj){
	$db = new Includes\Db();
        $query = "delete from banners where id='".$obj->getId()."'";
        $line = $db->query($query);
        return $line;
    }
    protected function search($name){
	$db = new Includes\Db();
        $lines = $db->query(
           "select * from banners where name :name",
            array('name'=>$name)
        );
        $banners = array();
        foreach($lines as $line){
            $banner = new Banners();
            $banner->setId($line["id"]);
            $banner->setTitle($line["title"]);
            $banner->setDescription($line["description"]);
            $banner->setHref($line["href"]);
            $banner->setSrc($line["src"]);
            $banner->setAlt($line["alt"]);
            $banner->setType($line["type"]);
            $banners[] = $banner;
        }
        return $banners;
    }
}