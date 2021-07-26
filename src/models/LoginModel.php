<?php
class LoginModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login($username, $password)
  {
    if (gettype($this->db->petition()) === "object") {
      $stmt = $this->db->petition()->prepare("SELECT * FROM users WHERE name = :name");
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute([
        'name' => "$username"
      ]);

      $result = $stmt->fetch();

    if ($result) {
      if (password_verify($password, $result['password'])) {
        $_SESSION['userId'] = $result['userId'];
        $_SESSION['username'] = $result['name'];
        $_SESSION['auth'] = $result['auth'];
        $_SESSION['time'] = time();
        $_SESSION['lifeTime'] = 60 * 10;
        // return true;
      }
      // return false;
    } else {
      return $this->db->petition();
    }
  }
}
}
