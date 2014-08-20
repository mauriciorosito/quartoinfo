<?php

class subMenu{
    public $idSubMenu;
    public $titulo;
    public $tipo;
    public $descricao;
    public $idMenu;
    
public function getIdSubMenu() {
return $this->idSubMenu;
}

public function getTitulo() {
return $this->titulo;
}

public function getTipo() {
return $this->tipo;
}

public function getDescricao() {
return $this->descricao;
}

public function getIdMenu() {
return $this->idMenu;
}

public function setIdSubMenu($idSubMenu) {
$this->idSubMenu = $idSubMenu;
}

public function setTitulo($titulo) {
$this->titulo = $titulo;
}

public function setTipo($tipo) {
$this->tipo = $tipo;
}

public function setDescricao($descricao) {
$this->descricao = $descricao;
}

public function setIdMenu($idMenu) {
$this->idMenu = $idMenu;
}


}



