<?php
include_once 'connect.php';

$userID = $_GET['userId'];
$restaurantID = $_GET['restaurantId'];

echo $userID, $restaurantID;
$SQLcmd = "DELETE from favorites where UserId = $userID and RestaurantID = $restaurantID";
$results = mysqli_query($connect,$SQLcmd);

header("Location: favorites.php");

mysqli_close ($connect);
die();
?>
