<?php



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
                    <p><i class='material-icons' style='vertical-align: -6px;'>location_on</i>$distance miles away</p>
                    <a href='restaurant.php?id=$id' class='btn btn-warning'>Details</a>
                    $buttonMaybe
                </div>
            </div>
    </div>";
}



function createRestaurantDetailView($name,$zip,$phone,$description,$id){
    $favImage = "";
    $isFav = false;


    if(isset($_SESSION['ID'])) {
        include_once 'connect.php';

        $isFav = isFavorite($id,$connect);
        $userId = $_SESSION['ID'];

        if($isFav) {
           $favImage = "<a href='toggleFavorite.php?isFav=$isFav&restaurantId=$id&userId=$userId'><img src='images/favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'></a>";
        }
        else{
            $favImage = "<a href='toggleFavorite.php?isFav=$isFav&restaurantId=$id&userId=$userId'><img src='images/non-favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'></a>";
        }
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

function createAllRestaurantCards(){
    include_once 'connect.php';

    $SQLcmd = "SELECT * FROM restaurants";
    $results = mysqli_query($connect,$SQLcmd);


    while ($row=mysqli_fetch_assoc($results)) {
        createRestaurantCard($row['Name'], "2", $row['Category'], "images/restaurant1.jpg",$row['ID']);
    }

    mysqli_close ($connect);
}


function createFavoriteRestaurantCards(){
    include_once 'connect.php';

    $userID = $_SESSION['ID'];
    $SQLcmd = "SELECT * FROM restaurants where ID in (Select UserID from favorites where UserID = $userID)";
    $results = mysqli_query($connect,$SQLcmd);

    $count =0;


    while ($row=mysqli_fetch_assoc($results)) {
        createRestaurantCard($row['Name'], "2", $row['Category'], "images/restaurant1.jpg",$row['ID'],true);
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

    mysqli_close ($connect);

    if($rowcount ===0)
        return false;

    return true;

}




?>
