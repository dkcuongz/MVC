<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require 'bootstrap.php';

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,null,null,false);
//$config->addEntityNamespace('', 'App\Models');
$entityManager = EntityManager::create($dbParams, $config);
return ConsoleRunner::createHelperSet($entityManager);