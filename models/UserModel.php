<?php

class User
{
    private $name;
    private $userSap;
    private $user;
    private $password;
    private $ext;
    private $sede_id;
    private $charge_id;
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
            $strSql = "SELECT u.*,
                    s.name as sede,
                    c.name as charge
                    FROM users u
                    INNER JOIN sede s
                    ON s.id = u.sede_id
                    INNER JOIN charge c
                    ON c.id = u.charge_id";
            return $this->pdo->select($strSql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function login($user, $password)
    {
        try {
            $table = 'users';
            $strSql = "SELECT u.*, a.name 
                    FROM $table AS u
                    INNER JOIN charge AS c
                    ON u.charge_id = c.id
                    INNER JOIN area AS a
                    ON c.area_id = a.id
                    WHERE u.user ='$user' AND u.password = '$password'";
            return $this->pdo->select($strSql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newUser($data)
    {
        try {
            $this->pdo->insert("users", $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM users WHERE id=:id";
            $arrayData = ['id' => $id];
            return $this->pdo->select($strSql, $arrayData);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Actualizar datos del usuario
    public function editUser($data)
    {
        try {
            $strWhere = 'id = ' . $data['id'];
            $table = 'users';
            $this->pdo->update($table, $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Eliminar un usuario
    public function deleteUser($data)
    {
        try {
            $strWhere = 'id = ' . $data['id'];
            $table = 'users';
            $this->pdo->delete($table, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
