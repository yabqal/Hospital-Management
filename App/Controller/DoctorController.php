<?php

require_once __DIR__ . '/../Model/Doctor.php';

class DoctorController {
    
    public function showDocReg($requestdata = []){
        View::render('register-doctor');
    }

    public function recDoc($requestdata = []){
        if(isset($requestdata['submit-doctor']))
        unset($requestdata['submit-doctor']);
        $d = new Doctor();
        $d->insert($requestdata);

        header('Location: /doctors');
        exit();
    }

    public function listDoc($requestdata = []){
        $d = new Doctor();
        $requestdata = array_merge($requestdata, $d->getAll());
        View::render('list-doctor', $requestdata);
    }

    public function docByID($requestdata = []){
        $d = new Doctor();
        $requestdata = $d->searchByID($requestdata['id']);

        View::render('list-doctor', $requestdata);
    }

    public function docByName($requestdata = []){
        $d = new Doctor();
        $requestdata = $d->searchByName($requestdata['name']);
    
        View::render('list-doctor', $requestdata);
    }

    public function delDoc($requestdata = []){
        $d = new Doctor();
        $d->delete($requestdata['id']);

        header('Location: /doctors');
        exit();
    }

    public function availableDoc($requestdata = []){
        $d = new Doctor();
        $requestdata = $d->getAvailable();

        View::render('list-doctor', $requestdata);
    }

    public function assignRoomDoc($requestdata = []){
        $p = new Doctor();
        $r = new Room();

        if($r->roomAvail($requestdata['rid'])){
            $r->roomTake($requestdata['rid']);
            $p->assignRoom($requestdata);
            header("Location: /doctors");
        }
        else{
            //fallback, tell user room is taken
        }
    }

}

?>