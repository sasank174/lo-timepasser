<?php

if (isset($_SESSION["aname"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users");
}else {
    header("Location: admin.php");
}

if(isset($_GET['delete'])) {
    $x = $_GET["delete"];
    $query = mysqli_query($con,"DELETE FROM users WHERE username = '$x'");
    $query1 = mysqli_query($con,"DELETE FROM posts WHERE username = '$x'");
    $query2 = mysqli_query($con,"DELETE FROM comments WHERE posted_by = '$x'");
    $query3 = mysqli_query($con,"DELETE FROM posts WHERE posted_to = '$x'");
    header("Location: adminpanel.php");
}

if(isset($_GET['delete1'])) {
    $x = $_GET["delete1"];    
    $y = mysqli_query($con,"SELECT * FROM posts WHERE  id = '$x'");
    $row = mysqli_fetch_array($y);
    $z=  mysqli_query($con,"SELECT * FROM users WHERE  username = '". $row['username'] ."'");
    $q = mysqli_fetch_array($z);
    $noposts = $q["nopost"]-1;
    $nopo = mysqli_query($con,"UPDATE users set nopost='$noposts' WHERE username = '". $row['username'] ."'");
    $query = mysqli_query($con,"DELETE FROM posts WHERE id = '$x'");
    $query1 = mysqli_query($con,"DELETE FROM comments WHERE post_id = '$x'");
    header("Location: adminpanel.php");
}

if(isset($_GET['analysis'])) {
    $x = $_GET["analysis"];
    $query = "SELECT * FROM time WHERE username = '$x'";
    $result = mysqli_query($con,$query);
    $chart_data = '';

    while ($row = mysqli_fetch_array($result)) {
        $ti = $row["time"];
        $da = $row["date"];
        $chart_data .="{date:'". $da ."',time:". $ti ."},";
    }
}

if(isset($_GET['piechart'])) {
    $information='';
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)) {

        $user = $row["username"];

        $result1 = mysqli_query($con,"SELECT * FROM time WHERE username = '". $user ."'");
        // echo $user."---";
        $totaltime=0;
        
        while ($row1 = mysqli_fetch_array($result1)) {
            $totaltime = $totaltime + intval($row1["time"]);
        }
        // echo $totaltime."<br>";
        $information .="['". $user ."',$totaltime],";

    }
    // echo $information;
}




?>
