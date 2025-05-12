<?php

class Patient extends Model{

    function __construct()
    {
        parent::__construct("Patients");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM Patients"), MYSQLI_ASSOC);
    }

}