<?php
abstract class Controller
{
  protected $executionFlow;
  protected $view;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Controller');

    $this->view = new View;
  }
}
