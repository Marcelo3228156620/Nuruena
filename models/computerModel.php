<?php

class Computer
{
    private $id;
    private $serial;
    private $computer;
    private $provider;
    private $model;
    private $ip;
    private $ipTel;
    private $win_Version;
    private $active;
    private $comment;
    private $user_id;
    private $workstation;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Insertar un nuevo registro en la DB
    public function newEquipo($data)
    {
        try {
            $this->pdo->insert("equipo", $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateIP($ip)
    {
        try {
            $strSql = "SELECT * FROM equipo WHERE ip='$ip'";
            return $this->pdo->select($strSql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateIPExc($ip, $id)
    {
        try{
            $strSql = "SELECT * FROM equipo WHERE ip = '$ip' AND id != '$id'";
            return $this->pdo->select ($strSql);
          }catch(PDOException $e){
            die($e->getMessage());
          }
    }

    //Consultar todos los registros de la tabla computer
    public function getAll()
    {
        try {
            $strSql = "SELECT e.*,
                    u.name as users,
                    w.name as workstation
                FROM equipo e
                INNER JOIN users u
                ON u.id = e.user_id
                INNER JOIN workstation w
                ON w.id = e.workstation_id ORDER BY ip ASC";
            return $this->pdo->select($strSql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Consultar registro por ID
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM equipo WHERE id=:id";
            $arrayData = ['id' => $id];
            return $this->pdo->select($strSql, $arrayData);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
