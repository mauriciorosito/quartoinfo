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
