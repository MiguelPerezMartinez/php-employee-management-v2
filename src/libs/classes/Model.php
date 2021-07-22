<?php
abstract class Model
{
  protected $executionFlow;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Model');

    $this->db = new Database();
  }
  
}
