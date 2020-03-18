<?php 
namespace App\Core;

interface ResourceModelInterface{

    public function _init($tableName,$primaryKey,$columns);
    public function save($columns);
    public function delete($columns);   
}