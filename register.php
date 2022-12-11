<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="text-center">
    <h1>The Binding of Isaac Seeds</h1>
    <br>
    <form method="post" action="register.php">
        <input type="text" name="name" id="name" placeholder="Nai-golemiqt" minlength="6" required>
        <br>
        <br>
        <input type="password" name="pass" id="pass" placeholder="********" minlength="8" required>
        <br>
        <br>
        <button type="submit" onclick="Validate()">submit</button>
        <br>
        <br>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
<script>
    function Validate(){
       let name = document.getElementById('name').value;
       let pass = document.getElementById('pass').value;
       if (name.length<6){
           alert("Username should be at least 6 characters!")
       }
       if (pass.length<8){
           alert("Password should be at least 8 characters!")
       }
    }
</script>
</html>
<?php
require 'mysql.php';
if (isset($_POST['name'])&&isset($_POST['pass'])&&strlen($_POST['name'])>=6&&strlen($_POST['pass'])>=8){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $found = false;
    $pdoQuery = "SELECT * FROM users";
    $statement = $conn->prepare($pdoQuery);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach ($users as $user){
        if ($user->username==$name){
            $found = true;
        }
    }
    if ($found==false){
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        //Execute the query
        $stmt->execute([$name,$pass]);
        if ($conn) {
            header("Location: login.php");
            //Added successfully
        } else {
            echo '<script>alert("Error")</script>';
        }
    }else{
        echo '<script>alert("Username already exists")</script>';
    }
}else{

}
?>