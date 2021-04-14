<?php

require_once('validation-utils.php');
require_once('dbLogin.php');

$connect = mysqli_connect('localhost',$DB_USERNAME,$DB_PASSWORD,'tech_takeout');

if(!$connect){
    echo 'Connection error: '. mysqli_connect_error();
}

$name = $_POST['name'];
$email = $_POST['email'];
$zipCode = $_POST['zipcode'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


if(!isValidZip($zipCode)){
    header("Location: register.php?error=zip");
    die();
}

else if($password !== $confirmPassword){
    header("Location: register.php?error=password");
    die();
}

else if(doesUserExist($connect,$email)){
    header("Location: register.php?error=emailinuse");
    die();
}

else{
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Users (Email, ZipCode, Name, Password) VALUES('$email','$zipCode','$name','$hashedPwd');";

    $result = mysqli_query($connect, $sql);

    header("Location: register.php?error=none");
}

mysqli_close ($connect);



?>
