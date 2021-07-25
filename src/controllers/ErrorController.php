<?php

class errorController extends Controller {

    protected $executionFlow;

    public function __construct()
    {
    parent::__construct();
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('Error controller');
    }

    function notFound() {
        $view = "error/error";
        $this->view->render($view);
    }

    function deleteError() {
        $view = "employee/dashboard";
        $deleteError = "<script type='text/javascript'>alert('Error: can\'t access the server \\n The employee hasn\'t been deleted!');</script>";

        $this->view->deleteError = $deleteError;
        $this->view->render($view);
    }

    function updateError() {
        $view = "employee/dashboard";
        $updateError = "<script type='text/javascript'>alert('Error: can\'t access the server \\n The employee hasn\'t been updated!');</script>";

        $this->view->updateError = $updateError;
        $this->view->render($view);
    }

    function submitError() {
        $view = "employee/employee";
        $submitError = "<script type='text/javascript'>alert('Error: can\'t access the server\\n The employee hasn\'t been submitted!');</script>";

        $this->view->submitError = $submitError;
        $this->view->render($view);
    }

}