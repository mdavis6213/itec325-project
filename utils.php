<?php

error_reporting(E_ALL);



function createMenuItemView($name,$description,$price,$imagePath){
    echo
    "<div class='col-md-4 mb-4'>
    <div class='card bg-danger' style='width:100%'>
        <img class='card-img-top' src='$imagePath' alt='menu-item' style='width:100%'>
        <div class='card-body'>
            <h4 class='card-title'>$name</h4>
            <h6 class='card-subtitle mb-2 text-muted'>$price</h6>
            <p class='card-text'>$description</p>
        </div>
        </div>
    </div>";
}

function createRestaurantCard($name,$distance,$category,$imagePath,$id,$isFavorite= false){
    $buttonMaybe = "";
    $disOrZip = ($isFavorite) ? $distance :  "$distance miles away";

    if(isset($_SESSION['ID'])) {
        $userId = $_SESSION['ID'];
        if ($isFavorite) {
            $buttonMaybe = "<a href='removeFavorite.php?restaurantId=$id&userId=$userId' style='float: right' class='btn btn-warning'>x</a>";
        }
    }
    echo
    "<div class='col-lg-3 mb-4'>
            <div class='card' style='width: 100%;'>
                <img  src='$imagePath' alt='menu-item'>
                <div class='card-body'>
                    <h3 class='card-title'>$name</h3>
                    <h4 class='card-title text-warning'><i class='material-icons' style='vertical-align: -1px; color:black;'>fastfood</i>$category</h4>
                    <p><i class='material-icons' style='vertical-align: -6px;'>location_on</i>$disOrZip</p>
                    <a href='restaurant.php?id=$id' class='btn btn-warning'>Details</a>
                    $buttonMaybe
                </div>
            </div>
    </div>";
}

//////////DETAILS/////////////////////////////////////////////////////

function createRestaurantDetailView($name,$zip,$phone,$description,$id,$connect){
    $favImage = "";

    if(isset($_SESSION['ID'])) {

        $userId = $_SESSION['ID'];

        $isFav = isFavorite($id, $connect);


        if($isFav === 1)
            $favImage = "<a href='toggleFavorite.php?isFav=$isFav&restaurantId=$id&userId=$userId'><img src='images/favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'></a>";
        else
            $favImage = "<a href='toggleFavorite.php?isFav=$isFav&restaurantId=$id&userId=$userId'><img src='images/non-favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'></a>";
    }
    else{
        $favImage = "<a href='register.php'><img src='images/non-favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'></a>";
    }

    echo "<div class='card mx-auto text-center' style='width:45rem;'>
            <div class='card-header bg-danger'>
                <h2 class='card-title text-white'>$name</h2>
            </div>
            <img src='images/restaurant1.jpg' alt='Card image'>
            <div class='card-body'>
                <p class='card-text'>$description </p>
                <div class='row'>
                    <div class='col-sm-4'>
                        <p><i class='material-icons' style='vertical-align: -6px;'>phone</i>$phone</p>
                    </div>
                    <div class='col-sm-4'>
                        <i class='material-icons' style='vertical-align: -6px;'>computer</i> <a href='#'>$name.com</a>
                    </div>
                    <div class='col-sm-4'>                     
                            $favImage                   
                    </div>
                </div>
                <div class='card-footer bg-transparent'>
                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#menuModal' style='width: 50%'>Menu</button>
                </div>
            </div>
        </div>";
}



//////////FIND FOOD/////////////////////////////////////////////////////


function createAllRestaurantCards($zip,$distance){
    include_once 'connect.php';

    //query for coordinates of provided ZIP Code
    if(!$rs = mysqli_query($connect,"SELECT * FROM Zips WHERE zip = $zip")) {
        echo "<strong>There was a database error attempting to retrieve your ZIP Code.</strong> Please try again.\n";
    }
    else {
        if (mysqli_num_rows($rs) == 0) {
            echo "<strong>No database match for provided ZIP Code.</strong> Please enter a new ZIP Code.\n";
        }
        else {
            //if found, set variables
            $row = mysqli_fetch_array($rs);
            $lat1 = $row['lat'];
            $lon1 = $row['lng'];
            $d = $distance;
            //earth's radius in miles
            $r = 3959;

            //compute max and min latitudes / longitudes for search square
            $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
            $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
            $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
            $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));


            //find all coordinates within the search square's area
            //exclude the starting point and any empty city values

            //$query =  "SELECT * FROM restaurants where ZipCode in  (SELECT zip FROM zips WHERE (lat <= $latN AND lat >= $latS AND lng <= $lonE AND lng >= $lonW) AND city != '' ORDER BY city, lat, lng)";

            $query =  "select * from restaurants left join zips on restaurants.ZipCode = zips.zip where restaurants.ZipCode in (SELECT zip FROM zips WHERE (lat <= $latN AND lat >= $latS AND lng <= $lonE AND lng >= $lonW) AND city != '' ORDER BY city, lat, lng)";


            if (!$rs = mysqli_query($connect, $query)) {
                echo "<strong>There was an error selecting nearby ZIP Codes from the database.</strong>";
            }
            elseif (mysqli_num_rows($rs) == 0) {
                echo "<strong>No nearby ZIP Codes located within the distance specified.</strong> Please try a different distance.\n";
            }
            else {
                while($row = mysqli_fetch_array($rs)) {
                     $distance = acos(sin(deg2rad($lat1)) * sin(deg2rad($row['lat'])) + cos(deg2rad($lat1)) * cos(deg2rad($row['lat'])) * cos(deg2rad($row['lng']) - deg2rad($lon1))) * $r;
                     createRestaurantCard($row['Name'], number_format($distance, 2, '.', ''), $row['Category'], "images/restaurant1.jpg",$row['ID']);
                }
            }
        }
    }


    mysqli_close ($connect);
}


//////////FAVORITES/////////////////////////////////////////////////////

function createFavoriteRestaurantCards(){
    include_once 'connect.php';

    $userID = $_SESSION['ID'];
    $SQLcmd = "SELECT * FROM restaurants where ID in (Select UserID from favorites where UserID = $userID)";
    $results = mysqli_query($connect,$SQLcmd);

    $count =0;


    while ($row=mysqli_fetch_assoc($results)) {
        createRestaurantCard($row['Name'], $row['ZipCode'], $row['Category'], "images/restaurant1.jpg",$row['ID'],true);
        $count++;
    }

    if($count === 0)
        echo "<p>You have no favorites yet!</p>";

    mysqli_close ($connect);
}


function isFavorite($restaurantId,$connect){

    $userID = $_SESSION['ID'];

    $SQLcmd = "SELECT * FROM favorites where UserID = $userID and RestaurantID = $restaurantId";

    $result = mysqli_query($connect,$SQLcmd);

    $rowcount=mysqli_num_rows($result);

    if($rowcount === 0)
        return 0;

    return 1;

}




?>
