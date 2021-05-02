<?php
session_start();

require "base.php";
require "views/admin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <title>ADMIN</title>
</head>

<body>
    <h1 class="logo">LO</h1>

    <section id="particles-js">
        <div class="box">
            <div class="form">
                <h2>Login</h2>
                <form action="admin.php" method="POST">
                    <div class="inputBx">
                        <input type="email" placeholder="Email" name="aname">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="inputBx">
                        <input type="password" placeholder="password" name="apassword">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="asubmit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="public/js/particles.js"></script>
    <script src="public/js/app.js"></script>
</body>

</html>