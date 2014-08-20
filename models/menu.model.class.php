<?php

class Menu{
    public $idMenu;
    public $titulo;
    public $localizacao;
    public $descricao;
    
    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getLocalizacao() {
        return $this->localizacao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }


}

