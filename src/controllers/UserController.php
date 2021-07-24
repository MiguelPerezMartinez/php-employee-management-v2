<?php
class UserController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('User controller');
    $this->loadModel('user');
  }

  public function dashboard()
  {
    if ($this->session->checkSession()) {
      $view = "user/dashboard";
      $this->view->render($view);
    } else {
      $view = "login/index";
      $this->view->render($view);
    }
  }

  public function employee()
  {
    $view = "employee/employee";
    $this->view->render($view);
  }

  public function current($id)
  {
    $this->model = new EmployeeModel;
    $employee = $this->model->fetchSingle($id);

    if ($employee) {
      $view = "employee/employee";
      $this->view->employee = $employee;
      $this->view->render($view);
    } else {
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function allUsers()
  {
    $this->model = new UserModel;
    $employees = $this->model->fetchUsers();

    print_r(json_encode($employees));
  }

  public function updateUser($id)
  {
    $this->model = new UserModel;
    $update = $this->model->put($id);

    if ($update) {
      print_r(json_encode($update));
    } else {
      echo "ERROR</br>";
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function submitEmployee()
  {
    $this->model = new EmployeeModel;
    $created = $this->model->create();

    if ($created) {
      header("Location: " . BASE_URL . "user/dashboard");
    } else {
      echo "ERROR</br>";
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function deleteUser($id)
  {
    $this->model = new UserModel;
    $this->model->remove($id);
  }
}
