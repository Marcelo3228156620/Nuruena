<?php

require 'models/UserModel.php';
require 'models/FileModel.php';
require 'models/SedeModel.php';
require 'models/AreaModel.php';
require 'models/RolModel.php';
require 'models/chargeModel.php';

class userController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
        $this->areaModel = new Area;
        $this->sedeModel = new Sede;
        $this->rolModel = new Rol;
        $this->fileModel = new File;
        $this->chargeModel = new Charge;
    }

    public function Index()
    {
        $users =  $this->userModel->getAll();
        $sedes = $this->sedeModel->getAll();
        /*require 'views/index.php';
        require 'views/layout.php';*/
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
                unset($_POST['areasList']);
                $this->userModel->newUser($_POST);
                header('Location: ?controller=user');
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function userList()
    {
        if(isset($_REQUEST['sede'])) {
            $sede = $_REQUEST['sede'];
            if($sede == "") {
                $users =  $this->userModel->getAll();
                echo json_encode($users, JSON_UNESCAPED_UNICODE);
            } else {
                $users = $this->userModel->getAllExc($sede);
                $sedes = $this->sedeModel->getAll();
                echo json_encode($users, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function edit()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $users = $this->userModel->getById($id);
                $sedes = $this->sedeModel->getAll();
                $roles = $this->rolModel->getAll();
                $charge_id = $users[0]->charge_id;
                $charge = $this->chargeModel->getById($charge_id);
                $idC = $charge[0]->id;
                $area_id = $charge[0]->area_id;
                $charges = $this->chargeModel->getAllExc($idC, $area_id);
                $area = $this->areaModel->getById($area_id);
                $idA = $area[0]->id;
                $areas = $this->areaModel->getAllExp($idA);
                require 'views/layout.php';
                require 'views/users/editUser.php';
            } else {
                echo "El usuario no existe";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update()
    {
        try {
            if (isset($_POST)) {
                unset($_POST['areas']);
                $this->userModel->editUser($_POST);
                echo "<script>alert('Usuario actualizado correctamente');
                    window.location.href = '?controller=user';</script>";
            } else {
                echo "Error, accion no permitida";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        $this->userModel->deleteUser($_REQUEST);
        header('Location: ?controller=user');
    }

    public function listArchive()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $files = $this->fileModel->getAll($id);
            require 'views/file/listArchive.php';
        }
    }

    public function listArchiveAdmin()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $files = $this->fileModel->getAll($id);
            $areas = $this->areaModel->getAll();
            require 'views/layout.php';
            require 'views/file/listArchiveAdmin.php';
        }
    }

    public function ctrIngreso()
    {
        if (isset($_POST['user'])) {
            $user = strtolower(trim($_POST['user']));
            $password = $_POST['password'];
            $response = $this->userModel->login($user, $password);
            if ($response != null) {
                if ($response[0]->user == $user && $response[0]->password == $password) {
                    $_SESSION["validateLogin"] = "correct";
                    if ($response[0]->rol_id != 1) {
                        echo json_encode($response, JSON_UNESCAPED_UNICODE);
                    } else {
                        echo json_encode($response, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    echo 1;
                }
            } else {
                echo 1;
            }
        }
    }

    public function close()
    {
        require 'views/close.php';
    }
}
