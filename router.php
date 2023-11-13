<?php
    require_once './config.php';
    require_once './libs/router.php';
    require_once './api/controllers/products.api.controller.php';
    require_once './api/controllers/category.api.controller.php';

    $router = new Router();



    $router->addRoute('productos',   'GET',    'ProductsApiController', 'get');
    $router->addRoute('categorias',     'POST',   'CategoryApiController', 'addCategory');
    $router->addRoute('productos/:ID', 'GET',    'ProductsApiController', 'get' );
    $router->addRoute('productos',   'GET',    'ProductsApiController', 'getAll');
    $router->addRoute('productos/:ID', 'PUT',    'ProductsApiController', 'update');    
   
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);
