<?php

require_once __DIR__ . '/../Model/Patient.php';

class PatientController {

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
        $p->delete($requestdata['id']);
        $pic = $p->searchByID($requestdata['id'])['patients']['photo'];
        unlink(__DIR__ . "/../../Public/uploads/" . $pic);
        header('Location: /patients');
        exit();
    }

    public function assignRoomPat($requestdata = []){
        $p = new Patient();
        $r = new Room();

        if($r->roomAvail($requestdata['rid'])){
            $r->roomTake($requestdata['rid'], $requestdata['pid']);
            //$p->assignRoom($requestdata);
            header("Location: /patients");
            exit();
        }
        else{
            //fallback, tell user room is taken
        }
    }


public function updatePat($requestData, $files = []){
    $p = new Patient();

    //$oldRequestData = $p->searchByID($requestData['id'])[0];
    unset($requestData['patient/updateP']);
    
    // if (isset($files['photo']) && $files['photo']['error'] == UPLOAD_ERR_OK) {
        
    //     if (!empty($existingPatient['photo'])) {
    //         $oldPhotoPath = __DIR__ . "/../../Public/uploads/" . $existingPatient['photo'];
    //         if (file_exists($oldPhotoPath)) {
    //             unlink($oldPhotoPath);
    //         }
    //     }

    //     $imgTempPath = $files['photo']['tmp_name'];
    //     $imgName = basename($files['photo']['name']);
    //     $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

    //     $newImageName = uniqid("img_") . "." . $imgExt;
    //     $uploadPath = __DIR__ . "/../../Public/uploads/" . $newImageName;

    //     move_uploaded_file($imgTempPath, $uploadPath);

    //     $requestData['photo'] = $newImageName;
    // } else {
        
    //     $requestData['photo'] = $existingPatient['photo'];
    // }

    
    $p->update($requestData);

   
    header('Location: /patient?id=' . $requestData['id']);
    exit();
}

public function showUp($requestData = []) {
    View::render("update-patient", $requestData);
}

}

?>