<?php

include_once("BD.class.php");
include_once("Categoria.class.php");

class ControleCategoria{
		
		public function selecionar(){
			$bd = new BD();
			$res = $bd->consulta("select id, nome from categoria");
			$cursos = array();
			if(is_array($res)){
				foreach($res as $linha){
					$curso = new Categoria();
					$curso->setId($linha["id"]);
					$curso->setNome($linha["nome"]);
					$cursos[] = $curso;
				}
			}
			return $cursos;
		}

		public function selecionarUm($curso){
			$bd = new BD();
			$res = $bd->consulta("select id, nome from categoria where id='".$curso->getId()."'");
			if(is_array($res)){
				$linha = $res[0];
				$cursoUm = new Categoria();
				$cursoUm->setId($linha["id"]);
				$cursoUm->setNome($linha["nome"]);
			}
			return $cursoUm;
		}

		public function controleAcao($acao, $curso){
			if ($acao == "inserir"){
				$res = $this->inserir($curso);
			}
			elseif($acao == "alterar"){
				$res = $this->alterar($curso);
			}
			elseif($acao == "deletar"){
				$res = $this->deletar($curso);
			}
			return $res;
		}

		public function inserir($curso){
			$bd = new BD(); 
			$res = $bd->altera("INSERT INTO categoria (nome) VALUES('".$curso->getNome()."')");
			return $res;
		}

		
		public function alterar($curso){
			$bd = new BD();
			$res = $bd->altera("UPDATE categoria SET nome='".$curso->getNome()."'  WHERE id = '".$curso->getId()."' ");
			return $res;
		}

		public function deletar($curso){
			$bd = new BD();
			$res = $bd->altera("DELETE FROM categoria WHERE id = '".$curso->getId()."'");
			return $res;
		}
}
?>