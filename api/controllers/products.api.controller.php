<?php
    require_once './api/controllers/api.controller.php';
    require_once './api/models/products.model.php';

    class ProductsApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new ProductsModel();
        }
        function get($id = null){
            if (isset($_GET['precio']) && isset($_GET['DESC'])) {
                    $sort = $_GET['precio'];
                    $order = $_GET['DESC'];
        
                    if ($sort == 'precio' && ($order == 'DESC')) {
                        $filterProducts = $this->model->getOrder($sort, $order);
                        $this->view->response(['msg' => 'El precio de los productos en forma descendente son: ' . ($filterProducts)], 200);
                    } else {
                        $this->view->response(['msg' => 'Los parametros no son validos'], 400);
                           }
              }
    else{
        if(!$id){
            $products = $this->model->getAll();
            if(empty($products)){
                $this->view->response($products, 404);
            }
            else{
                $this->view->response($products, 200);
            }
        }
    }
        }
    

        function productID($id){
            if($id){
                $product= $this->model->getProductsID($id);
              if(empty($product)){
                $this->view->response($product, 404);
               }
               else{
                $this->view->response($product, 200);
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