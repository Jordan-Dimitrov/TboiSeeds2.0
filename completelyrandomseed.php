<?php
require "navigation.php";
require 'user.php';
session_start();
$user = new user();
$characters = ["Isaac", "Magdalene", "Cain", "Judas", "Blue_Baby", "Eve", "Samson", "Azazel", "Lazarus", "Eden", "The_Lost", "Lilith", "Keeper", "Apollyon", "Keeper", "Bethany", "Jacob_And_Esau"];
$r = rand(0,count($characters)-1);
$r2 = rand(1,2);
if ($r2==1){
    $src = "images/".trim(strtolower($characters[$r])).".png";
}else{
    $src = "images/".trim(strtolower("tainted_".$characters[$r])).".png";
}
?>

<!DOCTYPE html>
<title>CompletelyRandom</title>
<html>
<head>
</head>
<body>
<div class="text-center">
    <br>
    <h2>Completely random seed</h2>
    <p><?= $user->makeSeed(); ?></p>
    <img width="5%" src=<?= $src; ?>>
</div>
</body>
</html>