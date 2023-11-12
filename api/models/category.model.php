<?php
    require_once './api/models/model.php';

class CategoryModel  extends Model {
    function insertCategory($material, $color){
       $query= $this->db->prepare('INSERT INTO categorias (material, color) VALUES(?,?)');
       $query->execute([$material, $color]);
       return $this->db->lastInsertId();
    }



}