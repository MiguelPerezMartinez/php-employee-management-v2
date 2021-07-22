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
            echo "try";
            $dsn = "mysql:host=localhost;dbname=" . $this->dbase;
            echo "dsn";
            $this->dbh = new PDO($dsn, $this->user, $this->password);
            echo "dbh";
            return $this->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            // Here we shall redirect to error View
        }
    }
}
