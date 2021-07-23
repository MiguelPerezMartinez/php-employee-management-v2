<?php
abstract class Controller
{
  protected $executionFlow;
  protected $view;
  protected $model;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Controller');
    $this->view = new View;
    $this->session = new SessionController;
  }

  function loadModel($name)
  {
    $name = ucfirst(strtolower($name));
    require_once MODELS . "/{$name}Model.php";
    $model = "{$name}Model";
    $this->model = new $model;
  }
}
