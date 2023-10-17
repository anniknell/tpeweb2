<?php

    require_once './app/models/model.php';
    class AdminModel extends Model{

    
    
    function insertarProducto($nombre,$descripcion,$precio,$categoria){

        $query = $this->db->prepare('INSERT INTO producto (Nombre,Descripcion, Precio, CategoriaID) VALUES(?,?,?,?)');
        $query->execute([$nombre,$descripcion,$precio, $categoria]);

        return $this->db->lastInsertId();

    }

    function editProducto($nombre, $precio, $categoria, $id){
        $query = $this->db->prepare('UPDATE producto SET Nombre=?, Precio=?, CategoriaID=? WHERE ProductoID=?');
        $query->execute([$nombre, $precio, $categoria,$id]);

    }

    function deleteProducto($id){

        $query = $this->db->prepare('DELETE FROM producto WHERE ProductoID=?');
        $query->execute([$id]);
    }

    function insertarCategoria($nombre){

        $query = $this->db->prepare('INSERT INTO categoria (Nombre) VALUES(?)');
        $query->execute([$nombre]);

        return $this->db->lastInsertId();

    }

    function editCategoria($nombre,$CategoriaID){
        $query = $this->db->prepare('UPDATE categoria SET Nombre=? WHERE CategoriaID=?');
        $query->execute([$nombre,$CategoriaID]);

    }

    function deleteCategoria($CategoriaID){
        $query = $this->db->prepare('DELETE FROM producto WHERE CategoriaID=?');
        $query->execute([$CategoriaID]);

        $query = $this->db->prepare('DELETE FROM categoria WHERE CategoriaID=?');
        $query->execute([$CategoriaID]);
    }

    public function getCategorias() {
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
        return $categorias;
    }

}