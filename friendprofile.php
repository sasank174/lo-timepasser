<?php
require "base.php";
require "views/friendprofile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/home.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="public/js/search.js" charset="utf-8"></script>
  <title>Home</title>
  <style>
    #xxx {
      vertical-align: middle;
      width: 50px;
      border-radius: 50%;
    }

    #livesearch {
      position: absolute;
      z-index: 1000;
      background: white;
      width: 100%;
      border-radius: 0px 0px 20px 20px;
    }

    .listitem1 {
      padding-bottom: 10px;
    }

    .accept {
      position: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100vh;
      background: white;
      z-index: 1000;
    }

    .accept .form {
      background: yellow;
      padding: 30px;
    }

    .accept .form a,
    button {
      display: block;
      width: 100%;
      text-decoration: none;
      text-align: center;
      background: #666;
      color: white;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <header>
    <a href="home.php" class="logo">LO</a>
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="feedback.php">Feedback</a>
    <a href="profile.php">Profile</a>
  </header>
  <!-- <div class='details'>
      <h2>Username</h2>
      
      <h2>No of posts</h2>
    </div> -->


  <?php
    if ($friendcount != 1) {
      echo
      '<div class="accept">
      <form class="form" action="home.php" method="post">
      <h1>ADD FRIEND</h1>
      <button type="submit" name="accept">ADD</button>
      <a href="home.php">CANCLE</a>
      </form>
      </div>';
    }

      ?>

      <div class="ads">
        <h4>Trending</h4>
        <div class="trends">
          <?php
          $query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");

          foreach ($query as $row) {

            $word = $row['title'];
            $word_dot = strlen($word) >= 14 ? "..." : "";

            $trimmed_word = str_split($word, 14);
            $trimmed_word = $trimmed_word[0];

            echo "<p>";
            echo $trimmed_word . $word_dot;
            echo "</p>";


          }

          ?>
        </div>
      </div>
      
  <div class="postupload" id="open">
    <div class="inputBox">
      <form action="home.php" method="post" enctype="multipart/form-data">
        <h1>New Post</h1>
        <input type="submit" name="post" value="Post">
        <input type="file" name="image" placeholder="image" required>
        <textarea name="text" placeholder="write your post...." required></textarea>
        <p><?php echo $sucess ?></p>
      </form>
      <button onclick='m1Function()'><i class='far fa-times-circle'></i></button>
    </div>
  </div>



  <div class="head">
    <div class="pic">
      <img src="<?php echo $user_pic1 ?>" alt="noimage">
      <a href="#" class="username"><?php echo $user_name1 ?></a>
      <div class="dropdown" style="float:right;">
        <button class="dropbtn"><i class="fas fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="profile.php"><i class="fas fa-user"></i> profile</a>
          <a href="#" onclick='mFunction()'><i class="far fa-plus-square"></i> post</a>
          <a href="profile.php"><i class="fas fa-user-cog"></i> settings</a>
          <a href="#"><i class="far fa-question-circle"></i> help</a>
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a>
        </div>
      </div>
    </div>

    <div class="frinds">
      <div class="inputBox">
        <form action="" method="get">
          <div class="find">
            <input type="text" onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu"
              placeholder="Search for friends..">
            <div id="livesearch"></div>
          </div>
        </form>
        <!-- <iframe src='search.php'></iframe> -->
      </div>
      <div class="list">
        <h2  style="text-align: center;padding-top:10px;"><?php echo $_GET['friendr']; ?> Friends List</h2>
        <?php
                foreach ($profiledetails1 as $value) {
                    $frienddetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $value ."'");
                    $friend = mysqli_fetch_array($frienddetails);
                    // print_r($friend);
                    $link = 'http://localhost/osp/friendprofile.php?friendr='. $friend["username"] .'';
                    echo "<div class='listitem'><img src='". $friend["profilepic"] ."' alt='no image'><a href='$link'>". $friend["username"] ."</a></div>";
                }
            ?>
      </div>
    </div>
  </div>
  <section>
    <script>
      function toggle <?php echo $id; ?> () {

        var target = $(event.target);
        if (!target.is("a")) {
          var element = document.getElementById("toggleComment<?php echo $id; ?>");

          if (element.style.display == "block")
            element.style.display = "none";
          else
            element.style.display = "block";
        }
      }
    </script>

    <?php

  $str = "";
  $data_query = mysqli_query($con, "SELECT * FROM posts WHERE username='". $_GET['friendr'] ."' ORDER BY id DESC");

    while($row = mysqli_fetch_array($data_query)) {
      $id = $row['id'];
      $post_pic = $row['post'];
      $user_name = $row['username'];
      $date_time = $row['time'];
      $post_text = $row['text'];

      $frienddetails = mysqli_query($con,"SELECT friends FROM users WHERE username='$temp'");
      $friend = mysqli_fetch_array($frienddetails);

      if((strstr($friend['friends'], $user_name) )) {

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
        </div>


        ";

      }
    }


  echo $str;

 ?>
  </section>
  <script>
    function mFunction() {
      document.getElementById("open").style.display = "block";
    }

    function m1Function() {
      document.getElementById("open").style.display = "none";
    }
  </script>
</body>

</html>
