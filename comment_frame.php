<?php
require "base.php";
require "views/home.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <title></title>
  </head>
  <body>

    <?php
    if (isset($_SESSION['username'])) {
      $userLoggedIn = $_SESSION['username'];
      $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
      $user = mysqli_fetch_array($user_details_query);
    }
    else {
      header("Location: home.php");
    }

    if(isset($_GET['post_id'])) {
      $post_id = $_GET['post_id'];
    }

    $user_query = mysqli_query($con, "SELECT username FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($user_query);

    $posted_to = $row['username'];

    if(isset($_POST['postComment' . $post_id])) {
      $post_body = $_POST['post_body'];
      $post_body = mysqli_escape_string($con, $post_body);
      $date_time_now = date("Y-m-d H:i:s");
      $insert_post = mysqli_query($con, "INSERT INTO comments VALUES ('', '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");
      echo "<p>Comment Posted! </p>";
    }
     ?>

       <form action="comment_frame.php?post_id=<?php echo $post_id; ?>"  name="postComment<?php echo $post_id; ?>" method="POST">
         <h3>Comments:</h3>
         <input type="submit" name="postComment<?php echo $post_id; ?>" value="Comment"
         style="float: right;
           outline: none;
           padding: 10px 20px;
           border-radius: 15px;
           color: black;
           background: rgba(255, 255, 255, 0.2);
           border: 1px solid rgba(0, 0, 0, 0.5);
           ">
     		<textarea name="post_body" style="height:90px;"></textarea>
     	</form><br>

      <!-- Load comments -->
      <?php
      $get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id ASC");
      $count = mysqli_num_rows($get_comments);

      if($count != 0) {

        while($comment = mysqli_fetch_array($get_comments)) {

          $comment_body = $comment['post_body'];
          $posted_to = $comment['posted_to'];
          $posted_by = $comment['posted_by'];
          $date_added = $comment['date_added'];
          $removed = $comment['removed'];
          ?>
          <div class="comment_section">
            <h1 style="color:blue"> <?php echo $posted_by?>  <span style="font-size: 20px;color:black">:<?php echo $comment_body?></span</h1>
    			</div>
          <?php

    		}
    	}
    	?>

  </body>
</html>
