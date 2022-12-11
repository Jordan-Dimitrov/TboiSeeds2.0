<?php
require 'mysql.php';
session_start();
$pdoQuery = "SELECT * FROM seeds WHERE users_idUsers = ?";
$statement = $conn->prepare($pdoQuery);
$idd =  $_SESSION['id'];
$statement->execute([$idd]);
$users = $statement->fetchAll(PDO::FETCH_OBJ);
?>



<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
    <meta charset="UTF-8">
    <title>My Seeds</title>
</head>
<body>
<div class="text-center">
    <h1> <a href="main.html">The Binding of Isaac Seeds</a></h1>
</div>
<table class="center">
    <tr>
        <th>Character</th>
        <th>Seed</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><img width="50%" src="<?= "images/".trim(strtolower($user->character)).".png";?>"></td>
            <td><?= $user->seed; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

