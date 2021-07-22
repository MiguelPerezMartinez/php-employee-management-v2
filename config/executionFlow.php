<?php
class executionFlow
{
  public function showName($name)
  {
    $control = false;

    $control ? print_r($name . '</br>') : "";
  }
}
