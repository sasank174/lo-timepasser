<?php
require "base.php";
require "views/adminpanel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="./public/css/adminpanel.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>ADMIN || PANEL</title>
</head>

<body>
    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $(".users").slideToggle(1000);
            });
        });
    </script>
    <div class="abc">
        <a href="adminpanel.php?piechart=all">chart analysis</a>
        <a href="admin.php">Logout</a>
    </div>
    <h1 id="flip">USERS</h1>
    <div class="users">


        <table>
            <tr>
                <th>profile pic</th>
                <th>Username</th>
                <th>email</th>
                <th>posts</th>
                <th>analysis</th>
                <th>friends</th>
                <th>Delete</th>
            </tr><a href="#"></a>
            <?php
            while($row = mysqli_fetch_array($userdetails)){
                $username = $row['username'];
                $delete = "adminpanel.php?delete=$username";
                $analysis = "adminpanel.php?analysis=$username";
                $posts = "adminpanel.php?posts=$username";
                echo"
                <tr>
                    <td><img src='".$row["profilepic"]."' alt='img'></td>
                    <td><a onclick='showhim(this);' href='#'>".$row['username']."</a></td>
                    <td>".$row['email']."</td>
                    <td>".$row['nopost']."<a href='".$posts."'><i class='far fa-images'></i></a></td>
                    <td><a href='".$analysis."'><i class='fas fa-chart-line'></i></a></td>
                    <td>".$row['friends']."</td>
                    <td><a href='".$delete."'><i class='fas fa-trash-alt'></i></a></td>

                    </tr>";}

                    ?>
        </table>
    </div>

    <div>
        <?php
    if(isset($_GET['posts'])) {
        $x = $_GET["posts"];
        $str = "";
        $data_query = mysqli_query($con, "SELECT * FROM posts WHERE username='". $x ."' ORDER BY id DESC");
        while($row = mysqli_fetch_array($data_query)) {
            $id = $row['id'];
            $post_pic = $row['post'];
            $user_name = $row['username'];
            $date_time = $row['time'];
            $post_text = $row['text'];

            $frienddetails = mysqli_query($con,"SELECT friends FROM users WHERE username='$x'");
            $friend = mysqli_fetch_array($frienddetails);

            if((strstr($friend['friends'], $user_name) )) {
                $friendimg = mysqli_query($con,"SELECT * FROM users WHERE username='$user_name'");
                $friendim = mysqli_fetch_array($friendimg);
                $delete1 = "adminpanel.php?delete1=$id";                
                $str .= "
                <div class='post'>
                <h1 class='posttext'><img id='xxx' src='".$friendim['profilepic']."' alt='no image'> $user_name : <span>$post_text</span><table><tr><a class='delete' href='".$delete1."'><i class='fas fa-trash-alt'></i></a></tr></table> </h1></br>
                <img src='$post_pic' alt='no image'></br>
                <div class='post_comment'>
                <iframe src='comment_framea.php?post_id=$id' class='comment'></iframe>
                </div>
                </div>
                </div>
                ";

      }
    }


  echo $str;
    }
    ?>
    </div>

    <div id="piechart"></div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['username', 'Hours per Day'], 
                <?php echo $information; ?>
            ]);

            var options = {
                'title': 'Users AVG Usage',
                'width': 550,
                'height': 400,
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>


	<?php
	if(isset($_GET['analysis'])) {
		$query2 = "SELECT * FROM users WHERE username = '$x'";
    	$result2 = mysqli_query($con,$query2);
		$row2 = mysqli_fetch_array($result2);
        
		echo "<div class='haha'><img src='".$row2["profilepic"]."' alt='img'>
		<a>".$row2['username']."</a></div>";
	}
	?>
	<div id="myfirstchart"></div>
    <script>
        new Morris.Bar({
            element: 'myfirstchart',
            data: [ <?php echo $chart_data; ?> ],
            xkey: 'date',
            ykeys: ['time'],
            labels: ['minutes']
        });
    </script>
</body>

</html>