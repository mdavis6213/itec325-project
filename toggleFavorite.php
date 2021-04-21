<?php
require_once 'connect.php';
$userID = $_GET['userId'];
$restaurantID = $_GET['restaurantId'];
$isFav = $_GET['isFav'];
$SQLcmd = "";

var_dump($_GET);


if($isFav === "1") {
    $SQLcmd = "DELETE from Favorites where UserId = $userID and RestaurantID = $restaurantID";
}

else if($isFav === "0") {
    $SQLcmd = "INSERT INTO Favorites (RestaurantID, UserID) VALUES('$restaurantID', '$userID')";
}

mysqli_query($connect, $SQLcmd);

header("Location: restaurant.php?id=$restaurantID");

mysqli_close ($connect);
die();

?>