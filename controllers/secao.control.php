<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secao
 *
 * @author Guilherme.261295
 */
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/secao.model.php");


//include_once("../../models/profile.model.php");
//include_once("../../controllers/profile.control.php");

class ControllerSecao extends Controller {


    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from secao order by titilo");
        $secaos = array();
        foreach ($lines as $line) {
            $secao = new secao();
            $secao->setIdsecao($line["idsecao"]);
            $secao->setTitulo($line["titulo"]);
            $secao->setAlias($line["alias"]);
            $secao->setDescricao($line["descricao"]);
     
            $secaos[] = $secao;
        }
        return $secaos;
    }
    
    public function verifyExistenceSecao($secao) {
        $db = new Includes\Db();
        $lines = $db->query("select titulo from secao where titulo = :titulo", array(
            'titulo' => $secao->getTitulo(),
        ));

        return $lines;
    }    
    
    protected function selectAllDescending() {
        $db = new Includes\Db();
        
        $lines = $db->query("select * from secao order by titulo desc");
        $secaos = array();
        foreach ($lines as $line) {
            $secao = new secao();
            $secao->setIdsecao($line["idsecao"]);
            $secao->setTitulo($line["titulo"]);
            $secao->setAlias($line["alias"]);
            $secao->setDescricao($line["descricao"]);
			
            $secaos[] = $secao;
        }
        return $secaos;
    }
    
    protected function selectAllGrowing() {
        $db = new Includes\Db();
        
        $lines = $db->query("select * from secao order by titulo asc");
        $secaos = array();
        foreach ($lines as $line) {
            $secao = new secao();
            $secao->setIdsecao($line["idsecao"]);
            $secao->setTitulo($line["titulo"]);
            $secao->setAlias($line["alias"]);
            $secao->setDescricao($line["descricao"]);
			
            $secaos[] = $secao;
        }
        return $secaos;
    }    
    
    protected function selectOne($secao) {
        $db = new Includes\Db();
        $lines = $db->query("select * from secao where idsecao = :idsecao", array(
            'idsecao' => $secao->getIdsecao(),
        ));
        $secao = new secao();
		$secao->setIdsecao($lines[0]["idsecao"]);
		$secao->setTitulo($lines[0]["titulo"]);
		$secao->setAlias($lines[0]["alias"]);
		$secao->setDescricao($lines[0]["descricao"]);		

        return $secao;
    }


    protected function insert($secao) {
        $db = new Includes\Db();
        return $db->query('insert into secao (idsecao, titulo, alias, descricao) values 
		(NULL, :titulo, :alias, :descricao) ', array(
                    'titulo' => $secao->getTitulo(),
                    'alias' => $secao->getAlias(),
                    'descricao' => $secao->getDescricao()
        ));
    }

    protected function update($secao) {
        $db = new Includes\Db();
		return $db->query('update secao set titulo = :titulo, alias = :alias, descricao = :descricao where idsecao = :idsecao', array(
                    'titulo' => $secao->getTitulo(),
                    'alias' => $secao->getAlias(),
                    'descricao' => $secao->getDescricao(),
					'idsecao' => $secao->getIdSecao()
                    
        ));
    }

    protected function selecionarPaginacao($pag) {
        $db = new Includes\Db();
        $termoInicial = ($pag['pagina'] - 1) * $pag['limite'];
        $sql = "select * from secao ";
        if(isset($pag['pesquisa'])){
            $sql = "select * from secao where name like '%".$pag['pesquisa']."%' or description like '%".$pag['pesquisa']."%'";
        }
        if (!isset($pag['ordenacao'])) {
            $sql .= "ORDER BY idSecao DESC ";
        } else if ($pag['ordenacao'] == "asc" || $pag['ordenacao'] == "desc") {
            $sql .= "ORDER BY titulo " . $pag['ordenacao'] . " ";
        }
        $sql .= " LIMIT " . $termoInicial . "," . $pag['limite'];
        $lines = $db->query($sql);
        $profiles = array();
        foreach ($lines as $line) {
            $profile = new Secao();
            $profile->setIdSecao($line["idsecao"]);
            $profile->setTitulo($line["titulo"]);
            $profile->setAlias($line["alias"]);
            $profile->setDescricao($line["descricao"]);
            $profiles[] = $profile;
        }
        return $profiles;
    }

    protected function contarPaginas($limite) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/" . $limite . ") as pages FROM secao");
        return ceil($lines[0]['pages']);
    }
    protected function contarPaginas2($pesquisa) {
        $db = new Includes\Db();
        $lines = $db->query("SELECT (count(*)/ 5 ) as pages FROM secao where titulo like '%".$pesquisa."%' or alias like '%".$pesquisa."%'");
        return ceil($lines[0]['pages']);
    }    
    
    protected function delete($secao) {
        $db = new Includes\Db();

        $ret1 = $db->query("delete from secao where idsecao = :idsecao", array(
            'idsecao' => $secao->getIdsecao(),
        ));

        if ($ret1) {
            return true;
        } else {
            return false;
        }
    }

}
