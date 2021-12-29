<?php

//
require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
 use app\controller\productController;

$router = new Router();

$router->get('/',[productController::class,"index"]);
$router->get('/create',[productController::class,"create"]);
$router->get('/update',[productController::class,"edit"]);

$router->post('/',[productController::class,"index"]);
$router->post('/create',[productController::class,"create"]);
$router->post('/update',[productController::class,"edit"]);
$router->post('/delete',[productController::class,"index"]);

$router->resolve();

?>