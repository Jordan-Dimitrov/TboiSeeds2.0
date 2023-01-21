<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/tboi.ico">
    <style>
        table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="text-center">
    <br>
    <h2>Register your new account</h2>
    <br>
    <form method="post" action="user.php" id="theForm">
        <input type="text" name="name" id="name" placeholder="Nai-golemiqt" minlength="6" required>
        <br>
        <br>
        <input type="password" name="pass" id="pass" placeholder="********" minlength="8" required>
        <br>
        <br>
        <button type="button" onclick="Validate()">submit</button>
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
           return;
       }
       if (pass.length<8){
           alert("Password should be at least 8 characters!")
           return;
       }
       document.getElementById('theForm').submit();
    }
</script>
</html>