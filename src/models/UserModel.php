<?php

class UserModel extends Model
{

  public function __construct()
  {
    $this->executionFlow = new executionFlow;
    $this->executionFlow->showName('UserModel');

    parent::__construct();
  }

  public function fetchUsers()
  {

    $stmt = $this->db->petition()->prepare("SELECT * FROM users");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $result = [];
    while ($row = $stmt->fetch()) {
      array_push($result, $row);
    }

    $this->db = null;
    return $result;
  }

  public function fetchSingle($id)
  {

    $stmt = $this->db->petition()->prepare("SELECT * FROM employees WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    try {
      $stmt->execute([
        'id' => $id
      ]);
      $result = $stmt->fetch();
      $this->db = null;
      return $result;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function put($id)
  {
    $stmt = $this->db->petition()->prepare("UPDATE users SET name = :name, email = :email, auth = :auth WHERE userId = :id");
    try {
      $stmt->execute([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'auth' => $_POST['auth'],
        'id' => $id
      ]);

      $this->db = null;
    } catch (PDOException $e) {
      echo $e;
      $this->db = null;
      return false;
    }
  }

  public function create()
  {
    $stmt = $this->db->petition()->prepare("INSERT INTO users (name, password, email, auth) VALUES (:name, :password,  :email, :auth)");
    try {
      $stmt->execute([
        'name' => $_POST['name'],
        'password' => password_hash($this->randomPass(), PASSWORD_DEFAULT),
        'email' => $_POST['email'],
        'auth' => $_POST['auth'],
      ]);
      $this->db = null;
      return true;
    } catch (PDOException $e) {
      echo $e;
      $this->db = null;
      return false;
    }
  }

  public function remove($id)
  {

    if ($id) {
      $stmt = $this->db->petition()->prepare("DELETE FROM users WHERE userId = :id");
      try {
        $stmt->execute([
          'id' => $id
        ]);
        $this->db = null;
        return true;
      } catch (PDOException $e) {
        $this->db = null;
        return false;
      }
    }
  }

  public function randomPass()
  {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!·$%&/()=?¿-.,;:_/*-+";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass);
  }
}
