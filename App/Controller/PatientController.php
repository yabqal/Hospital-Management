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

    public function listPat($requestdata = []){
        $p = new Patient();
        $requestdata = array_merge($requestdata, $p->getAll());
        
        View::render('list-patient', $requestdata);
    }

    public function patByID($requestdata = []){
        $p = new Patient();
        $requestdata = $p->searchByID($requestdata['id']);

        View::render('list-patient', $requestdata);
    }

    public function patByName($requestdata = []){
        $p = new Patient();
        $requestdata = $p->searchByName($requestdata['name']);

        View::render('list-patient', $requestdata);
    }

    public function delPat($requestdata = []){
        $p = new Patient();
        $p->delete($requestdata['id']);

        header('');
    }
}

?>