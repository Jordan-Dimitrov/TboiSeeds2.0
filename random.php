<?php
require 'navigation.php';
require 'user.php';
session_start();
error_reporting(0);
$users = new user();
$seeds = $users->AllSeeds();
$num = $users->CountSeeds();
$seed = rand(1,$num);
$sed = $users->ReadDetails($seed);
$src = "images/".trim(strtolower($sed->characterr)).".png";
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
    <h2>Random seed</h2>
    <p><?= $sed->seed; ?></p>
    <img width="5%" src=<?= $src; ?>>
</div>
</body>
</html>

