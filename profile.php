<?php
require "base.php";
require "views/profile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="public/css/profile.css">
    <style>
        .xxyyzz {
            margin: 20px;
            text-align: center;
            font-size: 50px;
            font-weight: 900;
            font-family: serif;
        }

        #xxx {
            vertical-align: middle;
            width: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <header>
        <a href="home.php" class="logo">LO</a>
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="feedback.php">Feedback</a>
        <a href="profile.php" class="active">Profile</a>
    </header>


    <?php
        if (isset($_SESSION["changed"]) && $_SESSION["changed"] != "") {
            $msg = "<div class='made' id='close'><h1>". $_SESSION['changed'] ." changed sucessfully Mr/Mrs ". $user['username'] ."</h1><button onclick='mFunction()'><i class='far fa-times-circle'></i></button></div>";
            echo $msg;
        }
    ?>

    <section>
        <div class="details">
            <img src="<?php echo $user['profilepic'] ?>" alt="no image">
            <h1>Username: <?php echo $user["username"] ?></h1>
            <h1>Email : <?php echo $user["email"] ?></h1>
            <h1>Post : <?php echo $user["nopost"] ?></h1>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn"><i class="fas fa-pen"></i></button>
                <div class="dropdown-content">
                    <a href="#" onclick="myFunction('pro')"><i class="fas fa-portrait"></i> Edit profile</button>
                        <a href="#" onclick="myFunction('ema')"><i class="fas fa-at"></i> Edit Email</a>
                        <a href="#" onclick="myFunction('pas')"><i class="fas fa-lock"></i> Edit Password</a>
                </div>
            </div>
        </div><br>

        <div class="edetails" id="hide">
            <div class="edit" id="pro">
                <form action="profile.php" method="post" enctype="multipart/form-data">
                    <h1>New Profile Pic</h1>
                    <input type="file" name="image" placeholder="image" required>
                    <input type="submit" name="profilepic" value="Change">
                </form>
            </div>
            <div class="edit" id="ema">
                <form action="profile.php" method="post">
                    <h1>New Email</h1>
                    <input type="email" name="nemail" placeholder="new email" placeholder="Email" required>
                    <input type="submit" name="email" value="Change">
                </form>
            </div>
            <div class="edit" id="pas">
                <form action="profile.php" method="post">
                    <h1>New Password</h1>
                    <input type="password" name="npassword" placeholder="Password" required>
                    <input type="submit" name="password" value="Change">
                </form>
            </div>
        </div>
        <h1 class="xxyyzz">POSTS</h1>





        <?php

  $str = ""; //String to return
  $data_query = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC");

    while($row = mysqli_fetch_array($data_query)) {
      $id = $row['id'];
      $post_pic = $row['post'];
      $user_name = $row['username'];
      $date_time = $row['time'];
      $post_text = $row['text'];

      $frienddetails = mysqli_query($con,"SELECT friends FROM users WHERE username='$temp'");
      $friend = mysqli_fetch_array($frienddetails);

      if((strstr($temp, $user_name) )) {
        $friendimg = mysqli_query($con,"SELECT * FROM users WHERE username='$user_name'");
        $friendim = mysqli_fetch_array($friendimg);

        $str .= "
        <div class='post'>
            <h1><img id='xxx' src='".$friendim['profilepic']."' alt='no image'> $user_name : $post_text </h1></br>
            <img src='$post_pic' alt='no image'></br>
            <div class='post_comment'>
              <iframe src='comment_frame.php?post_id=$id' class='comment'></iframe>
            </div>
            </div>
        </div><br>
        ";

      }
    } //End while loop


  echo $str;

 ?>

    </section>


    <script>
        function mFunction() {
            document.getElementById("close").style.display = "none";
        }
    </script>

    <script>
        var x = document.getElementById("pro");
        var y = document.getElementById("ema");
        var z = document.getElementById("pas");
        var w = document.getElementById("hide");

        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";

        function myFunction(res) {

            w.style.display = "inline-block";

            if (res == "pro") {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
            } else if (res == "ema") {
                x.style.display = "none";
                y.style.display = "block";
                z.style.display = "none";
            } else if (res == "pas") {
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>


</body>

</html>
