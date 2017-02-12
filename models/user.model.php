<?php
namespace Models;
//require_once  './core/dbConnect.php';
include_once($_SERVER["DOCUMENT_ROOT"] . "./core/dbConnect.php");


class UserModel extends \Core\dbConnect {
    
    protected $tableName = "users";
            
    function __construct() {
       
        parent::__construct();
    }
    
    public function getUser() {
        return $this->select();
    }
    
    public function createUser($user = []){
        return $this->insert($user);
    }
}
