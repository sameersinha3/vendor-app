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
        <title>My Apps</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="../css/table.css">
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
                echo "<span>Manage all Applications</span>";
            echo "</div>";

            echo "<div class='container_tab'>";
                echo "<table class='tab'>";
                    echo "<tr class='tab_index'>";
                        echo "<td>App Name</td>";
                        echo "<td>Author</td>";
                        echo "<td>Category</td>";
                        echo "<td>Website</td>";
                        echo "<td>Instagram</td>";
                        echo "<td>Facebook</td>";
                        echo "<td>Twitter</td>";
                        echo "<td>Approved</td>";
                        echo "<td>Modify</td>";
                        echo "<td>Delete</td>";
                    echo "</tr>";
                    $sql = mysqli_query($conn, "SELECT * FROM application");
                    if(mysqli_num_rows($sql) > 0){
                        $i = 0;
                        while($vet = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                            if($i % 2 == 0){
                                $background = "#fff";
                            }else{
                                $background = "#f2f2f2";
                            }
                            $i++;
                            echo "<tr class='tab_element' style='background-color: $background;'>";
                                echo "<td>".ucfirst(strtolower($vet['name']))."</td>";
                                $author = mysqli_fetch_array(mysqli_query($conn, "SELECT first_name, last_name FROM user WHERE id = $vet[id_user]"), MYSQLI_ASSOC);
                                echo "<td>".ucfirst(strtolower($author['first_name']))." ".ucfirst(strtolower($author['last_name']))."</td>";
                                echo "<td>".ucfirst(strtolower($vet['category']))."</td>";
                                $link = "No";
                                if($vet['link'] != NULL){
                                    $link = "Yes";
                                }
                                $ig = "No";
                                if($vet['instagram'] != NULL){
                                    $ig = "Yes";
                                }
                                $fb = "No";
                                if($vet['facebook'] != NULL){
                                    $fb = "Yes";
                                }
                                $tw = "No";
                                if($vet['twitter'] != NULL){
                                    $tw = "Yes";
                                }
                                $approved = "No";
                                if($vet['active'] == 1){
                                    $approved = "Yes";
                                }
                                echo "<td>$link</td>";
                                echo "<td>$ig</td>";
                                echo "<td>$fb</td>";
                                echo "<td>$tw</td>";
                                echo "<td>$approved</td>";
                                echo "<td style='cursor: pointer;' onclick='modify_app($vet[id])'><img src='../img/modify.png' style='height: 24px;'></td>";
                                echo "<td style='cursor: pointer;' onclick='try_delete_app($vet[id])'><img src='../img/delete.png' style='height: 24px;'></td>";
                            echo "</tr>";

                        }
                    }else{
                        echo "<tr class='tab_element'>";
                            echo "<td colspan='10' style='padding-top: 10px; padding-bottom: 0;'>No application found</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            echo "</div>";

            echo "<div class='bottom_box center_row'>";
                echo "<button class='btn_go_back' onclick='main_menu()'>Go Back</button>";
            echo "</div>";
        }
        ?>
    </body>
</html>

