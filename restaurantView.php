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

<?php include 'header.php';?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="container">
                <div class="card bg-danger" style="width:100%" >
                    <img class="card-img-top" src="images/restaurant1.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Mikes Burgers!</h4>
                        <p class="card-text">Aenean nibh diam, viverra vel dapibus nec, porta quis ante. Donec lobortis semper tincidunt. Praesent rhoncus eleifend felis, at bibendum justo lacinia ut. Quisque aliquet convallis lobortis. Ut non nunc sodales, pretium dui sed, commodo nisi. Integer dolor eros, aliquet in ante interdum, pretium interdum nunc. </p>
                        <p><i class="material-icons" style="vertical-align: -6px;">phone</i>1-888-888-888</p>
                        <i class="material-icons" style="vertical-align: -6px;">computer</i> <a href="#">mikesburgers.com</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <h1 style="text-align: center; margin-bottom: 5%">Menu</h1>
            <div class="container-fluid">
                <div class="row">
                    <?php include 'menuItemView.php';?>
                    <?php include 'menuItemView.php';?>
                    <?php include 'menuItemView.php';?>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include 'footer.php';?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>