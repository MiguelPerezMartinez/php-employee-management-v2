<?php
class View
{

  public function render($name)
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName("render view $name");
    require VIEWS . "/$name.php";
  }
}
