<?php

require_once __DIR__ . '/../../Abstract/Model.php';
class Doctor extends Model{

    function __construct(){
        parent::__construct("Doctors");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM Doctors"), MYSQLI_ASSOC);
    }

    function searchByName($name){
        return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE name = " . $name
                    )
                );
    }

    function getAvailable(){
        return mysqli_fetch_all(
            mysqli_query(static::$db,
            "SELECT * FROM " . $this->_table . " WHERE available = TRUE"
                )
            );
    }
    
    function assignRoom($data){
        mysqli_query(static::$db,
        "UPDATE " . $this->_table . " SET rid = " . $data['rid'] . "WHERE id = " . $data['id']
        );
    }

}