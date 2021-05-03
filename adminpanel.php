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
                $delete = "http://localhost/osp/adminpanel.php?delete=$username";
                $analysis = "http://localhost/osp/adminpanel.php?analysis=$username";
                $posts = "http://localhost/osp/adminpanel.php?posts=$username";
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
    }
    ?>
    </div>


    <div id="myfirstchart" style="height: 250px;"></div>
    <div>

    </div>
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