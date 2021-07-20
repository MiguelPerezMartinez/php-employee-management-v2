<?php
require 'src/libs/Router.php';

$router = new Router;

echo '<pre>';
print_r($router->getUri());
echo '</pre>';

$controller = $router->getController();
$method = $router->getMethod();
$param = $router->getParam();

echo "Controller: $controller </br>";
echo "Method: $method </br>";
echo "Param: $param";
