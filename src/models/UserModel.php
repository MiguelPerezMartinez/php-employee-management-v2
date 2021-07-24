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

  // public function fetchSingle($id)
  // {

  //   $stmt = $this->db->petition()->prepare("SELECT * FROM employees WHERE id = :id");
  //   $stmt->setFetchMode(PDO::FETCH_ASSOC);
  //   try {
  //     $stmt->execute([
  //       'id' => $id
  //     ]);
  //     $result = $stmt->fetch();
  //     $this->db = null;
  //     return $result;
  //   } catch (PDOException $e) {
  //     return false;
  //   }
  // }

  public function put($id)
  {
    $stmt = $this->db->petition()->prepare("UPDATE users SET userId = :userId name = :name, email = :email, auth = :auth WHERE id = :id");
    try {
      $stmt->execute([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'auth' => $_POST['auth'],
        'userId' => $id
      ]);

      $result = [];
      while ($row = $stmt->fetch()) {
        array_push($result, $row);
      }

      $this->db = null;
      return $result;
    } catch (PDOException $e) {
      echo $e;
      $this->db = null;
      return false;
    }
  }

  public function create()
  {
    $stmt = $this->db->petition()->prepare("INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age, postalCode, phoneNumber) VALUES (:name, :lastName, :email, :gender, :city, :streetAddress, :state, :age, :postalCode, :phoneNumber)");
    try {
      $stmt->execute([
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'gender' => $_POST['gender'],
        'city' => $_POST['city'],
        'streetAddress' => $_POST['streetAddress'],
        'state' => $_POST['state'],
        'age' => $_POST['age'],
        'postalCode' => $_POST['postalCode'],
        'phoneNumber' => $_POST['phoneNumber'],
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
      $stmt = $this->db->petition()->prepare("DELETE FROM users WHERE id = :id");
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
}
