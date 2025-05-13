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

}