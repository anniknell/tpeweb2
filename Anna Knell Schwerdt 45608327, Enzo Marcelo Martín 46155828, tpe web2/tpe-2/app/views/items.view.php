<?php

class ProductosView {
    public function MostrarProductos($productos,$categorias) {
        $count = count($productos);   
        require 'templates/listaitems.phtml';
    }
    public function MostrarCategorias($categorias) {
        $count = count($categorias);   
        require 'templates/listacategorias.phtml';
    }
    public function MostrarUnProducto($producto) {
        require 'templates/producto.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }

}
