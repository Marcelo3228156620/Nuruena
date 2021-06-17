<?php

    require 'models/UserModel.php';
    require 'models/FileModel.php';

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

        public function listArchive()
        {
          if (isset($_REQUEST['id'])) {
              $id = $_REQUEST['id'];
              $files = new File;
              $files = $files->getAll($id);
              require 'views/file/listArchive.php';
          }
        }

        public function ctrIngreso()
        {
            if (isset($_POST['user'])) {
                
                $user = trim($_POST['user']);
                $password = $_POST['password'];
                $response = $this->userModel->login($user, $password);
                if($response != null) {
                    if($response[0]->user == $user && $response[0]->password == $password) {
                        $_SESSION["validateLogin"] = "correct";
                        /*print($response[0]->name);
                        die();*/
                        if ($response[0]->name != 'Sistemas') {
                            require 'views/layout.php';
                            require 'views/index.php';
                            header('Location: ?controller=user&method=listArchive&id='.$response[0]->name.'');
                            echo 1;
                        } else {
                            echo 2;
                            require 'views/layout.php';
                            require 'views/index.php';
                            
                        }
                    } else {
                        echo 0;
                    }
                }else {
                    echo 0;
                }
            }
        }
    }
    