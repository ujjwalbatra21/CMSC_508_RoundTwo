<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "project_13";
$password = "V00774677";
$database = "project_13";
$db = mysqli_connect($servername, $username, $password, $database); 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>



