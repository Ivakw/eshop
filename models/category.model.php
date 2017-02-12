<?php
namespace Models;
include_once($_SERVER["DOCUMENT_ROOT"] . "./core/dbConnect.php");

class CategoryModel extends \Core\dbConnect {
    
    protected $tableName = "categories";
    
    function __construct() {
        
        parent::__construct();
    }
    
    public function getCategories() {
        return $this->fillCombo();
    }
    
    public function insertCategories($items){
        return $this->insert($items);
    }    
}
