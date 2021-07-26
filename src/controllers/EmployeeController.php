<?php
class EmployeeController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Employee controller');
    $this->loadModel('employee');
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

  public function employee() {
      $view = "employee/employee";
      $this->view->render($view);
  }

  public function current($id) {
    $this->model = new EmployeeModel;
    $employee = $this->model->fetchSingle($id);

    if ($employee) {
      $view = "employee/employee";
      $this->view->employee = $employee;
      $this->view->render($view);
    } else {
      header("Location: " . BASE_URL . "error/notfound");
    }
  }

  public function allEmployees() {
    $this->model = new EmployeeModel;
    $employees = $this->model->fetchEmployees();

    print_r(json_encode($employees));
  }

  public function updateEmployee($id) {
    $this->model = new EmployeeModel;
    $update = $this->model->put($id);

    if ($update) {
      header("Location: " . BASE_URL . "employee/dashboard");
    } else {
      header("Location: " . BASE_URL . "error/updateError");
    }
  }

  public function submitEmployee() {
    $this->model = new EmployeeModel;
    $created = $this->model->create();

    if ($created) {
      header("Location: " . BASE_URL . "employee/dashboard");
    } else {
      header("Location: " . BASE_URL . "error/submitError");
    }
  }

  public function deleteEmployee($id) {
    $this->model = new EmployeeModel;
    $removed = $this->model->remove($id);

    if ($removed == false) {
      header("Location: " . BASE_URL . "error/deleteError");
    }
  }
}
