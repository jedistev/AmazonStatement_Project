<!DOCTYPE html>

<html lang="en">
    <head>
        <?php include 'nav/meta.php'; ?>
        <?php include 'nav/css.php'; ?>
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body>
        <?php
        require('config/config.php');
        session_start();
// If form submitted, insert values into the database.
        if (isset($_POST['username'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            //Checking is user existing in the database or not
            $query = "SELECT * FROM `users` WHERE username='$username'
and password='" . md5($password) . "'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // Redirect user to index.php
                header("Location: index.php");
            } else {
                echo "<div class='form-signin'>
<h3 class='text-center'>Username/password is incorrect.</h3>
<br/><p class='text-center'>Click here to <a href='login.php'>Login</a></p></div>";
            }
        } else {
            ?>
            <div class="container">
                <form class="form-signin" action="" method="post" name="login">
                     <h2 class="form-signin-heading">Sign in</h2>
                     
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required autofocus />
                    
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required />
                    
                    <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Login" />
                </form>
<!--                <p class="text-center">Not registered yet? <a href='registration.php'>Register Here</a></p>-->
            </div>
        <?php } ?>
    </body>
</html>

