<?php
/**
 * Model base class
 */
namespace App\Core;

use App\Config\Database;
class ResourceModel extends Model {

    function delete_id($id){
        $class = get_called_class();
        $query = "DELETE FROM " . static::$tableName . " WHERE ".static::$primaryKey."=".$id." LIMIT 1";
        $db = Database::getBdd();
        $s = $db->prepare($query);
        $s->execute([$id]);
        return $s;
    }

    /**
     * Save or update the item data in database
     */
    function createOj($data=array()){
        $query =  " INSERT INTO " . static::$tableName . " (" . implode(",", array_keys($data)) . ") VALUES(";
        $keys = array();
        foreach ($data as $key => $value) {
            $keys[":".$key] = $value;
        }
        $query .= implode(",", array_keys($keys)).")";
        $db = Database::getBdd();
        $s = $db->prepare($query);
        $s->execute($keys);
        return $s;
    }
    function updateOj($data=array(),$id){
        $query =  "UPDATE " . static::$tableName . " SET ";
        $keys = array();
        foreach ($data as $key => $value) {
            $query.= $key ;
            $query.="=:".$key."," ;
        }
        $query = rtrim($query, ",");
        $query .=" Where ".static::$primaryKey." = ".$id;
        $db = Database::getBdd();
        $s = $db->prepare($query);
        $s->execute($data);
        return $s;
    }
    static function getAll(){
        $query = "SELECT * FROM " . static::$tableName;
        $db = Database::getBdd();
        $s = $db->prepare($query);
        $s->execute();
        return $s;
    }

/**
 * Get an item by the primarykey
 */
static function getById($id){
    $query = "SELECT * FROM " . static::$tableName." Where ".static::$primaryKey." = ".$id;
    $db = Database::getBdd();
    $s = $db->prepare($query);
    $s->execute([$id]);
    return $s;
}
}