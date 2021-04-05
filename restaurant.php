<?php
    require 'utils.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>

<?php require 'header.php';?>


<!--RestaurantCard-->
<div class="container">
    <div class="row">
        <div class='card mx-auto text-center' style="width:45rem;">
            <div class="card-header bg-danger">
                <h2 class='card-title text-white'>Mikes burgers!</h2>
            </div>
            <img src="images/restaurant1.jpg" alt="Card image">
            <div class='card-body'>
                <p class="card-text">Aenean nibh diam, viverra vel dapibus nec, porta quis ante. Donec lobortis semper tincidunt. Praesent rhoncus eleifend felis, at bibendum justo lacinia ut. Quisque aliquet convallis lobortis. Ut non nunc sodales, pretium dui sed, commodo nisi. Integer dolor eros, aliquet in ante interdum, pretium interdum nunc. </p>
                <div class="row">
                    <div class="col-sm-4">
                        <p><i class="material-icons" style="vertical-align: -6px;">phone</i>1-888-888-888</p>
                    </div>
                    <div class="col-sm-4">
                        <i class="material-icons" style="vertical-align: -6px;">computer</i> <a href="#">mikesburgers.com</a>
                    </div>
                    <div class="col-sm-4">
                        <div onclick="updateFav()">
                            <img  src='images/non-favorite.png' id = 'favImg' alt='menu-item' width='25px' height='25px'>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#menuModal" style="width: 50%">Menu</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Menu Modal -->
<div class="modal fade" id="menuModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <h5 class="modal-title">Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <?php createMenuItemView("French Fries","Crunchy Delicious Golden Fries!","$5.50","images/fries.jpg");?>
                        <?php createMenuItemView("French Fries","Crunchy Delicious Golden Fries!","$5.50","images/fries.jpg");?>
                        <?php createMenuItemView("French Fries","Crunchy Delicious Golden Fries!","$5.50","images/fries.jpg");?>
                        <?php createMenuItemView("French Fries","Crunchy Delicious Golden Fries!","$5.50","images/fries.jpg");?>
                        <?php createMenuItemView("French Fries","Crunchy Delicious Golden Fries!","$5.50","images/fries.jpg");?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php require 'footer.php';?>
    <script>
        let fav = false;

        function updateFav() {
            if(!fav)
                document.getElementById("favImg").src = 'images/favorite.png';
            else
                document.getElementById("favImg").src = 'images/non-favorite.png';

            fav = !fav;
        }
    </script>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

