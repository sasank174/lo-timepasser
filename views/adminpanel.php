<?php

if (isset($_SESSION["aname"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users");
}else {
    header("Location: admin.php");
}

if(isset($_GET['delete'])) {
    $x = $_GET["delete"];
    $query = mysqli_query($con,"DELETE FROM users WHERE username = '$x'");
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




?>