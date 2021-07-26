<?php
class LoginController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Login controller');

    parent::__construct();
    $this->loadModel('login');
  }

  public function index()
  {
    if ($this->session->checkSession()) {
      $view = "employee/dashboard";
      header('Location: ' . BASE_URL . $view);
    } else {
      $this->view->test = !$this->session->checkSession();
      $view = "login/index";
      $this->view->render($view);
    }
  }

  function login()
  {
    $result = $this->model->login($_POST['username'], $_POST['password']);

    if (gettype($result) === "integer") {
      if ($result == 1049) {
        $db = new DataBase;
        $db->newDatabase();
        $view = "login/index";
        header('Location: ' . BASE_URL . $view);
      } else {
        $view = "error/connection";
        header('Location: ' . BASE_URL . $view);
      }

    } else {
      if ($this->session->checkSession()) {
        $view = "employee/dashboard";
        header('Location: ' . BASE_URL . $view);
      } else {
        $view = "login/index";
        header('Location: ' . BASE_URL . $view);
      }
    }
    
  }

  function logout()
  {
    session_destroy();
    $view = "login/index";
    header('Location: ' . BASE_URL . $view);
  }
}
