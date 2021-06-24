<?php

require 'models/FileModel.php';

class fileController
{
    private $fileModel;

    public function __construct()
    {
        $this->fileModel = new File;
    }

    public function save()
    {
        try {
            if (isset($_POST['area_id'])) {
                $file = $_FILES["file"];
                move_uploaded_file($file["tmp_name"], "Doc/" . $file["name"]);
                $_POST['name'] = $file['name'];
                $_POST['location'] = "Doc/" . $file['name'];
                $this->fileModel->newFile($_POST);
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                echo "<script>alert('Error al ingresar el archivo');</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id'])) {
            unlink($_REQUEST["name"]);
            $this->fileModel->deletefile($_REQUEST);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}
