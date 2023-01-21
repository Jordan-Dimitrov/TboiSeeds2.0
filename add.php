<?php
require "navigation.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Seed</title>
</head>
<body>
<div class="text-center">
    <br>
    <h2>Here you can add seeds</h2>
    <br>
</div>
<form method="post" action="user.php" id="theForm">
    <div class="text-center">
        <label for="seed">Seed:</label>
        <br>
        <input type="text" name="seed" id="seed" placeholder="BASEMENT" required size="12%">
        <br>
        <br>
        <label for="description">Description:</label>
        <br>
        <textarea name="description" id="description" placeholder="Very good seed" required rows="2" cols="25" maxlength="50"></textarea>
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
            <option value="Samson">Samson</option>
            <option value="Azazel">Azazel</option>
            <option value="Lazarus">Lazarus</option>
            <option value="Eden">Eden</option>
            <option value="The_Lost">The Lost</option>
            <option value="Lilith">Lilith</option>
            <option value="Keeper">Keeper</option>
            <option value="Apollyon">Apollyon</option>
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
        document.getElementById('theForm').submit();
        return;
    }
}
</script>
</html>