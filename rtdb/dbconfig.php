<?php

//require 'C:\xampp\htdocs\patient\rtdb\vendor\autoload.php ';
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('hospital-db-a9c65-firebase-adminsdk-i1tu1-79ea18e985.json')
    ->withDatabaseUri('https://hospital-db-a9c65-default-rtdb.europe-west1.firebasedatabase.app/');

$database = $factory->createDatabase();

?>