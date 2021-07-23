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
      if (($_SESSION['time'] + $_SESSION['lifeTime']) <= time()) {
        session_destroy();
        return false;
      }
      return true;
    }
    return false;
  }
}
