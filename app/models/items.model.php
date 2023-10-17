<?php

        require_once './app/models/model.php';
        class ProductosModel extends Model{

        public function getProductos(){
            $sentencia = $this->db->prepare("SELECT producto.*, categoria.CategoriaID as categoria FROM producto JOIN categoria ON producto.CategoriaID = categoria.CategoriaID ");
            $sentencia->execute();
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            
            return $productos;
    
        }
        public function getProductoPorID($productoID){
            $sentencia = $this->db->prepare("SELECT producto.*, categoria.Nombre as categoria FROM producto JOIN categoria ON producto.CategoriaID = categoria.CategoriaID WHERE producto.ProductoID = ?");
            $sentencia->execute([$productoID]);
            $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        
            return $producto;
        }

        public function getCategorias() {
            $sentencia = $this->db->prepare("SELECT * FROM categoria");
            $sentencia->execute();
            $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
            return $categorias;
        }
        
        public function getProductosPorCategoria($categoriaID){
            $sentencia = $this->db->prepare("SELECT producto.*, categoria.Nombre as categoria FROM producto JOIN categoria ON producto.CategoriaID = categoria.CategoriaID WHERE categoria.CategoriaID = ?");
            $sentencia->execute([$categoriaID]);
            $ProductosPorCategoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
            return $ProductosPorCategoria;
        }
        
    }
