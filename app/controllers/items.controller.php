<?php
require_once "./app/models/items.model.php";
require_once "./app/views/items.view.php";


class ProductosController {
    private $model;
    private $view;

    public function __construct() {
        AuthHelper::verify();
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
    }

    public function getProductos() {
        $producto = $this->model->getProductos();
        $categorias = $this->model->getCategorias(); 
        $this->view->MostrarProductos($producto, $categorias);
    }
    public function getCategorias() {
        $categorias = $this->model->getCategorias(); 
        $this->view->MostrarCategorias($categorias);
    }
    
    public function verProducto($productoID){
        $producto = $this->model->getProductoPorID($productoID);
    
        if ($producto) {
            $this->view->MostrarunProducto($producto);
        } else {
            $this->view->showError("Producto no encontrado");
        }
    }
    public function productosPorCategoria($categoriaID){
        $productos = $this->model->getProductosPorCategoria($categoriaID);
        $categorias = $this->model->getCategorias();
        
        $this->view->MostrarProductos($productos,$categorias);
    }
   
}