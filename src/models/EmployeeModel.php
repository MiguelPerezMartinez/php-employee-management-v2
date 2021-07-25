<?php

class EmployeeModel extends Model
{

    public function __construct()
    {
        $this->executionFlow = new executionFlow;
        $this->executionFlow->showName('EmployeeModel');

        parent::__construct();
    }

    public function fetchEmployees()
    {

        $stmt = $this->db->petition()->prepare("SELECT * FROM employees");
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
        $stmt = $this->db->petition()->prepare("UPDATE employees SET name = :name, lastName = :lastName, email = :email, gender = :gender, city = :city, streetAddress = :streetAddress, state = :state, age = :age, postalCode = :postalCode, phoneNumber = :phoneNumber WHERE id = :id");
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
                'id' => $id
            ]);
            $this->db = null;
            return true;
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
            $stmt = $this->db->petition()->prepare("DELETE FROM employees WHERE id = :id");
            try {
                $stmt->execute([
                    'id' => $id
                ]);
                $this->db = null;
                return true;
            } catch (PDOException $e) {
                return false;
            }
        } else {
            return false;
        }
    }
}
