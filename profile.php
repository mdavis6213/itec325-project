<!doctype html>
<html lang="en">
<?php include_once 'header.php';?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/profile.css"
    <title>Profile</title>
</head>


<body>
<h2 style="text-align:center">User Profile</h2>

<?php
    include_once 'connect.php';

     $accountUpdated = false;

     if(isset($_GET['account'])){
         $accountUpdated = true;
     }
     $email = $_SESSION['email'];
     $result = mysqli_query($connect, "Select * from Users where Email = '$email';");
     $row = mysqli_fetch_assoc($result);
     $name = $row['Name'];
     $zipcode = $row['ZipCode'];

     mysqli_close ($connect);

?>

<div class="card">
  <img src="images/user.png" alt="UserPic" style="width:100%">
  <p class="title">
  <form action="changeInfo.php" method = "post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value= <?php echo $email ?>><br><br>
    <label for="zipcode">Zipcode:</label>
    <input type="text" id="zipcode" name="zipcode" value=<?php echo $zipcode ?>><br><br>
    <label for="fullname">Name:</label>
    <input type="text" id="fullname" name="fullname" value= <?php echo $name ?> ><br><br>
    Password: <input type="password" value="" id="myInput"><br><br>
    <input type="checkbox" onclick="myFunction()" value="">Show Password
    <button type="submit" class="btn btn-danger">Save Changes!</button>
    <?php
       if($accountUpdated)
        echo "<p style = 'color: green;'>Account updated successfully!</p>";
    ?>
<br>
<br>
<br>

  </form>

<?php include_once 'footer.php';?>


    <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>