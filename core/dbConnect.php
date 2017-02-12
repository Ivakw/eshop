<?php

namespace Core;
use Mysqli;
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');


class dbConnect {
    private $connection = NULL;
    protected $tableName = NULL;
    
    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER_NAME, DB_PASSWORD, DB_NAME);
        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to the Database.";
            exit;
        }
    }
    
    public function select($columns = [], $where = []) {
        
        $_columns = "*";
        $_where = " WHERE 1=1 ";
        
        if(!empty($columns)) {
            $_columns = implode(',',$columns);
        }

        if(!empty($where)) {
            foreach($where as $columnName=>$value){
                $_where .= " AND  {$columnName} = '{$value}'"; 
            }
        }
        
        $query = "SELECT {$_columns} FROM $this->tableName";
        $query .= " " .$_where;
        
        $result = $this->connection->query($query);
        while($row = $result->fetch_assoc()){
            $out [] = $row;
        }
        
        return $out;
    }
    
    public function insert($items = []) {
        
        $_columns = NULL;
        $_values = NULL;

        if(!empty($items)) {
            foreach($items as $columnName=>$values){
                $_columns .= $columnName. ',';
                $_values .= "'" .$values. "'". ",";
            }
        }
        
        $query = "INSERT INTO ".$this->tableName. '(';
        $query .= rtrim($_columns,',') . ')'; 
        $query .= " VALUES" . '(' . rtrim($_values,',') . ')';

        $this->connection->query($query);
        return $this->connection->insert_id;
    }
    
    public function fillCombo() {
        $categoryName = "";
        
        $query = "SELECT * FROM categories WHERE categoryId is NOT NULL";
        $rs = $this->connection->query($query);
        return $rs;
        
   }
    
}