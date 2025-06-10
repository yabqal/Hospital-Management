<?php

abstract class Model{

    static $db = null;

    protected $_table;

    public function __construct($tableName){
        if(static::$db === null){
            static::$db = mysqli_connect("localhost","root","password","hospital-mangement") or die("Noooooooooo");
            static::$db->set_charset('utf8mb4');
            
        }

        $this->_table = $tableName;
        
    }

    abstract function getAll();

    function insert($data){
        
        $fields = array_map(function($field) {
        return "`" . $field . "`";
        }, array_keys($data));

        $values = array_map(function($value) {
            return "'" . mysqli_real_escape_string(static::$db, $value) . "'";
        }, array_values($data));

        mysqli_query(static::$db, 
                    "INSERT INTO `" . $this->_table . "` (" . implode(",", $fields) . " )" . " VALUES( " . implode("," , $values) . ")"
                    );
    }

    function update($data){

        $id = mysqli_real_escape_string(static::$db, $data['id']);
        unset($data['id']);

        $fields = array_keys($data);
        $body = [];

        foreach ($fields as $field) {
            $escapedField = "`" . $field . "`";
            $escapedValue = "'" . mysqli_real_escape_string(static::$db, $data[$field]) . "'";
            $body[] = $escapedField . " = " . $escapedValue;
        }

        $query = "UPDATE `" . $this->_table . "` SET " . implode(', ', $body) . " WHERE `id` = '" . $id . "'";

        mysqli_query(static::$db, $query);
    }

    function delete($id){

        mysqli_query(static::$db, 
                    "DELETE FROM " . $this->_table . " WHERE id = " . $id
                    );
    }

    function searchByID($id){
        return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE id = " . $id)
                    , MYSQLI_ASSOC);
    }

}