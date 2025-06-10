<?php

abstract class Model{

    static $db = null;

    protected $_table;

    public function __construct($tableName){
        if(static::$db === null){
            try {
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                static::$db = new mysqli("localhost", "root", "password", "hospital-mangement");

            } catch (mysqli_sql_exception $e) {
                $error = 'Could not connect to the database';
                header("Location: /error?error=" . urlencode($error));
                exit();
            }


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
        
        try {
            mysqli_query(static::$db, 
                        "INSERT INTO `" . $this->_table . "` (" . implode(",", $fields) . " )" . " VALUES( " . implode("," , $values) . ")"
                        );
        }
        catch (mysqli_sql_exception $e){
            $error = 'Could not insert the data into the database';
            header("Location: /error?error=" . urlencode($error));
            exit();
        }

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

        try {
            mysqli_query(static::$db, $query);
        }
        catch (mysqli_sql_exception $e){
            $error = 'Could not update the data into the database';
            header("Location: /error?error=" . urlencode($error));
            exit();
        }
    }

    function delete($id){

        try {
            mysqli_query(static::$db, 
                    "DELETE FROM " . $this->_table . " WHERE id = " . $id
                    );
        }
        catch (mysqli_sql_exception $e){
            $error = 'Could not delete ' . rtrim($this->_table, 's') . ' into the database';
            header("Location: /error?error=" . urlencode($error));
            exit();
        }
        
    }

    function searchByID($id){
        try {
            return mysqli_fetch_all(
                    mysqli_query(static::$db,
                    "SELECT * FROM " . $this->_table . " WHERE id = " . $id)
                    , MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e){
            $error = 'Could not search the database for the ' . rtrim($this->_table, 's');
            header("Location: /error?error=" . urlencode($error));
            exit();
        }
        
    }

}