
<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, <?php echo $_SESSION['name'] ?></h1>
            <p>Welcome Back! Ready to enjoy your next meal?</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Pick Where to Go >></a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>View Recent Orders</h2>
                <p><strong>Restaurant 1</strong> <br> 1 entree <br> 1 drink <br></p>
                <p><strong>Restaurant 1</strong><br> 1 entree <br> 1 drink <br></p>
                <p><a class="btn btn-secondary" href="#" role="button">View orders »</a></p>
            </div>
            <div class="col-md-4">
                <h2>Ready to Try Somewhere New?</h2>
                <p>You have not tried a new restaurant recently. You should try this (restaurant name) based off our previous suggestions.  </p>
                <p><a class="btn btn-secondary" href="#" role="button">Look at Menus »</a></p>
            </div>
            <div class="col-md-4">
                <h2>Want to be in the know for new features? </h2>
                <p>This platform will be updating soon how you will see your favorites would you like to see what else we might change in the future? </p>
                <p><a class="btn btn-secondary" href="#" role="button">View News Updates »</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>