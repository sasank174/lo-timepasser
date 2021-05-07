<!DOCTYPE html>
<html lang="en">

<head>
    <script data-ad-client="ca-pub-6351481944770696" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABOUT PAGE</title>
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .our-team {
            position: relative;
            box-shadow: 0px 18px 16px 0px rgba(0, 0, 0, 0.5);
            padding: 30px 0 40px;
            background: white;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .our-team .pic {
            display: inline-block;
            width: 130px;
            height: 130px;
            margin-bottom: 50px;
            position: relative;
            z-index: 1;
        }

        .our-team .pic::before {
            content: '';
            width: 200%;
            height: 0;
            border-radius: 50%;
            background: #666;
            position: absolute;
            bottom: 135%;
            right: 0;
            left: 0;
            transform: scale(3);
            transition: all 1.3 linear 0s;
        }

        .our-team:hover .pic::before {
            height: 100%;
            transition: 1.5s;
        }

        .our-team .pic::after {
            content: '';
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #666;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .our-team .pic img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            transform: scale(1);
            transition: all 1.3s ease 0s;
        }

        .our-team:hover .pic img {
            box-shadow: 0 0 0 14px #f7f5ec;
            transform: scale(0.7);
        }

        .our-team .team-content {
            margin-bottom: 30px;
        }

        .our-team .title {
            font-size: 22px;
            font-weight: 700;
            color: #4e5052;
            letter-spacing: 1px;
            text-transform: capitalize;
            margin-bottom: 5px;
        }

        .our-team .post {
            display: block;
            font-size: 15px;
            color: #4e5052;
            text-transform: capitalize;
        }

        .our-team .social {
            width: 100%;
            padding: 0;
            margin: 0;
            background: #666;
            position: absolute;
            bottom: -100px;
            left: 0;
            transition: all 1.3s ease 0s;
        }

        .our-team:hover .social {
            bottom: 0;
        }

        .our-team .social li {
            display: inline-block;
        }

        .our-team .social li a {
            display: block;
            padding: 10px;
            font-size: 27px;
            color: white;
            transition: all 1.3s ease 0s;
        }

        .our-team .social li a:hover {
            color: #666;
            background: #f7f5ec;
            text-decoration: none;
        }

        .sci {
            position: absolute;
            bottom: 30px;
            display: flex;
        }

        .sci li {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .sci li a {
            position: relative;
            display: inline-block;
            margin-right: 20px;
            filter: invert(1);
            transform: scale(0.5);
        }

        .sci li a i {
            font-size: 50px;
            color: red;
        }

        .sci li :hover {
            color: rgb(0, 0, 0);
        }


        .header {
            position: relative;
            z-index: 10;
            top: 0;
            left: 0;
            background: white;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0px 18px 16px 0px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        .header a {
            text-decoration: none;
            font-size: 30px;
            display: inline;
            line-height: 3em;
            padding: 20px;
            color: #666;
            align-items: center;
            width: 20%;
            margin-left: 60px;
            border-radius: 20px;
        }

        .header a:hover {
            text-decoration: underline;
        }

        /* .active {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        } */

        .header .logo:hover {
            text-decoration: none;
        }

        .header .logo {
            background: rgba(0, 0, 0, 0.1);
            border: 3px solid rgba(0, 0, 0, 0.3);
            color: black;
            font-weight: 900;
            font-size: 30px;
            padding: 20px;
            margin-left: 10px;
            vertical-align: middle;
            border-radius: 50%;
            text-decoration: none;
        }

        .active{
            background: #666;
            color: white;
        }
    </style>



</head>

<body>
    <div class="header">
        <a href="home.php" class="logo">LO</a>
        <a href="home.php">Home</a>
        <a href="about.php" class="active" style="color: white;">About</a>
        <a href="feedback.php">Feedback</a>
        <a href="profile.php">Profile</a>
    </div>

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


    <section>
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="public/images/default/me1.jfif">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sasank</h3>
                            <span class="post">web developer</span>
                        </div>
                        <ul class="social">
                            <li><a class="fab fa-facebook-f"></a></li>
                            <li><a class="fab fa-instagram"></a></li>
                            <li><a class="fab fa-twitter"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="public/images/default/me2.jfif">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Karthik</h3>
                            <span class="post">web developer</span>
                        </div>
                        <ul class="social">
                            <li><a class="fab fa-facebook-f"></a></li>
                            <li><a class="fab fa-instagram"></a></li>
                            <li><a class="fab fa-twitter"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="public/images/default/me3.jfif">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Vinay</h3>
                            <span class="post">web developer</span>
                        </div>
                        <ul class="social">
                            <li><a class="fab fa-facebook-f"></a></li>
                            <li><a class="fab fa-instagram"></a></li>
                            <li><a class="fab fa-twitter"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>