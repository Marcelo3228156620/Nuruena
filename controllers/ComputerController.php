<?php

require 'models/computerModel.php';
require 'models/userModel.php';
require 'models/workstationModel.php';

class computerController
{
    private $computerModel;

    public function __construct()
    {
        $this->computerModel = new Computer;
        $this->userModel = new User;
        $this->wsModel = new Workstation;
    }

    public function Index()
    {
        $equipos = $this->computerModel->getAll();
        require 'views/layout.php';
        require 'views/equipo/listEquipo.php';
    }

    public function newEquipo()
    {
        $users = $this->userModel->getAll();
        $workstation = $this->wsModel->getAll();
        require 'views/layout.php';
        require 'views/equipo/newEquipo.php';
    }

    public function save()
    {
        try {
            if (isset($_POST['computer'])) {
                $this->computerModel->newEquipo($_POST);
                header('Location: ?controller=computer');
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $this->computerModel->editEquipo($_POST);
            echo "<script>alert('Equipo actualizado correctamente');
            window.location.href = '?controller=computer';</script>";
        } else {
            echo "Error, acciòn no permitida";
        }
    }

    public function delete()
    {
        $this->computerModel->deleteEquipo($_REQUEST);
        header('Location: ?controller=computer');
    }

    public function validateIP()
    {
        if (isset($_POST['ip'])) {
            $ip = $_POST['ip'];
            $validate = $this->computerModel->validateIP($ip);
            if (count($validate) > 0) {
                echo 1;
            } else {
            }
        }
    }

    public function validateIPExc()
    {
        if (isset($_POST['id'])) {
            $ip = $_POST['ip'];
            $id = $_POST['id'];
            $response = $this->computerModel->validateIPExc($ip, $id);
            if (count($response) > 0) {
                echo 1;
            } else {
            }
        }
    }

    public function edit()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $equipo =  $this->computerModel->getById($id);
                $users = $this->userModel->getAll();
                $workstation = $this->wsModel->getAll();
                require 'views/layout.php';
                require 'views/equipo/editEquipo.php';
            } else {
                echo "El equipo no existe";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
