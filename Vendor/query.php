<?php
    session_start();
    include "config.php";


    if(isset($conn) && isset($_POST['registration'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $psw = $_POST['psw'];

        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'")) > 0){
            echo 2;
        }else{
            if(mysqli_query($conn, "INSERT INTO user (first_name, last_name, phone, email, psw, role, active) VALUES ('$first_name', '$last_name', '$phone', '$email', '$psw', 0, 0)")){
                $vet = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND psw = '$psw'"), MYSQLI_ASSOC);
                $_SESSION['id'] = $vet['id'];
                $_SESSION['email'] = $vet['email'];
                $_SESSION['name'] = $vet['first_name'];
                $_SESSION['surname'] = $vet['last_name'];
                $_SESSION['role'] = $vet['role'];
                echo $vet['role'];
            }else{
                echo 3;
            }
        }
    }elseif(isset($conn) && isset($_POST['login'])){
        $email = $_POST['email'];
        $psw = $_POST['psw'];

        $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND psw = '$psw'");

        if(mysqli_num_rows($sql) == 1){
            $vet = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            $_SESSION['id'] = $vet['id'];
            $_SESSION['email'] = $vet['email'];
            $_SESSION['name'] = $vet['first_name'];
            $_SESSION['surname'] = $vet['last_name'];
            $_SESSION['role'] = $vet['role'];
            echo $vet['role'];
        }else{
            echo 2;
        }
    }