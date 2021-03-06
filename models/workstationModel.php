<?php

class Workstation
{
    private $id;
    private $name;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $strSql = "SELECT *  FROM  workstation";
            return $this->pdo->select($strSql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    
}
