<?php
class EmployeeController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Employee controller');
  

  $this->model = new EmployeeModel;
  $this->model->getAllEmployees();
  $this->view = new View;
  }
}
