<?php
require_once "./app/models/admin.model.php";
require_once "./app/views/admin.view.php";

class AdminController{
    private $view;
    private $model;

    public function __construct() {
        AuthHelper::verifyStrict();
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    function showAgregar(){
        $categorias = $this->model->getCategorias();     
        $this->view->showAgregar($id = null,$categorias);
       
    }

    function showEditar($id){
        $categorias = $this->model->getCategorias(); 
        $this->view->showEditar($id,$categorias);
    }
    function showAgregarCat(){
        $this->view->showAgregarCat();
    }
    function showEditarCat($id){
        $this->view->showEditarCat($id);
    }

    function AgregarProducto(){

    $nombre=$_POST['Nombre'];
    $precio=$_POST['Precio'];
    $descripcion=$_POST['Descripcion'];
    $categoria=$_POST['CategoriaID'];

        if (empty($nombre)||empty($precio)||empty($categoria)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertarProducto($nombre,$descripcion, $precio, $categoria);

        if ($id) {
            $this->view->showAgregar($id,$categoria);
        } else {
            echo "Error al insertar la tarea";
        }

    } 

    function editProducto($id){

        $nombre=$_POST['Nombre'];
        $precio=$_POST['Precio'];
        $categoria=$_POST['CategoriaID'];

        if (empty($nombre)||empty($precio)||empty($categoria)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $this->model->editProducto($nombre, $precio, $categoria, $id);

        header('Location: ' . BASE_URL . 'home');
    }

    public function deleteProducto($id){
        $this->model->deleteProducto($id);
        header('Location: ' . BASE_URL . '/home');
    }

    function AgregarCategoria(){

        $nombre=$_POST['Nombre'];
       
    
            if (empty($nombre)){
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $id = $this->model->insertarCategoria($nombre);
    
            if ($id) {
                $this->view->showAgregarCat($id);
            } else {
                echo "Error al insertar la tarea";
            }
    
        }

        function editCategoria($CategoriaID){

            $nombre=$_POST['Nombre'];
            
    
            if (empty($nombre)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $this->model->editCategoria($nombre,$CategoriaID);
    
            header('Location: ' . BASE_URL . 'home');
        }

        public function deleteCategoria($CategoriaID){
            $this->model->deleteCategoria($CategoriaID);
            header('Location: ' . BASE_URL . '/home');
        }

        
}