<?php 
// Paths to Entities that we want Doctrine to see
$paths = array(__DIR__."app/Models");
// Tells Doctrine what mode we want
$isDevMode = true;
// Doctrine connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'mvc'
);