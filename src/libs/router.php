<?php
class Router
{
  public $uri;
  public $controller;
  public $method;
  public $param;


  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Router');

    $this->setUri();
    $this->setController();
    $this->setMethod();
    $this->setParam();
  }

  public function setUri()
  {
    $this->uri = explode('/', $_SERVER['REQUEST_URI']);
  }

  public function setController()
  {
    require_once CONTROLLERS . '/LoginController.php';
    $this->controller = new LoginController;
    // $this->controller = $this->uri[2] === '' ? 'Home' : $this->uri[2];
    // require_once $this->controller . 'Controller.php';
    // $this->controllerInstance = new $this->controller . 'Controller';
  }

  public function setMethod()
  {
    $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'exec';
  }

  public function setParam()
  {
    $this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
  }

  public function getUri()
  {
    return $this->uri;
  }

  public function getController()
  {
    return $this->controller;
  }

  public function getmethod()
  {
    return $this->method;
  }

  public function getParam()
  {
    return $this->param;
  }
}
