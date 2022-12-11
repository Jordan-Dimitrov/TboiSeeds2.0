<?php
$servername = "localhost";
$username = "root";
$password = "stormedbucket";
try {
    $conn = new PDO("mysql:host=$servername;dbname=tboi", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
}
?>