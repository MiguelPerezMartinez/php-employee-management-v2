<?php
abstract class Model
{
  protected $executionFlow;

  public function __construct()
  {

    $this->db = new Database();
  }
}
