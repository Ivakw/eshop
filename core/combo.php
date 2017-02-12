<?php
namespace Core;
use Mysqli;
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

class combo {
    private $connection = NULL ;
    
    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER_NAME, DB_PASSWORD, DB_NAME) ;
        if(mysqli_connect_errno()){
            echo "Error: Could not connect to the Database. ";
            exit;
        }
    }
    
    public function load() {
        $categories = $category->getCategories();
        $query = "SELECT * FROM categories";
        $rs = $this->connection->query($query);
        print $rs;
        die;

        foreach($categories as $categoryColumnName=>$value) {
            echo "<option value='" .$categoryColumnName['categoryName']. "'>" . $value['categoryName'] . "</option>";
        }
    }
    
}
