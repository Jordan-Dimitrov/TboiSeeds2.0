<?php
require 'user.php';
require 'navigation.php';
session_start();
error_reporting(0);
$user = new user();
$users = $user->AllSeeds();
$newU = new user();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>All seeds</title>
</head>
<body>
<div class="text-center">
    <br>
    <h2>Here you can see all of the added seeds</h2>
    <br>
</div>
    <table class="center">
        <tr>
            <th>Character</th>
            <th>Seed</th>
            <th>User</th>
            <th>Description</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img width="50%" src="<?= "images/".trim(strtolower($user->characterr)).".png";?>"></td>
                <td><?= filter_var($user->seed, FILTER_SANITIZE_STRING); ?></td>
                <td><?=filter_var($newU->ReadUser($user->users_idUsers)->username, FILTER_SANITIZE_STRING);?></td>
                <td><?= filter_var($user->description, FILTER_SANITIZE_STRING); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

