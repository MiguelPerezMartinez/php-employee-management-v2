<?php
class Router
{
  public $uri;
  public $controller;
  public $method;
  public $param;


  public function __construct()
  {
    session_start();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Router');

    $this->setUri();
    $this->setController();
    $this->setMethod();
    $this->setParam();

    $controller = $this->controller . 'Controller';
    $controllerFile = CONTROLLERS . '/' . $controller . '.php';

    if (file_exists($controllerFile)) {
      require_once $controllerFile;
      $controller = new $controller;

      if (isset($this->method)) {
        $this->executionFlow = new executionFlow;
        $this->executionFlow->showName('isset controller');
        if (method_exists($controller, $this->method)) {
          $this->executionFlow = new executionFlow;
          $this->executionFlow->showName('method exists');
          if (isset($this->uri[4])) {
            $this->executionFlow = new executionFlow;
            $this->executionFlow->showName('isset param');
            $controller->{$this->method}($this->uri[4]);
          } else {
            $this->executionFlow = new executionFlow;
            $this->executionFlow->showName('!isset param');
            $controller->{$this->method}();
          }
        } else {
          $this->executionFlow = new executionFlow;
          $this->executionFlow->showName('method error');
        }
      }
    } else {
      $this->executionFlow = new executionFlow;
      $this->executionFlow->showName('error controller here');
    }
  }

  public function setUri()
  {
    $this->uri = explode('/', $_SERVER['REQUEST_URI']);
  }

  public function setController()
  {
    $this->controller = ucfirst(strtolower($this->uri[2] === '' ? 'login' : $this->uri[2]));
  }

  public function setMethod()
  {
    $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'index';
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
