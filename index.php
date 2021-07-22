<?php
require_once 'config/constants.php';
require_once 'config/db.php';

require_once 'config/executionFlow.php';
require_once 'src/libs/database.php';
require_once 'src/libs/classes/Model.php';
require_once 'src/models/EmployeeModel.php';
require_once 'src/libs/classes/View.php';
require_once 'src/libs/classes/Controller.php';

require 'src/libs/Router.php';

$router = new Router;


// $router = new Router;

// echo '<pre>';
// print_r($router->getUri());
// echo '</pre>';

// $controller = $router->getController();
// $method = $router->getMethod();
// $param = $router->getParam();

// echo "Controller: $controller </br>";
// echo "Method: $method </br>";
// echo "Param: $param";
