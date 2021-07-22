<?php

class database {

    public $dbase;
    public $user;
    public $password;
    public $dbh;

    public function __constructor() {
        $this->dbase = "employees2";
        $this->user = "root";
        $this->password = "";
        $this->dbh;
    }

    public function petition() {
        echo "dbase: " . $this->dbase .  "</br>" . "user: " . $this->user . "</br>" . "pass: " . $this->password . "</br>" ;
        try {
        $dsn = "mysql:host=localhost;dbname=" . $this->dbase;
        $this->dbh = new PDO($dsn, "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
            // Here we shall redirect to error View
        }
    }

    public function getAllEmployees() {

        $this->petition();
        $stmt = $this->dbh->prepare("SELECT * FROM employees");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = [];
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }

        print_r($result);
    }
    

}