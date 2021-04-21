<?php
 session_start();
 $id = $_SESSION['ID'];


 $name = $_POST['fullname'];
 $email = $_POST['email'];

 //$password =

echo $id;

   include_once 'connect.php';

  $sql = "UPDATE Users SET Name = '$name', Email ='$email' WHERE ID = '$id';";

  // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  $result = mysqli_query($connect, $sql);

  header("Location: profile.php?account=success");

  echo ($result?  "Yes" : "No");

   mysqli_close ($connect);

?>