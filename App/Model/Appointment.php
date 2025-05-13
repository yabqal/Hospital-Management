<?php

require_once __DIR__ . '/../../Abstract/Model.php';

class Appointment extends Model{

    function __construct()
    {
        parent::__construct("Appointmments");
    }

    function getAll(){
        //fix the query based on the actual cols the table has
        return mysqli_fetch_all(mysqli_query(Model::$db,
               "SELECT Appointments.id, Doctors.name AS doctorName, Patients.name AS patientName, date, reason FROM Appointments
                JOIN Doctors ON Doctors.id = Appointments.did
                JOIN Patients ON Patients.id = Appointments.pid"
               ),
               MYSQLI_ASSOC);
    }

}