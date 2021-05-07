<?php
session_start();

require "base.php";
require "views/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Login</title>
</head>

<body>
    <h1 class="logo">LO</h1>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div>
            <div class="container">
                <div class="form">
                    <h2>Login Form</h2>
                    <form action="login.php" method="POST">
                        <div class="inputBox">
                            <input type="text" name="username" placeholder="username" value="<?php 
                            if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="passowrd" required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="login" value="Login">
                        </div>
                        <p class="forgot">
                            <?php if (in_array("verified",$error_array)) echo "verification sucessfull";
                            elseif (in_array("inurl",$error_array)) echo "invalid url";?>

                            <?php if (in_array("username",$error_array)) echo "invalid username";
                            elseif (in_array("password",$error_array)) echo "incorrect password";
                            elseif (in_array("url",$error_array)) echo "not verified";
                            elseif (in_array("sucess",$error_array)) echo "logged sucessfully";?>
                        </p>
                        <p class="forgot">Forgot Password ?<a href="password.php">Click here</a></p>
                        <p class="forgot">Dont have an account ?<a href="register.php">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>