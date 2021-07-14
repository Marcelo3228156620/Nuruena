<?php

require 'models/chargeModel.php';

class chargeController
{
    public function __construct()
    {
        $this->chargeModel = new Charge;
    }

    public function save()
    {
        try {
            if (isset($_POST['name'])) {
                $this->chargeModel->newCharge($_POST);
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function chargesArea()
    {
        if (isset($_POST['area'])) {
            $id = $_POST['area'];
            $charges = $this->chargeModel->chargesList($id);
            foreach ($charges as $charge) {
                echo '<option value=' . $charge->id . '>' . $charge->name . '</option>';
            }
        }
    }
}
