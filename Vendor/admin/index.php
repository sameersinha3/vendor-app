<?php
    session_start();
    include "../config.php";

    if(empty($conn) || empty($_SESSION['id']) || $_SESSION['role'] != 1){
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="../css/flexbox.css">
        <link rel="stylesheet" href="../css/font.css">

        <script src="../js/jquery-3.6.4.js"></script>
        <script src="js/index.js"></script>

    </head>
    <body class="space_between_column">
        <div class="space_between_row top_dash">
            <span class="title_dash">ADMIN : <?php echo ucfirst(strtolower($_SESSION['name']))." ".ucfirst(strtolower($_SESSION['surname']))?></span>
            <span class="title_dash" onclick="logout()" style="cursor: pointer;">Logout</span>
        </div>
        <div class="container_box" style="flex-grow: 1; width: 100%;">
            <?php
                $id = intval($_SESSION['id']);
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
                $vet = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                if($vet['active'] == 0){
                    echo "<div class='box_active center_column'>";
                        echo "<h1>Your account is not active yet. Please wait for the admin to activate it.</h1>";
                        echo "<br><br><br>";
                        echo "<button class='logout_btn' onclick='logout()'>Logout</button>";
                    echo "</div>";
                }else{
                    echo "<div class='app_btn' onclick='all_apps()'>";
                        echo "<h2>All Apps</h2>";
                    echo "</div>";
                    echo "<div class='app_btn' onclick='new_app()'>";
                        echo "<h2>New App</h2>";
                    echo "</div>";
                    echo "<div class='app_btn' onclick='all_users()'>";
                        echo "<h2>All Users</h2>";
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>

