<?php

    require_once './app/models/model.php';
    class AuthModel extends Model{

    public function getByUsername($user) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
