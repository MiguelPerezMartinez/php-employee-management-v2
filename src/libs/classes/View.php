<?php
class View
{
  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('View');

    //Temporal
    // $name = 'login/index';
    // $this->render($name);
    //
  }

  public function render($name)
  {
    echo "render view $name";
    require VIEWS . "/$name.php";
  }
}
