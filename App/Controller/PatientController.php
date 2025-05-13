<?php

require_once __DIR__ . '/../Model/Patient.php';

class PatientController {

    public function showPatReg($requestdata = []){
        View::render('register-patient');
    }

    public function recPat($requestdata = []){
        $p = new Patient();
        $p->insert($requestdata);

        header('location: /Patients');
        exit();
    }

}

?>