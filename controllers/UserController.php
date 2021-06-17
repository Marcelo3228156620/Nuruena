<?php

    require 'models/UserModel.php';

    class userController
    {
        private $userModel;

        public function __construct()
        {
            $this->userModel = new User;
        }

        public function Index()
        {
            $users =  $this->userModel->getAll();
            require 'views/users/listUser.php';
        }

        public function ctrIngreso()
        {
            if (isset($_POST['user'])) {
                $user = trim($_POST['user']);
                $password = $_POST['password'];
                $response = $this->userModel->login($user, $password);
                print_r($response);
                die();
                if($response != null) {
                    if($response[0]->user == $user && $response[0]->password == $password) {
                        $_SESSION["validateLogin"] = "correct";
                        if ($response[0]->rol_id != 1) {
                            header('Location: ?controller=user&method=listArchive&id='.$response[0]->name.'');
                        } else {
                            require 'views/layout.php';
                            require 'views/index.php';
                        }
                    } else {
                        echo "<span>Usuario y/o contraseña incorrectos</span>";
                    }
                }
            }
        }
    }
    