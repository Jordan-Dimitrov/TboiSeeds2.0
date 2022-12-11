<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="text-center">
    <h1>The Binding of Isaac Seeds</h1>
    <form method="post" action="login.php">
        <br>
        <input type="text" name="name" placeholder="Nai-golemiqt" required>
        <br>
        <br>
        <input type="password" name="pass" placeholder="********" required>
        <br>
        <br>
        <button type="submit">submit</button>
        <br>
        <br>
    </form>
    <p>Don't have an account? <a href=" register.php">Register</a></p>
</div>
</body>
</html>

<?php
require 'mysql.php';
if (isset($_POST['name'])&&isset($_POST['pass'])&&strlen($_POST['name'])!=0&&strlen($_POST['pass'])!=0){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $found = false;
    $pdoQuery = "SELECT * FROM users";
    $statement = $conn->prepare($pdoQuery);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    $id = 0;
    foreach ($users as $user){
        if ($user->username==$name){
            if ($user->password==$pass){
                $found = true;
                $id = $user->idUsers;
            }
        }
    }
    if ($found==true){
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        header("Location: main.html");
    }else{
        echo '<script>alert("Error")</script>';
    }
}else{

}
?>