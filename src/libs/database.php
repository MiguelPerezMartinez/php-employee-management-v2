<?php

class database {

    private $dbase;
    private $user;
    private $password;
    private $dbh;

    public function __construct() {
        $this->dbase = DB;
        $this->user = USER;
        $this->password = PASS;
        $this->dbh;
    }

    public function petition() {
        try {
        $dsn = "mysql:host=localhost;dbname=" . $this->dbase;
        $this->dbh = new PDO($dsn, $this->user, $this->password);
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