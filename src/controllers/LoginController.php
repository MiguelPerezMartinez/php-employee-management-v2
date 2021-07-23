<?php
class LoginController extends Controller
{
  protected $executionFlow;

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Login controller');
    $this->session = new SessionController;

    parent::__construct();
    $this->loadModel('login');
  }

  public function index()
  {
    if ($this->session->checkSession()) {
      $view = "employee/dashboard";
      header('Location: ' . BASE_URL . $view);
      $this->view->render($view);
    } else {
      $view = "login/index";
      $this->view->render($view);
    }
  }

  function login()
  {
    $result = $this->model->login($_POST['username'], $_POST['password']);
    if ($this->session->checkSession()) {
      $view = "employee/dashboard";
      header('Location: ' . BASE_URL . $view);
      $this->view->render($view);
    } else {
      $view = "login/index";
      header('Location: ' . BASE_URL . $view);
      $this->view->render($view);
    }
  }

  function logout()
  {
    session_destroy();
    $view = "login/index";
    header('Location: ' . BASE_URL . $view);
    $this->view->render($view);
  }
}
