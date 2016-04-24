<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
require_once "lib/Reservierung.php";
require_once "lib/Team.php";

date_default_timezone_set("Europe/Berlin");

// Load entity configuration from PHP file annotations
// This is the most versatile mode, I advise using it!
// If you don't like it, Doctrine also supports YAML or XML
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/lib"), $isDevMode);

// Set up database connection data
$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'kochwdb',
    'dbname'   => 'kochw',
    'user'     => 'root',
    'password' => ''
);

$entityManager = EntityManager::create($conn, $config);
?>
