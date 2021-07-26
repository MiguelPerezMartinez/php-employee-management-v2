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
            $dsn = "mysql:host=" . HOST . ";dbname=" . $this->dbase . ";charset=UTF8";
            $this->dbh = new PDO($dsn, $this->user, $this->password);
            return $this->dbh;
        } catch (PDOException $e) {
            return $e->getCode();
        }
    }

    public function newDatabase() {
        $sql = file_get_contents(BASE_URL. "/db/create_db.sql");
        $dsn = "mysql:host=" . HOST . ";charset=UTF8";
        $this->dbh = new PDO($dsn, $this->user, $this->password);
        $stmt = $this->dbh->prepare($sql);
        try {
            $stmt->execute();
            $this->db = null;
        } catch (PDOException $e) {
            return $e->getCode();
        }
    }
}
