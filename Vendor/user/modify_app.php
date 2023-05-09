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
    if(True){
        $id_app = intval($_GET['id_app']);
        $application = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM application WHERE id = $id_app"), MYSQLI_ASSOC);
        echo "<div class='title_box center_row'>";
        echo "<span>Modify this Application</span>";
        echo "</div>";

        echo "<div class='row_multi_input'>";
        echo "<div class='row_double_input'>";
        echo "<label for='name_modify_app'>Name<sup>*</sup></label>";
        echo "<input class='input_new_app' type='text' placeholder='Application name' id='name_modify_app' value='$application[name]'>";
        echo "</div>";

        echo "<div class='row_double_input'>";
        $name = ucfirst(strtolower($_SESSION['name']));
        $surname = ucfirst(strtolower($_SESSION['surname']));
        echo "<label for='author_modify_app'>Author</label>";
        echo "<input class='input_new_app' type='text' placeholder='Application name' id='author_modify_app' value='$name $surname' disabled>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row_multi_input'>";
        echo "<div class='row_double_input'>";
        echo "<label for='site_modify_app'>Application's Website</label>";
        echo "<input class='input_new_app' type='text' placeholder='https://www.app_site.com' id='site_modify_app' value='$application[link]'>";
        echo "</div>";
        echo "<div class='row_double_input'>";
        echo "<label for='category_modify_app'>Category<sup>*</sup></label>";
        echo "<input class='input_new_app' type='text' placeholder='Category' id='category_modify_app' value='$application[category]'>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row_multi_input'>";
        echo "<div class='center_row' style='width: 100%;'>";
        echo "<div class='row_single_input'>";
        echo "<label for='description_modify_app'>Description<sup>*</sup></label>";
        echo "<textarea class='textarea_new_app' placeholder='Describe here your application' id='description_modify_app'>$application[description]</textarea>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row_multi_input'>";
        echo "<div class='row_triple_input'>";
        echo "<label for='instagram_modify_app'>Instagram</label>";
        echo "<input class='input_new_app' type='text' placeholder='Link to account' id='instagram_modify_app' value='$application[instagram]'>";
        echo "</div>";
        echo "<div class='row_triple_input'>";
        echo "<label for='facebook_modify_app'>Facebook</label>";
        echo "<input class='input_new_app' type='text' placeholder='Link to account' id='facebook_modify_app' value='$application[facebook]'>";
        echo "</div>";
        echo "<div class='row_triple_input'>";
        echo "<label for='twitter_modify_app'>Twitter</label>";
        echo "<input class='input_new_app' type='text' placeholder='Link to account' id='twitter_modify_app' value='$application[twitter]'>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row_single_input start_row' style='width: 90%;'><small><sup>*</sup> Required fields</small></div>";

        echo "<div class='bottom_box space_evenly_row'>";
        echo "<button class='btn_save' onclick='try_modify_app($id_app)'>Save</button>";
        echo "<button class='btn_go_back' onclick='my_apps()'>Go Back</button>";
        echo "</div>";
    }else{
        header("Location: index.php");
    }
}
?>
</body>
</html>

