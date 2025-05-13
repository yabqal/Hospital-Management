<?php

require_once __DIR__ . '/../Model/Doctor.php';

class DoctorController {
    
    public function showDocReg($requestdata = []){
        View::render('register-doctor');
    }

    public function recDoc($requestdata = []){
        $d = new Doctor();
        $d->insert($requestdata);

        header('locatiion: /Doctors');
    }

}

?>