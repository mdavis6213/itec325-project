<?php

require_once('validation-utils.php');
require_once('dbLogin.php');

require_once 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$zipCode = $_POST['zipcode'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


if(!isValidZip($zipCode)){
    header("Location: register.php?error=zip");
}

else if($password !== $confirmPassword){
    header("Location: register.php?error=password");
}

else if(doesUserExist($connect,$email)){
    header("Location: register.php?error=emailinuse");
}

else{
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (Email, ZipCode, Name, Password) VALUES('$email','$zipCode','$name','$hashedPwd');";

    $result = mysqli_query($connect, $sql);

    header("Location: register.php?error=none");
}

mysqli_close ($connect);
die();



?>
