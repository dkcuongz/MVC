<?php
namespace App\Models;

use App\Core\ResourceModel;

class Task extends ResourceModel
{
    protected static $tableName = 'tasks';
    protected static $primaryKey = 'id';

    function getTableName(){
        return $this->tableName;
    }
    function getPrimaryKey(){
        return $this->primaryKey;
    }
    function setId($value){
        $this->setColumnValue('id', $value);
    }
    function getId(){
        return $this->getColumnValue('id');
    }
    
    function setTitle($value){
        $this->setColumnValue('title', $value);
    }
    function getTitle(){
        return $this->getColumnValue('title');
    }
    
    function setDescription($value){
        $this->setColumnValue('description', $value);
    }
    function getDescription(){
        return $this->getColumnValue('description');
    }
    
    function setCreated_at($value){
        $this->setColumnValue('created_at', $value);
    }
    function getCreated_at(){
        return $this->getColumnValue('created_at');
    }
    
    function setUpdate_at($value){
        $this->setColumnValue('update_at', $value);
    }
    function getUpdate_at(){
        return $this->getColumnValue('update_at');
    }
}
?>