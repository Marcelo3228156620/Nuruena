<?php

require 'models/UserModel.php';
require 'models/FileModel.php';
require 'models/SedeModel.php';
require 'models/AreaModel.php';
require 'models/RolModel.php';

class userController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
        $this->areaModel = new Area;
        $this->sedeModel = new Sede;
        $this->rolModel = new Rol;
    }

    public function Index()
    {
        $users =  $this->userModel->getAll();
        require 'views/users/listUser.php';
    }

    public function newUser()
    {
        $sedes = $this->sedeModel->getAll();
        $areas = $this->areaModel->getAll();
        $roles = $this->rolModel->getAll();
        require 'views/layout.php';
        require 'views/users/newUser.php';
    }

    public function save()
    {
        try {
            if (isset($_POST['name'])) {
                /*print_r($_POST);
                die();*/
                unset($_POST['areasList']);
                $this->userModel->newUser($_POST);
                header('Location: ?controller=user');
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*public function listArchive()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $files = new File;
            $files = $files->getAll($id);
            require 'views/file/listArchive.php';
        }
    }*/

    public function ctrIngreso()
    {
        if (isset($_POST['user'])) {
            $user = strtolower(trim($_POST['user']));
            $password = $_POST['password'];
            $response = $this->userModel->login($user, $password);
            /*print_r($response);
                die();*/
            if ($response != null) {
                if ($response[0]->user == $user && $response[0]->password == $password) {
                    $_SESSION["validateLogin"] = "correct";
                    if ($response[0]->rol_id != 1) {
                        /*header('Location: ?controller=user&method=listArchive&id='.$response[0]->name.'');*/
                        /*$response[0]->rol_id;
                             $response[0]->name;*/
                        echo json_encode($response, JSON_UNESCAPED_UNICODE);
                    } else {
                        echo json_encode($response, JSON_UNESCAPED_UNICODE);
                        /*require 'views/layout.php';
                            require 'views/index.php';*/
                    }
                } else {
                    /* echo "<script>
                        document.getElementById('warning').classList.remove('alert');
                        document.getElementById('warning').classList.add('alertActive');
                        </script>";*/
                    //echo 3;
                    //echo "<span>Usuario y/o contraseña incorrectos</span>";
                    echo 1;
                }
            } else {
                echo 1;
            }
        }
    }
}
