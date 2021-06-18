<?php

require 'models/chargeModel.php';

class chargeController
{
    public function __construct()
    {
        $this->chargeModel = new Charge;
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
