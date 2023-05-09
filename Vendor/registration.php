<?php
    session_start();
    session_destroy();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="css/flexbox.css">

    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/registration.js"></script>

</head>
<body class="center_row">
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form onsubmit="return false">
    <h3>Sign Up</h3>

    <div class="space_between_row">
        <div class="start_column">
            <label for="first_name_signup">First Name</label>
            <input type="text" placeholder="First Name" id="first_name_signup">
        </div>
        <div style="width: 10px; height: 10px;"></div>
        <div class="start_column">
            <label for="last_name_signup">Last Name</label>
            <input type="text" placeholder="Last Name" id="last_name_signup">
        </div>
    </div>

    <label for="phone_signup">Phone Number</label>
    <input type="tel" placeholder="Phone" id="phone_signup">

    <label for="email_signup">Email</label>
    <input type="email" placeholder="Email" id="email_signup">

    <label for="psw_signup">Password</label>
    <input type="password" placeholder="Password" id="psw_signup">

    <button onclick="try_registration()">Sign Me Up!</button>
    <div class="social">
        <div class="go" onclick="location.href = 'index.php'">Login</div>
    </div>
</form>
</body>
</html>
