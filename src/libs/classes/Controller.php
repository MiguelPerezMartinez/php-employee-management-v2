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

  }
}
