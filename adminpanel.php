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
                <th>friends</th>
                <th>Delete</th>
            </tr><a href="#"></a>
            <?php
            while($row = mysqli_fetch_array($userdetails)){
                $username = $row['username'];
                $delete = "http://localhost/osp/adminpanel.php?delete=$username";
                echo"
                <tr>
                    <td><img src='".$row["profilepic"]."' alt='img'></td>
                    <td><a onclick='showhim(this);' href='#'>".$row['username']."</a></td>
                    <td>".$row['email']."</td>
                    <td>".$row['nopost']."</td>
                    <td>".$row['friends']."</td>
                    <td><a href='".$delete."'><i class='fas fa-trash-alt'></i></a></td>
                    
                    </tr>";}
                    
                    ?>
        </table>

    </div>



</body>

</html>