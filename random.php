<?php
require 'mysql.php';
session_start();
$pdoQuery = "SELECT * FROM seeds";
$statement = $conn->prepare($pdoQuery);
$idd =  $_SESSION['id'];
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
$num = $statement->rowCount();
$seed = rand(1,$num);
$sql = 'SELECT * FROM seeds where idseeds = ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$seed]);
$sed = $stmt->fetch(PDO::FETCH_OBJ);
$src = "images/".trim(strtolower($sed->character)).".png";
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <title>All seeds</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
</head>
<body>
<div class="text-center">
    <h1> <a href="main.html">The Binding of Isaac Seeds</a></h1>
    <p><?= $sed->seed; ?></p>
    <p><?= $sed->character; ?></p>
    <img width="5%" src=<?= $src; ?>>
</div>
</body>
</html>

