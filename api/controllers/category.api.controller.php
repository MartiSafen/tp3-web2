<?php
    require_once './api/controllers/api.controller.php';
    require_once './api/models/category.model.php';

    class CategoryApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new CategoryModel();
        }
             function addCategory(){
                $body=$this->getData();
                $material=$body->material;
                $color=$body->color;
                $id = $this->model->insertCategory($material, $color);
                $this->view->response(['Se inserto correctamente con el id = '.$id],201);
            }
        }
    