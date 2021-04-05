<?php
    // database connection
//    $conn = mysqli_connect('localhost','mike','test','tech_takeout');
//
//    if(!$conn){
//        echo 'Connection error: '. mysqli_connect_error();
//    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome</title>
</head>
<body>

<?php include 'header.php';?>

<div class="container">
    <div class="row">
        <div class='card mx-auto' style="width:45rem;">
            <div class="card-header bg-danger">
                <h2 class='card-title'>Sign in</h2>
            </div>
            <div class='card-body'>
                <form>
                    <div class="signin-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email"  placeholder="Enter email">
                    </div>
                    <div class="signin-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <hr>
                    <a class="nav-link" href="register.php">
                        <p style="text-decoration: underline; text-align: center">Need an account?</p>
                    </a>
                    <div  style = "text-align:center;">
                        <button type="submit" class="btn btn-danger">Sign In!</button>
                    </div>
                </form>
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