<?php
namespace App\Core;

use PDO;
use App\Config\Database;
    class Model
    {
        protected static $tableName = '';
        protected static $primaryKey = '';
        protected $columns;
        
     function __construct() {
      $this->columns = array();
     }
        function getColumn(){
            $query = "SHOW COLUMNS FROM ".static::$tableName;
            $db = Database::getBdd();
            $s = $db->prepare($query);
            $s->execute();
            $s = $s->fetchAll(PDO::FETCH_ASSOC);
            foreach($s as $value){
                $columns[] = $value['Field'];
            }
            return $columns;
        }
        function setColumnValue($column,$value){
            $this->columns[$column] = $value;
        }
        
        function getColumnValue($column){
            return $this->columns[$column];
        }
    }
?>