<?php
class secao {

    private $idsecao;
	private $titulo;
	private $alias;
	private $descricao;
    
    public function getIdsecao() {
        return $this->idsecao;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setIdsecao($idsecao) {
        $this->idsecao = $idsecao;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
}
?>