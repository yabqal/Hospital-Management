<?php

abstract class Model{

    static $db = null;

    protected $_table;

    public function __construct($tableName){
        if(static::$db === null){
            $db = mysqli_connect("localhost","root","","hospital-mangement");
            $db->set_charset('utf8mb4');
        }

        $this->_table = $tableName;
        
    }

    abstract function getAll();

    function insert($data){
        $fields = array_keys($data);
        //sanitize here?
        $values = array_values($data);

        mysqli_query(static::$db, 
                    "INSERT INTO " . $this->_table . " (" . implode(",", $fields) . " )" . " VALUES( " . implode("," , $values) . ")"
                    );
    }

    function delete($id){

        mysqli_query(static::$db, 
                    "DELETE FROM " . $this->_table . " WHERE id = " . $id
                    );
    }

    function searchByID($id){
        return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE id = " . $id
                    )
                );
    }

}