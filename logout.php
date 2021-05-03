<?php
require "base.php";



$username = $_SESSION["username"];
$date = $_SESSION["date"];
$minuit1 = $_SESSION["minuit1"];

$time2 = getdate();
$minuit2 = $time2["minutes"];

$used = $minuit2 - $minuit1;

if($used<0){
    $used = $used+60;
}

$query = mysqli_query($con,"SELECT * from time WHERE username='$username' AND date='$date'");
$data = mysqli_fetch_array($query);

$updatetime = intval($data["time"])+$used;

$query = mysqli_query($con,"UPDATE time SET time='$updatetime' WHERE username='$username' AND date='$date'");

session_destroy();
header("Location: login.php");
?>