<?php

require_once __DIR__ . '/../../Abstract/Model.php';
class Doctor extends Model{

    function __construct()
    {
        parent::__construct("Doctors");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM Doctors"), MYSQLI_ASSOC);
    }
    
}