<?php
require 'user.php';
require 'navigation.php';
error_reporting(0);
session_start();
$user = new user();
$idd =  $_SESSION['id'];
$users = $user->ReadMySeeds($idd);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Seeds</title>
</head>
<body>
<br>
<h2 class="text-center">Here you can see all of your seeds</h2>
<br>
<table class="center" id="seeds">
    <tr>
        <th>Character</th>
        <th>Seed</th>
        <th>Description</th>
    </tr>
    <?php
      foreach ($users as $user): ?>
    <tr>
        <td><img width="50%" src="<?= "images/".trim(strtolower($user->characterr)).".png";?>"></td>
        <td><?= filter_var($user->seed, FILTER_SANITIZE_STRING); ?></td>
        <td><?= filter_var($user->description, FILTER_SANITIZE_STRING);?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
