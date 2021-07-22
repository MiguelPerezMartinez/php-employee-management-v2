<?php
class Model
{
  protected $executionFlow;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Model');

  }
  public function data() {
    $db = new Database();
    $db->getAllEmployees();
    echo "</br>";

  }
  
}
