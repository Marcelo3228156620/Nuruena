<?php

require 'models/AreaModel.php';

class areaController
{
    private $areaModel;

    public function __construct()
    {
        $this->areaModel = new Area;
    }

    public function save()
    {
        try {
            if (isset($_POST['name'])) {
                $this->areaModel->newArea($_POST);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}