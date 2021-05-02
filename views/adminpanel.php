<?php

if (isset($_SESSION["aname"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users");
}else {
    header("Location: login.php");
}

if(isset($_GET['delete'])) {
    $x = $_GET["delete"];
    $query = mysqli_query($con,"DELETE FROM users WHERE username = '$x'");
    header("Location: adminpanel.php");
}


?>