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
    <h2>Login in existing account</h2>
    <form method="post" action="user.php">
        <br>
        <input type="text" name="username" placeholder="Nai-golemiqt" required>
        <br>
        <br>
        <input type="password" name="password" placeholder="********" required>
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