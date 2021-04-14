<div class="container">
    <div class="row">
        <div class='card mx-auto' style="width:45rem;">
            <div class="card-header bg-danger">
                <h2 class='card-title'>Sign in</h2>
            </div>
            <div class='card-body'>
                <form action="handleLogin.php" method='post'>
                    <div class="signin-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email"  name="email" placeholder="Enter email">
                    </div>
                    <div class="signin-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <?php
                    if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error === 'loginfailed')
                            echo "<p class='text-center' style='color: red; padding-top: 5%'>Invalid username or password</p>";
                    }
                    ?>
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

