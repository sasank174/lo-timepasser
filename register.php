<?php
session_start();

require "base.php";
require "views/register.php";
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
            <div class="container">
                <div class="form">
                    <h2>Register Form</h2>
                    <form action="register.php" method="POST">
                        <div class="inputBox">
                            <input type="text" name="username" placeholder="username" value="<?php 
                            if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="email" value="<?php 
                            if (isset($_SESSION["email"])) echo $_SESSION["email"]; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="passowrd" required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="register" value="Register">
                        </div>
                        <p class="forgot">
                            <?php if (in_array("email",$error_array)) echo "email already in use";
                            elseif (in_array("word",$error_array)) echo "username contains one word with max 5 letters";
                            elseif (in_array("username",$error_array)) echo "username already existed";
                            elseif (in_array("password",$error_array)) echo "password must be b/w 5 to 25";
                            elseif (in_array("sucess",$error_array)) echo "registered sucessfully";?>
                        </p>
                        <p class="forgot">Forgot Password ?<a href="password.php">Click here</a></p>
                        <p class="forgot">Already have an account ?<a href="login.php">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>