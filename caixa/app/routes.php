<?php
/** define as rotas */

$routes = [
     'index'=>'app@index',
     'lancamento' => 'app@lancamento',
];

$url = 'index';

if(isset($_GET['utm'])){

     if(!key_exists($_GET['utm'], $routes)){
          $url = 'index';
     }else {
          $url = $_GET['utm'];
     }
}

$files = explode('@', $routes[$url]);
$controller = ucfirst($files[0]);
$controller= "app\\controllers\\".$controller;
$method = $files[1];

$ctrl = new $controller();
$ctrl->$method();

