<?php

require_once __DIR__ . '/../Model/Patient.php';

class PatientController{

    public function showPatReg($requestdata = []){
        View::render('register-patient');
    }

    public function recPat($requestdata = [], $files = []){
        unset($requestdata['submit-patient']);

        //do we even need these two lines now that it was fixed from index.php?
        if(isset($requestdata['name']))
        unset($requestdata['name']);

        if(isset($requestdata['id']))
        unset($requestdata['id']);

        if(isset($files['photo']) && $files['photo']['error'] == UPLOAD_ERR_OK) {
            $imgTempPath = $files['photo']['tmp_name'];
            $imgName = basename($files['photo']['name']);
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $newImageName = uniqid("img_")  . "." . $imgExt;
            $uploadPath = __DIR__ . "/../../Public/uploads/" . $newImageName;

            move_uploaded_file($imgTempPath, $uploadPath);

            $requestdata['photo'] = $newImageName;
        }
        else {
            $requestdata['photo'] = null;
        }

        echo $requestdata['photo'] . "hi";
        
        $p = new Patient();
        $p->insert($requestdata);

        header('Location: /patients');
        exit();
    }

    public function listPat($requestdata = []){
        $p = new Patient();
        $requestdata = array_merge($requestdata, $p->getAll());
        
        View::render('list-patient', $requestdata);
    }

    public function detailPat($requestdata = []){
        $p = new Patient();
        $requestdata = $p->searchByID($requestdata['id'])[0];

        View::render('details-patient', $requestdata);
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
        //also delete the associated file alongside it ig
        $p = new Patient();
        $pic = $p->searchByID($requestdata['id'])['patients']['photo'];
        unlink('/uploads/' . $pic);
        $p->delete($requestdata['id']);
        header('Location: /patients');
        exit();
    }

    // let this be handled by room manager
    public function assignRoomPat($requestdata = []){
        $p = new Patient();
        $r = new Room();

        if($r->roomAvail($requestdata['rid'])){
            $r->roomTake($requestdata['rid']);
            $p->assignRoom($requestdata);
            header("Location: /patients");
            exit();
        }
        else{
            //fallback, tell user room is taken
        }
    }

    //you need to handle pic update separately
    public function updatePat($requestdata){
        $p = new Patient();
        $p->update($requestdata);

        header('Location: /patient?id=' . $requestdata['id']);
        exit();
    }

    public function showPatUpdate($requestdata = []){

        View::render('patient-update');
    }

}

?>