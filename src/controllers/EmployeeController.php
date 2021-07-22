<?php
class EmployeeController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Employee controller');
  }

  public function dashboard() {
    $view = "Employee/dashboard";
    $this->view->render($view);
  }

  public function allEmployees() {
    $this->model = new EmployeeModel;
    $employees = $this->model->fetchEmployees();

    print_r(json_encode($employees));
  }

  public function deleteEmployee($id) {
    $this->model = new EmployeeModel;
    $this->model->remove($id);
  }
}
