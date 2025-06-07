<?php

require_once __DIR__ . '/../../Abstract/Model.php';
class Patient extends Model{

    function __construct(){
        parent::__construct("patients");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM patients"), MYSQLI_ASSOC);
    }

    function searchByName($name){
        return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE name = " . $name
                    )
                );
    }

    function assignRoom($data){
        mysqli_query(static::$db,
        "UPDATE " . $this->_table . " SET rid = " . $data['rid'] . "WHERE id = " . $data['id']
        );
    }

}