<?php
    require_once './api/controllers/api.controller.php';
    require_once './api/models/products.model.php';

    class ProductsApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new ProductsModel();
        }
       function getAll(){
            $products = $this->model->getAll();
            if(empty($products)){
                $this->view->response($products, 404);
            }
            else{
                $this->view->response($products, 200);
            }
       }
        
    

                function get($params = [])
               {
                if (empty($params)) {

                    $sort = (!empty($_GET['precio'])) ? $_GET['precio'] : 'precio'; 
                    $order = (!empty($_GET['order']) && $_GET['order'] == 1) ? "DESC" : "ASC"; 
                    $products = $this->model->getOrder($sort, $order);
                    $this->view->response($products, 200);
                } else {
                    $product = $this->model->getProductsID($params[":ID"]);
                    if (!empty($product)) {
                        $this->view->response($product, 200);
                    } else {
                        $this->view->response('El producto con el id=' . $params[':ID'] . ' no existe.', 404);
                    }
        
                }
        
            }
           
           
    
        
        function update($params = []) {
            $id = $params[':ID'];
            $products = $this->model->getProductsID($id);

            if($products) {
                $body = $this->getData();
                $id_categoria = $body->id_categoria;
                $nombre = $body->nombre;
                $talle = $body->talle;
                $precio = $body->precio;
                $vendedor = $body->vendedor;

                $this->model->updateProduct($id_categoria,$nombre, $talle, $precio, $vendedor, $id);

                $this->view->response('La tarea con id='.$id.' ha sido modificada.', 200);
            } else {
                $this->view->response('La tarea con id='.$id.' no existe.', 404);
            }
        }
    }