<?php
    require_once './api/models/model.php';

class ProductsModel  extends Model {  
   
    function getAll() {
        $query = $this->db->prepare('SELECT * FROM productos ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

    
    }
    function getOrder($sort, $order) {
            $query = $this->db->prepare("SELECT * FROM productos ORDER BY $sort $order");
            $query->execute([$sort, $order]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    

    function getProductsID($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id = ?');
        $query->execute([$id]);

        return  $query->fetch(PDO::FETCH_OBJ);

    }



    function updateProduct($id_categoria, $nombre, $talle, $precio, $vendedor, $id) {    
        $query = $this->db->prepare('UPDATE productos SET id_categoria=?, nombre = ?, 
        talle = ?, precio = ?, vendedor = ? WHERE id = ?');
        $query->execute([$id_categoria, $nombre, $talle, $precio, $vendedor, $id]);
    }
  
}
