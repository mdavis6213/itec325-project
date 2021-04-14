<?php
    require_once('validation-utils.php');
    require_once('dbLogin.php');

    $connect = mysqli_connect('localhost','mike','test','tech_takeout');

    if(!$connect){
        echo 'Connection error: '. mysqli_connect_error();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];


    if(!doesUserExist($connect,$email)){
        header("Location: index.php?error=loginfailed");
        mysqli_close ($connect);
        die();
    }
    else{
        if(loginUser($connect,$email,$password)){
            $result = mysqli_query($connect, "Select * from Users where Email = '$email';");
            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["zipCode"] = $row['ZipCode'];
            $_SESSION["name"] = $row['Name'];

            header("Location: index.php");
            mysqli_close ($connect);
            die();
        }
        else{
            header("Location: index.php?error=loginfailed");
            mysqli_close ($connect);
            die();
        }
    }

?>

