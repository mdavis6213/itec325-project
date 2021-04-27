<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="styles/8ball.css">
    <title>Profile</title>
</head>
<body>

<?php include_once 'header.php';?>
<div id="content">
    <h1>Magic Ate ball </h1>
    <p id="info">Ready to pick your restaurant?</p>
    <div id="eight-ball" class="eight-ball">
        <div class="answer">
            <p id="eight">8</p>
        </div>
    </div>
    <p id="answer">
        <?php
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $id = $_GET['id'];
            echo "<a href='restaurant.php?id=$id'>$name</a>";
        }
        else if (isset($_GET['error'])){
            echo "No restaurants near you!";
        }
        ?>
    </p>
    <div>
        <form role='form' method='post' action='shake8Ball.php'>
            <div class='form-group'>
                <label for='zip'>Enter zip code:</label>
                <input type='text' name='zip' id='zip' pattern='^\s*?\d{5}(?:[-\s]\d{4})?\s*?$' required>
                <br/>
                <label for='dis'>Distance:</label>
                <input type='range' name = 'dis' id = 'dis' min='0' max='100' value='25' class='slider'><span id='sliderText'></span>
                <br/>
                <button class="btn btn-danger" style="margin-bottom: 5px;">Shake!</button>
            </div>
        </form>
    </div>
</div>


<?php include_once 'footer.php';?>

<script>
    let slider = document.getElementById("dis");
    let output = document.getElementById("sliderText");

    output.innerHTML = slider.value + " miles";

    slider.oninput = function() {
        output.innerHTML = this.value + " miles";
    }
</script>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>