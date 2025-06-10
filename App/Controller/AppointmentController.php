<?php

class AppointmentController{

    public function listApp($requestdata = []){
        $a = new Appointment();
        $requestdata = array_merge($requestdata, $a->getAll());

        View::render("list-appointment", $requestdata);
    }

    public function recApp($requestdata = []){
        $a = new Appointment();
        if(isset($requestdata['submit-appointment'])) unset($requestdata['submit-appointment']);

        if(isset($requestdata['submit'])) unset($requestdata['submit']);

        $a->insert($requestdata);

        header("Location: /register-appointment");
        exit();
    }

    public function showAppReg($requestdata = []){
        $p = new Patient();
        $d = new Doctor();

        $pData['patients'] = $p->getAll();

        $dData['doctors'] = $d->getAll();

        $requestdata = array_merge($pData, $dData);

        View::render("schedule-meeting", $requestdata);
    }

    public function delApp($requestdata = []){
        $a = new Appointment();
        $a->delete($requestdata['id']);

        header('Location: /appointments');
        exit();
    }

    //check this, the data we need will come from three places appointment, pat, and doc
    public function detailApp($requestdata = []){
        $a = new Appointment();
        $p = new Patient();
        $d = new Doctor();

        $aData = $a->searchByID($requestdata['id']);
        $pData = $p->searchByID($aData[0]['pid']);
        $dData = $d->searchByID($aData[0]['did']);

        $aData['appointment'] = $aData[0];
        $pData['patient'] = $pData[0];
        $dData['doctor'] = $dData[0];

        unset($aData[0]);
        unset($pData[0]);
        unset($dData[0]);

        $requestdata = array_merge($aData, $pData, $dData);

        View::render('detail-appointment', $requestdata);
    }

    public function updateApp($requestdata){
        $a = new Appointment();
        $a->update($requestdata);

        header('Location: /appointment?id=' . $requestdata['id']);
        exit();
    }
    
}

?>