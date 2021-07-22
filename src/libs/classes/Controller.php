<?php
abstract class Controller
{
  protected $executionFlow;
  protected $view;
  protected $model;

  public function __construct()
  {

  }

  function loadModel($name)
  {
    $name = ucfirst(strtolower($name));
    require_once MODELS . "/{$name}Model.php";
    $model = "{$name}Model";
    $this->model = new $model;
  }
}
