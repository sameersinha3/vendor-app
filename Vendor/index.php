<?php
    session_start();
    session_destroy();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form onsubmit="return false">
    <h3>Welcome!</h3>

    <label for="email_login">Email</label>
    <input type="email" placeholder="Email" id="email_login">

    <label for="psw_login">Password</label>
    <input type="password" placeholder="Password" id="psw_login">

    <button onclick="try_login()">Login</button>
    <div class="social">
        <div class="go" onclick="location.href = 'registration.php'">Sign Up</div>
    </div>
</form>
</body>
</html>
