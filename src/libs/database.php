<?php

class database
{

    private $dbase;
    private $user;
    private $password;
    private $dbh;

    public function __construct()
    {
        $this->dbase = DB;
        $this->user = USER;
        $this->password = PASS;
        $this->dbh;
    }

    public function petition()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=" . $this->dbase . ";charset=UTF8";
            $this->dbh = new PDO($dsn, $this->user, $this->password);
            return $this->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            // Here we shall redirect to error View
        }
    }
}
