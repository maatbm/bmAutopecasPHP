<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__); 
$dotenv->load();

function connect(){

    $servername = $_ENV['HOST'];
    $username = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    $dbname = $_ENV['DBNAME'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
    
};
