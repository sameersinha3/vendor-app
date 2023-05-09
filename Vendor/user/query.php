<?php
session_start();
include "../config.php";


if(isset($conn) && isset($_POST['create'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $site = mysqli_real_escape_string($conn, $_POST['site']);
    $author = intval($_SESSION['id']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    if($site == "NULL"){
        $site = NULL;
    }
    if($instagram == "NULL"){
        $instagram = NULL;
    }
    if($facebook == "NULL"){
        $facebook = NULL;
    }
    if($twitter == "NULL"){
        $twitter = NULL;
    }
    $sql = mysqli_query($conn, "INSERT INTO application (name, link, id_user, category, description, instagram, facebook, twitter, active) VALUES ('$name', '$site', $author, '$category', '$description', '$instagram', '$facebook', '$twitter', 0)");
    if($sql){
        echo 1;
    }else{
        echo 0;
    }
}elseif(isset($conn) && isset($_POST['modify'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $site = mysqli_real_escape_string($conn, $_POST['site']);
    $author = intval($_SESSION['id']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    if($site == "NULL"){
        $site = NULL;
    }
    if($instagram == "NULL"){
        $instagram = NULL;
    }
    if($facebook == "NULL"){
        $facebook = NULL;
    }
    if($twitter == "NULL"){
        $twitter = NULL;
    }
    $sql = mysqli_query($conn, "UPDATE application SET name = '$name', link = '$site', category = '$category', description = '$description', instagram = '$instagram', facebook = '$facebook', twitter = '$twitter' WHERE id = $_POST[id_app] AND id_user = $author");
    if($sql){
        echo 1;
    }else{
        echo 0;
    }
}elseif(isset($conn) && isset($_POST['delete'])){
    $sql = mysqli_query($conn, "DELETE FROM application WHERE id = $_POST[id_app] AND id_user = $_SESSION[id]");
    if($sql){
        echo 1;
    }else{
        echo 0;
    }
}