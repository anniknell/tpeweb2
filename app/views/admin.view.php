<?php

class AdminView {
    public function showAgregar($id = null,$categorias){
        require_once './templates/agregar.phtml';
    }
    public function showEditar($id,$categorias){
        require_once './templates/editar.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function showAgregarCat($id = null){
        require_once './templates/agregarcategoria.phtml';
    }
    public function showEditarCat($CategoriaID){
        require_once './templates/editarcategoria.phtml';
    }
}