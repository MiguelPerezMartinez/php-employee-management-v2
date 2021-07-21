<?php
class View
{
  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('View');

    require VIEWS . '/' . 'Employee/dashboard.php';
  }

  // public function render()
  // {
  //   require VIEWS . '/' . 'Login';
  // }
}
