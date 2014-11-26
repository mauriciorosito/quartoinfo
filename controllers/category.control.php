<?php
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/category.model.php");

class ControllerCategory extends Controller {
	

	protected function selectOne($category){
	$db = new Includes\Db();
        $lines = $db->query("select * from category where idCategory = :idCategory", array(
            'idCategory' => $category->getIdCategory(),
        ));
        $category = new \models\Category();
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
            $category = new \models\Category();
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
	
	protected function selectAllDescending() {
        $db = new Includes\Db();
        $lines = $db->query("select * from category order by name desc");
        $categorys = array();
        foreach ($lines as $line) {
            $category = new \models\Category();
            $category->setIdCategory($line["idCategory"]);
   
            $category->setType($line["type"]);
            $category->setName($line["name"]);
 
            $categories[] = $category;
        }
        
        return $categories;
    }
	
	protected function selecionarPaginacao($pag) {
        $db = new Includes\Db();
	
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from category ";
        if(isset($pag['pesquisa'])){
            $sql = "select * from category where name like '%".$pag['pesquisa']."%' or type like '%".$pag['pesquisa']."%'";
        }
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idCategory DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY name " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
				
        $lines = $db->query($sql);
        $categories = array();
        foreach ($lines as $line) {
		
            $category = new \models\Category();
            $category->setIdCategory($line["idCategory"]);
            $category->setType($line["type"]);
            $category->setName($line["name"]);

            $categories[] = $category;
        }
        return $categories;
    }

    protected function contarPaginas($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limite . ") as pages FROM category");
        return ceil($lines[0]['pages']);
    }
	
	 protected function contarPaginas2($pesquisa) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ 5 ) as pages FROM category where name like '%".$pesquisa."%' or type like '%".$pesquisa."%'");
        return ceil($lines[0]['pages']);
    }
	
	public function searchCategories($pag, $page = 1) {
        $db = new Includes\Db();
        var_dump($pag);
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = $db->query("select * from category where name like ".$pag['pesquisa']." or type like ".$pag['pesquisa']);
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idCategory DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY name " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $categories = array();
        foreach ($lines as $line) {
            $category = new \models\Category();
            $category->setIdCategory($line["idCategory"]);
            $category->setName($line["name"]);
            $category->setType($line["type"]);

            $categories[] = $category;
        }
        return $categories;
    }
}
