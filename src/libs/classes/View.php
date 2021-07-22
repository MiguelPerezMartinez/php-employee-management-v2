<?php
class View
{
  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('View');
  }

  public function render($name)
  {
    echo "render view $name";
    require VIEWS . "/$name.php";
  }
}
