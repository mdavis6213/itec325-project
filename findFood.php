<?php
    require_once 'utils.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/findFood.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Food near you!</title>
</head>
<body>

<?php include_once 'header.php';?>

<div class="container-fluid" style= "width: 90%">
    <div class='card'>
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 mb-auto">
                    <h2>Food near you!</h2>
                </div>
                <div class="col-md-2 mb-auto">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#filterModal"  style="width: 100%;">Filter</button>
                </div>
            </div>
        </div>
        <div class='card-body'>
                <div class="row">
                    <?php createRestaurantCard("Mikes burgers!","2","American","images/restaurant1.jpg");?>
                    <?php createRestaurantCard("Mikes burgers!","2","American","images/restaurant1.jpg");?>
                    <?php createRestaurantCard("Mikes burgers!","2","American","images/restaurant1.jpg");?>
                    <?php createRestaurantCard("Mikes burgers!","2","American","images/restaurant1.jpg");?>
                    <?php createRestaurantCard("Mikes burgers!","2","American","images/restaurant1.jpg");?>
                </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>





<!-- Filer Modal -->
<div class="modal fade" id="filterModal">
    <div class="modal-dialog  modal-dialog-centered modal-md">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <h4 class="modal-title">Filters</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <form role="form">
                    <div class="form-group">
                        <label for="zip">Zip Code:</label>
                        <input id="zip" name="zip" type="text" placeholder="22026">
                    </div>
                    <div class="form-group">
                        <div class="slidecontainer">
                            <label for="zip">Distance:</label>
                            <input type="range" name = "range" min="1" max="100" value="50" class="slider">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Apply</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>