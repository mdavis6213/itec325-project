
<div class="container">
    <div class="row">
        <div class='card mx-auto' style="width:45rem;">
            <div class="card-header bg-danger">
                <h2 class='card-title text-white'>Create An Account</h2>
            </div>
            <div class='card-body'>
                <form action="handleRegister.php" method="post">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                  </div>
                    <div class="form-group">
                      <label for="zipcode">Zip code</label>
                      <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter your zip code" required>
                    </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
                  </div>
                    <?php
                    if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error === 'zip')
                            echo "<p class='text-center' style='color: red; padding-top: 5%'>Invalid Zip code!</p>";
                        if($error === 'password')
                            echo "<p class='text-center' style='color: red; padding-top: 5%'>Passwords do not match!</p>";
                        if($error === 'emailinuse')
                            echo "<p class='text-center' style='color: red; padding-top: 5%'>Email already exists...</p>";
                    }
                    ?>
                  <hr>
                  <div  style = "text-align:center;">
                    <button type="submit" class="btn btn-danger">Join Now!</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>