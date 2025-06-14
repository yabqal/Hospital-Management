<?php

require_once __DIR__ . '/../../Abstract/Model.php';

class Appointment extends Model{

    function __construct()
    {
        parent::__construct("appointments");
    }

    function getAll(){
        //fix the query based on the actual cols the table has
        return mysqli_fetch_all(mysqli_query(Model::$db,
         "SELECT appointments.id, CONCAT(doctors.fName, ' ', doctors.lName) AS doctorName, CONCAT(patients.fName, ' ', patients.mName, ' ', patients.lName) AS patientName, appointments.date FROM appointments
            JOIN Doctors ON Doctors.id = appointments.did
            JOIN Patients ON Patients.id = appointments.pid;" ), MYSQLI_ASSOC);
    }

}