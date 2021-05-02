<?php
require "base.php";
require "views/feedback.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="public/css/feedback.css">
</head>

<body>
    <header>
        <a href="home.php" class="logo">LO</a>
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="feedback.php" class="active">Feedback</a>
        <a href="profile.php">Profile</a>
    </header>

    <section>
        <!-- <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div> -->
        <div class="box">
            <!-- <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div> -->
            <br><br><br><br>

            <div class="container">
                <div class="form">
                    <h2>Feedback</h2>
                    <form action="feedback.php" method="POST">
                        <div class="inputBox">
                            <textarea placeholder="Feedback" name="feedback" required></textarea>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="submit" value="Submit">
                            <?php if ($sucess != "") echo "<h1>$sucess</h1>"; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>