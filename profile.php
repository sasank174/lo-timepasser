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
    <link rel="stylesheet" href="public/css/main.css">
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

        .delete {
            background: white;
            padding: 12px;
            border-radius: 10px;
            float: right;
            color: #666;
            text-decoration: none;
            font-size: 25px;
            transition: 0.5s all;
        }

        .delete:hover {
            font-size: 30px;
            background: #666;
            color: white;
            padding: 10px;
        }

        .x{
            position: fixed;
            bottom: 0;
            right: 0;
        }

        .alert {
            position: relative;
            width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            /* background: white; */
            z-index: 9999999;
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .alert h3 {
            color: #b11fca;
            font-family: 500;
            font-size: 2.2em;
            letter-spacing: 1px;
        }

        .alert a:hover {
            letter-spacing: 4px;
            background: #fe3177;
            color: white;
            font-weight: 900;
        }

        .alert a {
            transition: 0.5s all;
            display: none;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px;
            background: white;
            color: #fe3177;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            font-weight: 500;
            font-size: 30px;
        }

        .batteryshape {
            position: relative;
            width: 140px;
            height: 65px;
            margin: 20px 0;
            border: 3px solid #333;
            border-radius: 10px;
        }

        .batteryshape::before {
            content: '';
            position: absolute;
            top: 50%;
            right: -12px;
            transform: translateY(-50%);
            width: 7px;
            height: 16px;
            background: #333;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .batteryshape::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .level {
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border-radius: 4px;
            overflow: hidden;
        }

        .percentage {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 50%;
            border-radius: 4px;
            background: linear-gradient(90deg, #9c28af, #fd2c72);
        }

        .percent {
            color: #fe3177;
            font-size: 2em;
            font-weight: 700;
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

    <div class="x">
        <div class="alert">
            <h3>Battery</h3>
            <div class="batteryshape">
                <div class="level">
                    <div class="percentage"></div>
                </div>
            </div>
            <div class="percent">50%</div>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <script src="public/js/main.js"></script>


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
                    <input type="file" accept="image/*" name="image" placeholder="image" required>
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
        $delete = "http://localhost/osp/profile.php?delete=$id";
        $str .= "
        <div class='post'>
            <h1><img id='xxx' src='".$friendim['profilepic']."' alt='no image'> $user_name : $post_text  <table><tr><a class='delete' href='".$delete."'><i class='fas fa-trash-alt'></i></a></tr></table>  </h1></br>
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