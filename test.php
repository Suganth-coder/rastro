<?php 
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL); 

 require_once "vendor/autoload.php";
require_once "lib/Database.class.php";
Database::getconn();

// $client = new MongoDB\Client(
//     'mongodb+srv://<username>:<password>@<cluster-address>/test?retryWrites=true&w=majority'
// );
// $db = $client->test;