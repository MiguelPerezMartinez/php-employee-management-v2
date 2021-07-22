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
    $view = "login/index";
    $this->view->render($view);
  }

  function login()
  {
    $result = $this->model->login('test', 'test');
    if ($result) {
      header('Location: ' . BASE_URL . 'employee/dashboard');
    }
  }
}
