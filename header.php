<?php

    session_start();

    $loggedIn = false;

    if(isset($_SESSION['email']))
        $loggedIn = true;
?>
<nav class="navbar navbar-expand-md navbar-light bg-danger" style = "margin-bottom: 2%">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" width="25px" height="25px" alt="logo">
      Tech Takeout
    </a>

  <div class="collapse navbar-collapse bg" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php
            if($loggedIn) {
                $zip = $_SESSION['zipCode'];
                echo "<li class='nav-item'><a class='nav-link text-white' href='findFood.php?dis=25&zip=$zip'>Eat</a></li>";
                echo "<li class='nav-item'><a class='nav-link text-white' href='favorites.php'>Favorites</a></li>";
                echo "<li class='nav-item'><a class='nav-link text-white' href='profile.php'>Profile</a></li>";
            }
            else{
                echo "<li class='nav-item'><a class='nav-link text-white' href='findFood.php?user=none'>Eat</a></li>";
            }
        ?>
        <li class="nav-item">
            <a class="nav-link text-white" href="8ball.php">Picker</a>
        </li>

    </ul>
        <?php
          //TODO fix link
           if($loggedIn) {
               echo "<a class='nav-link text-white'  href='logout.php'>Log out</a>";
           }
           else{
               echo "<a class='nav-link text-white'  href='index.php'>Sign in</a>";
           }
        ?>
 </div>
 </nav>


