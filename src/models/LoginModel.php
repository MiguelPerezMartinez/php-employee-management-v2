<?php
class LoginModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login($username, $password)
  {
    $stmt = $this->db->petition()->prepare("SELECT * FROM users WHERE name='$username'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $result = $stmt->fetch();

    if ($result) {
      if (password_verify($password, $result['password'])) {
        $_SESSION['userId'] = $result['userId'];
        $_SESSION['time'] = time();
        $_SESSION['lifeTime'] = 60 * 10;
        // return true;
      }
    }
    // return false;
  }
}
