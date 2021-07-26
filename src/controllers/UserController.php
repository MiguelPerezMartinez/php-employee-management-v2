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
      $view = "user/user";
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

    return true;

    if ($update) {
      $view = 'user/dashboard';
      $this->view->render($view);
    } else {
      echo "ERROR</br>";
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function submitUser()
  {
    $created = $this->model->create();
    return $created;
    if (!$created) {
      echo "ERROR</br>";
      $view = "error/error";
      $this->view->render($view);
    }
  }

  public function deleteUser($id)
  {
    $delete = $this->model->remove($id);
  }
}
