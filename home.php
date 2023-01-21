<?php
session_start();
error_reporting(0);
require "navigation.php";
require "user.php";
$user = new user();
$count = $user->Count();
$seeds = $user->CountSeeds();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        h4 {
            margin: auto;
            width: 640px;
            text-align: justify;
        }
    </style>
</head>
<body>
<div class="text-center">
    <br>
    <h1>The Binding of Isaac Seeds</h1>
    <br>
    <h4>Welcome to the Binding of Isaac seeds website! Here people can submit seeds, see their own seeds or everyone's seeds. You can also generate completely random seed from scratch. There are currently <?php echo $count?> people registered and <?php echo $seeds?> seeds in the website!</h4>
</div>
</body>
</html>
