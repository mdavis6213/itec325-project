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

function createRestaurantCard($name,$distance,$category,$imagePath,$isFavorite= false){

    $buttonMaybe = "";

    if($isFavorite){
        $buttonMaybe = "<button class='btn btn-danger' style='float:right;'>x</button>";
    }

    echo
    "<div class='col-lg-3 mb-4'>
            <div class='card' style='width: 100%;'>
                <img  src='$imagePath' alt='menu-item'>
                <div class='card-body'>
                    <h3 class='card-title'>$name</h3>
                    <h4 class='card-title text-warning'><i class='material-icons' style='vertical-align: -1px; color:black;'>fastfood</i>$category</h4>
                    <p><i class='material-icons' style='vertical-align: -6px;'>location_on</i>$distance miles away</p>
                    <a href='restaurant.php' class='btn btn-warning'>Details</a>
                    $buttonMaybe
                </div>
            </div>
    </div>";
}





?>
