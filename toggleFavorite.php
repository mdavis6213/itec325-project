<?php
require_once 'connect.php';
$userID = $_GET['userId'];
$restaurantID = $_GET['restaurantId'];
$isFav = $_GET['isFav'];
$SQLcmd = "";

var_dump($_GET);

if($isFav) {
    $SQLcmd = "DELETE from favorites where UserId = $userID and RestaurantID = $restaurantID";
}

else{
    $SQLcmd = "INSERT INTO Favorites (RestaurantID, UserID) VALUES('$userID','$restaurantID');";
}

mysqli_query($connect, $SQLcmd);

header("Location: restaurant.php?id=$restaurantID");

mysqli_close ($connect);
die();

?>