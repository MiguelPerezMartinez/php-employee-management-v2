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

  public function employee($id="") {
    if (isset($id)) {
      $view = "Employee/employee";
      
      $this->model = new EmployeeModel;
      $employee = $this->model->fetchSingle($id);

      $this->view->employee = $employee;
      $this->view->render($view);

    } else {
      $view = "Employee/employee";
      $this->view->render($view);
    }
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
