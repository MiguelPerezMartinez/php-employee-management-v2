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

  public function dashboard()
  {
    if ($this->session->checkSession()) {
      $view = "employee/dashboard";
      $this->view->render($view);
    } else {
      $view = "login/index";
      $this->view->render($view);
    }
  }

  public function allEmployees()
  {
    $this->model = new EmployeeModel;
    $employees = $this->model->fetchEmployees();

    print_r(json_encode($employees));
  }
}
