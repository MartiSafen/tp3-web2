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
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function columnExists($columna)
    {
        $query = $this->db->prepare('DESCRIBE `productos`');
        $query->execute();
        $columnas = $query->fetchAll(PDO::FETCH_COLUMN);

        return in_array($columna, $columnas);
    }



     function getProductsID($id){ // obtengo una categoria por
        $query=$this->db->prepare('SELECT * FROM productos WHERE id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



    function updateProduct($id_categoria, $nombre, $talle, $precio, $vendedor, $id) {    
        $query = $this->db->prepare('UPDATE productos SET id_categoria=?, nombre = ?, 
        talle = ?, precio = ?, vendedor = ? WHERE id = ?');
        $query->execute([$id_categoria, $nombre, $talle, $precio, $vendedor, $id]);
    }
  
}
