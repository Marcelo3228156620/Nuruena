<?php

class Charge
{
    private $id;
    private $name;
    private $area_id;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function chargesList($id)
    {
        try {
            $strSql = "SELECT c.*
                FROM charge c
                INNER JOIN area a
                ON a.id = c.area_id
                WHERE a.id=:id";
            $arrayData = ['id' => $id];
            return $this->pdo->select($strSql, $arrayData);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
