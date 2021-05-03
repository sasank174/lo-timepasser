<?php
require "base.php";
// require "views/home.php";
?>

    <?php

    if(isset($_GET['post_id'])) {
      $post_id = $_GET['post_id'];
    }

    $user_query = mysqli_query($con, "SELECT username FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($user_query);

    $posted_to = $row['username'];
    
    
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
