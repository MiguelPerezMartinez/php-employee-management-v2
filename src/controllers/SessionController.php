<?php
class SessionController
{
  public function __construct()
  {
    session_start();
  }
  public function checkSession()
  {
    if (isset($_SESSION['userId'])) {
      return true;
    }
    return false;
  }
}
