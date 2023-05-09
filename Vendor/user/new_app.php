<?php
session_start();
include "../config.php";

if(empty($conn) || empty($_SESSION['id']) || $_SESSION['role'] != 0){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="../css/flexbox.css">
        <link rel="stylesheet" href="../css/font.css">

        <script src="../js/jquery-3.6.4.js"></script>
        <script src="js/index.js"></script>

    </head>
    <body class="container2_box">
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
            echo "<div class='title_box center_row'>";
                echo "<span>Create a new Application</span>";
            echo "</div>";

            echo "<div class='row_multi_input'>";
                echo "<div class='row_double_input'>";
                    echo "<label for='name_app'>Name<sup>*</sup></label>";
                    echo "<input class='input_new_app' type='text' placeholder='Application name' id='name_app'>";
                echo "</div>";

                echo "<div class='row_double_input'>";
                    $name = ucfirst(strtolower($_SESSION['name']));
                    $surname = ucfirst(strtolower($_SESSION['surname']));
                    echo "<label for='author_app'>Author</label>";
                    echo "<input class='input_new_app' type='text' placeholder='Application name' id='author_app' value='$name $surname' disabled>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row_multi_input'>";
                echo "<div class='row_double_input'>";
                    echo "<label for='site_app'>Application's Website</label>";
                    echo "<input class='input_new_app' type='text' placeholder='https://www.app_site.com' id='site_app'>";
                echo "</div>";
                echo "<div class='row_double_input'>";
                    echo "<label for='category_app'>Category<sup>*</sup></label>";
                    echo "<input class='input_new_app' type='text' placeholder='Category' id='category_app'>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row_multi_input'>";
                echo "<div class='center_row' style='width: 100%;'>";
                    echo "<div class='row_single_input'>";
                        echo "<label for='description_app'>Description<sup>*</sup></label>";
                        echo "<textarea class='textarea_new_app' placeholder='Describe here your application' id='description_app'></textarea>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row_multi_input'>";
                echo "<div class='row_triple_input'>";
                    echo "<label for='instagram_app'>Instagram</label>";
                    echo "<input class='input_new_app' type='text' placeholder='Link to account' id='instagram_app'>";
                echo "</div>";
                echo "<div class='row_triple_input'>";
                    echo "<label for='facebook_app'>Facebook</label>";
                    echo "<input class='input_new_app' type='text' placeholder='Link to account' id='facebook_app'>";
                echo "</div>";
                echo "<div class='row_triple_input'>";
                    echo "<label for='twitter_app'>Twitter</label>";
                    echo "<input class='input_new_app' type='text' placeholder='Link to account' id='twitter_app'>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row_single_input start_row' style='width: 90%;'><small><sup>*</sup> Required fields</small></div>";

            echo "<div class='bottom_box space_evenly_row'>";
                echo "<button class='btn_save' onclick='try_create()'>Create</button>";
                echo "<button class='btn_go_back' onclick='main_menu()'>Go Back</button>";
            echo "</div>";
        }
        ?>
    </body>
</html>

