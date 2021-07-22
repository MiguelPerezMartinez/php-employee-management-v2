<?php

class EmployeeModel extends Model
{

    public function __construct()
    {
        $this->executionFlow = new executionFlow;
        $this->executionFlow->showName('EmployeeModel');

        parent::__construct();
    }

    public function getAllEmployees()
    {
        $stmt = $this->db->petition()->prepare("SELECT * FROM employees");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = [];
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }

        print_r($result);
    }
}
