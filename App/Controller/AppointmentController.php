<?php

class AppointmentController{

    public function listApp($requestdata = []){
        $a = new Appointment();
        $requestdata = array_merge($requestdata, $a->getAll());

        View::render("list-appointment", $requestdata);
    }

    public function recApp($requestdata = []){
        $a = new Appointment();
        $a->insert($requestdata);

        header("Location: /appointments");
        exit();
    }

    public function showAppReg($requestdata = []){
        View::render("register-appointment");
    }

}

?>