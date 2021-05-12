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
	<link rel="stylesheet" href="public/css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="public/js/search.js" charset="utf-8"></script>
	<title>Home</title>
	<style>
		.mystyle {
			position: fixed;
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 100vh;
			background: yellow;
			z-index: 9999999;
			background: rgba(255, 255, 255, 0.75);
			box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
			backdrop-filter: blur(4px);
			-webkit-backdrop-filter: blur(4px);
			border-radius: 10px;
			border: 1px solid rgba(255, 255, 255, 0.18);
			transition: 1s all;
		}

		.mystyle h1 {
			font-weight: 900;
			color: #666;
			font-size: 8vw;
			white-space: nowrap;
		}

		#shareoptions {
			position: relative;
			display: flex;
			justify-content: space-around;
		}

		#shareoptions a,
		i {
			vertical-align: middle;
		}

		.dropbtn {
			/* background-color: #4CAF50; */
			color: white;
			padding: 16px;
			font-size: 16px;
			border: none;
			cursor: pointer;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			white-space: nowrap;
			overflow: hidden;
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			width: 250px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		.dropdown-content p {
			display: inline;
			font-size: 20px;
			color: black;
			padding: 10px 12px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content p:hover {
			background-color: #f1f1f1
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown:hover .dropbtn {
			color: #666;
			/* background-color: #3e8e41; */
		}



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
			flex-direction: column;
			width: 100%;
			height: 100vh;
			background: rgb(225, 225, 225, 0.7);
			backdrop-filter: blur(6.0px);
			-webkit-backdrop-filter: blur(6.0px);
			z-index: 1000;
		}

		.accept .form {
			padding: 30px;
			background: rgb(150, 141, 141, 0.8);
			box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
			backdrop-filter: blur(6.0px);
			-webkit-backdrop-filter: blur(6.0px);
			border-radius: 10px;
			border: 1px solid rgba(255, 255, 255, 0.18);
			transition: 0.5s all;
		}

		.accept .form:hover {
			background: rgb(74, 145, 150);
		}

		.accept h1 {
			font-family: serif;
			font-size: 50px;
			margin-bottom: 30px;
			color: black;
			transition: 0.5s all;
		}

		.accept .form:hover h1 {
			color: white;
			letter-spacing: 2px;
		}

		.accept .form a,
		.bu {
			display: block;
			width: 100%;
			text-decoration: none;
			text-align: center;
			background: #666;
			color: white;
			padding: 20px;
			border-radius: 20px;
			border: none;
			font-weight: 900;
			font-size: 20px;
			letter-spacing: 3px;
			margin-top: 10px;
			transition: 0.5s all;
		}

		.accept .form a:hover,
		.bu:hover {
			letter-spacing: 5px;
			background: white;
			color: #666;
		}

		.any1 {
			width: 370px;
			display: flex;
			align-items: center;
			justify-content: center;
			background: rgb(94, 177, 224, 0.8);
			padding: 5px;
			border-radius: 10px;
		}

		.any1 img {
			position: relative;
			width: 70px;
			height: 70px;
			border-radius: 50%;
			vertical-align: middle;
		}

		.any1 a {
			position: relative;
			display: inline;
			font-size: 40px;
			text-decoration: none;
			margin-left: 10px;
			color: white;
			padding: 16px;
			font-weight: 900;
			border: none;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<div id="foo" style="display: none;">
		<h1 id="dis">Copied to Clipboard</h1>
	</div>

	<header>
		<a href="home.php" class="logo">LO</a>
		<a href="home.php">Home</a>
		<a href="about.php">About</a>
		<a href="feedback.php">Feedback</a>
		<a href="profile.php">Profile</a>
	</header>

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
	<script src="public/js/main.js"></script>




	<?php
	
    if ($friendcount != 1) {
		echo
		'<div class="accept">
		<div class="any1">
		<img src="'. $user_pic1 .'" alt="no image">
		<a href="#">'. $user_name1 .'</a>
		</div>
		<form class="form" action="home.php" method="post">
      	<h1>ADD FRIEND</h1>
      	<button class="bu" type="submit" name="accept">ADD <i class="fas fa-user-plus"></i></button>
      	<a href="home.php">CANCLE  <i class="fas fa-user-times"></i></i></a>
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
				<div>
					<div>
						<input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
							style="display: none;" required>
						<p id="no" style="text-align:center;"><img id="image"></p>
					</div>
					<p style="text-align:center;font-size:25px;font-weight:900"><label for="file"
							class="forlable">UPLOAD IMAGE</label></p>
				</div>

				<div class="popp">
					<textarea name="text" placeholder="write your post...." required></textarea>
					<input type="submit" name="post" value="Post">
				</div>

			</form>
			<button class="button" onclick='m1Function()'><i class='far fa-times-circle'></i></button>
		</div>
	</div>



	<div class="head">
		<div class="pic">
			<img src="<?php echo $user["profilepic"] ?>" alt="noimage">
			<a href="#" class="username"><?php echo $user["username"] ?></a>
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
				<h2 style="text-align: center;padding-top:10px;"><?php echo $_GET['friendr']; ?> Friends
					<span class="dropdown">
						<button class="dropbtn"><i class='far fa-share-square'></i></button>
						<div class="dropdown-content">
							<?php
								$qr ='https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=http://localhost/osp/friendprofile.php?friendr='.$_GET["friendr"];
								$share ='http://localhost/osp/friendprofile.php?friendr='.$_GET["friendr"];
							?>
							<p>
								<img src="<?php echo $qr; ?>" width="200px" height="200px"></p>
							<p id="shareoptions"><a><i onclick="copy();" class="far fa-copy"></i></a><a
									href="https://api.whatsapp.com/send?text=<?php echo $share; ?>"><i
										class="fab fa-whatsapp"></i></a></p>
							<p id="copytext"><?php echo $share; ?></p>
						</div>
					</span>
				</h2>
				<script>
					function copy() {
						var inp = document.createElement('input');
						document.body.appendChild(inp)
						inp.value = document.getElementById("copytext").innerHTML;
						var element = document.getElementById("foo");
						setTimeout(function () {
							element.classList.toggle("mystyle");
						}, 000);
						setTimeout(function () {
							element.classList.toggle("mystyle");
						}, 2000);
						inp.select();
						document.execCommand('copy', false);
						inp.remove();
					}
				</script>
				<?php
                foreach ($profiledetails1 as $value) {
                    $frienddetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $value ."'");
                    $friend = mysqli_fetch_array($frienddetails);
                    
                    $link = 'friendprofile.php?friendr='. $friend["username"] .'';
                    echo "<div class='listitem'><img src='". $friend["profilepic"] ."' alt='no image'><a href='$link'>". $friend["username"] ."</a></div>";
                }
            ?>
			</div>
		</div>
	</div>

	<script>


	</script>
	<section>
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
            <h1 class='posttext'><img id='xxx' src='".$friendim['profilepic']."' alt='no image'> $user_name : <span>$post_text</span> </h1></br>
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