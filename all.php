<?php
require 'mysql.php';
session_start();
$pdoQuery = "SELECT * FROM seeds";
$statement = $conn->prepare($pdoQuery);
$idd =  $_SESSION['id'];
$statement->execute();
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
    <title>All seeds</title>
</head>
<body>
<div class="text-center">
    <h1> <a href="main.html">The Binding of Isaac Seeds</a></h1>
    <p>Here you can see all of the added seeds</p>
</div>
    <table class="center">
        <tr>
            <th>Character</th>
            <th>Seed</th>
            <th>User</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img width="50%" src="<?= "images/".trim(strtolower($user->character)).".png";?>"></td>
                <td><?= $user->seed; ?></td>
                <td hidden> <?= $pdoQuery = "SELECT * FROM users WHERE idUsers = ?";
                    $statement = $conn->prepare($pdoQuery);
                    $statement->execute([$user->users_idUsers]);
                    $name = $statement->fetch(PDO::FETCH_OBJ); ?></td>
                <td><?= $name->username; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

