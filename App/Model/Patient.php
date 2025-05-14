<?php

require_once __DIR__ . '/../../Abstract/Model.php';
class Patient extends Model{

    function __construct(){
        parent::__construct("Patients");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM Patients"), MYSQLI_ASSOC);
    }

    function searchByName($name){
        return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE name = " . $name
                    )
                );
    }

}