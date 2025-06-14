<?php

require_once __DIR__ . '/../../Abstract/Model.php';

class Room extends Model {

    function __construct()
    {
        parent::__construct("Rooms");
    }

    function getAll(){
        return mysqli_fetch_all(mysqli_query(Model::$db, "SELECT * FROM Rooms"), MYSQLI_ASSOC);
    }

    function roomAvail($id){
        return mysqli_fetch_all(
            mysqli_query(
                static::$db,
                "SELECT * FROM " . $this->_table . " WHERE id = " . $id
            )
            )['id'];
    }

    function roomTake($rid, $pid){
        mysqli_query(static::$db,
        "UPDATE " . $this->_table . " SET taken = true, patientId = " . $pid . " WHERE id = " . $rid
        );
    }

    function roomFree($rid){
        mysqli_query(static::$db,
        "UPDATE " . $this->_table . " SET taken = false, patientId = null WHERE id = " . $rid
        );
    }

}