<?php

$sucess = "";
if (isset($_SESSION["username"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_SESSION['username'] ."'");
    $user = mysqli_fetch_array($userdetails);
}else {
    header("Location: login.php");
}

if (isset($_POST["submit"])) {
    $feedback = $_POST["feedback"];
    $date = date("Y-m-d");
    $username = $user["username"];

    $query = mysqli_query($con,"INSERT INTO feedbacks VALUES ('','$username', '$feedback', '$date')");
    $sucess = "Thank u for your feedback " . $username ;

}
?>