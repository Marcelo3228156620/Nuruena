<?php

    class File 
    {
        private $pdo;

        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll($id)
        {
            try {
                $strSql = 'SELECT f.*,
                        a.name as area
                        FROM file f
                        INNER JOIN area a
                        ON a.id = f.area_id
                        WHERE a.name = "'.$id.'"';
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }