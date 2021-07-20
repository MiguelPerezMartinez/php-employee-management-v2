<?php
class LoginController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Login controller');
  }
}
