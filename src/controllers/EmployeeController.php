<?php
class EmployeeController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Employee controller');
    $this->session = new SessionController;
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

  public function employee($id="") {
    if ($id != "") {
      $view = "Employee/employee";
      
      $this->model = new EmployeeModel;
      $employee = $this->model->fetchSingle($id);
      
      $this->view->employee = $employee;
      $this->view->render($view);

    } else {
      $view = "employee/employee";
      $this->view->render($view);
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
      echo "funcionó";
      header("Location: " . BASE_URL . "employee/dashboard");
    } else {
      echo "NOP</br>";
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function deleteEmployee($id) {
    $this->model = new EmployeeModel;
    $this->model->remove($id);
  }
}
