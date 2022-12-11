<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Seed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
</head>
<body>
<div class="text-center">
    <h1> <a href="main.html">The Binding of Isaac Seeds</a></h1>
    <p>Here you can add seeds</p>
</div>
<form method="post" action="add.php">
    <div class="text-center">
        <label for="seed">Seed:</label>
        <br>
        <input type="text" name="seed" id="seed" placeholder="BASEMENT" required size="12%">
        <br>
        <br>
        <label for="character">Character:</label>
        <br>
        <br>
        <select name="character" id="character" required>
            <option value="Isaac">Isaac</option>
            <option value="Magdalene">Magdalene</option>
            <option value="Cain">Cain</option>
            <option value="Judas">Judas</option>
            <option value="Blue_Baby">Blue Baby</option>
            <option value="Eve">Eve</option>
            <option value="Samson">Azazel</option>
            <option value="Azazel">Azazel</option>
            <option value="Lazarus">Lazarus</option>
            <option value="Eden">Eden</option>
            <option value="The_Lost">The Lost</option>
            <option value="Lilith">Lilith</option>
            <option value="Keeper">Keeper</option>
            <option value="Appolyon">Appolyon</option>
            <option value="The_Forgotten">The Forgotten</option>
            <option value="Bethany">Bethany</option>
            <option value="Jacob_And_Esau">Jacob and Esau</option>
        </select>
        <br>
        <br>
        <input type="checkbox" id="Tainted" name="tainted" value="Tainted" />
        <label for="Tainted">Tainted</label>
        <br>
        <br>
        <button type="submit" onclick="Validate()" >Submit</button>
    </div>
</form>
</body>
<script>
function Validate(){
    let seed = document.getElementById('seed').value;

    if ( /^[A-Za-z0-9]*$/ .test(seed) == true) {
        if (seed.toString().toUpperCase().includes("5") | seed.toString().toUpperCase().includes("I") | seed.toString().toUpperCase().includes("O") | seed.toString().toUpperCase().includes("U")) {
            alert("Invalid seed!");
            return;
        }
    }
    else{
        alert("Invalid seed!");
        return;
    }


    if (seed.length != 8) {
        alert("Invalid seed!");
        return;
    } else {
        alert("Valid seed!");
        return;
    }
}
</script>
</html>
<?php
require 'mysql2.php';
require 'mysql.php';
session_start();
$idd =  $_SESSION['id'];
if (isset($_POST['seed'])&&isset($_POST['character'])&&strlen($_POST['seed'])==8&&strlen($_POST['character'])!=0){
    $seed = $_POST['seed']." ";
    $character = $_POST['character']." ";
    $found = false;
    $pdoQuery = "SELECT * FROM seeds";
    $statement = $conn->prepare($pdoQuery);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    if (isset($_POST['tainted'])){
        $character = "Tainted_". $character;
    }
    foreach ($users as $user){
        if ($user->seed==$seed){
            $found = true;
        }
    }
    if ($found==false){
        $sql = "INSERT INTO `seeds`(`seed`, `character`, `users_idUsers`) VALUES ('$seed', '$character', '$idd')";

        if(mysqli_query($connect, $sql))
        {
            // block of code, to process further
        }
        else
        {
            echo '<script>alert("Error")</script>';
        }
    }
}else{

}
?>