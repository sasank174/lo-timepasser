<?php

$username = "";
$password = "";
$password2 = "";
$error_array = array();

// ===============check post=================

if (isset($_POST["passwordchange"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $password2 = md5($_POST["password2"]);

    if ($password != $password2) {
        array_push($error_array,"passwordnomatch");
    }


    // ================validate================

    $check = mysqli_query($con,"SELECT * from users WHERE username='$username'");

    if (mysqli_num_rows($check) != 1) {
        array_push($error_array,"username");
    }else {
        $query = mysqli_query($con,"UPDATE users SET password='$password' WHERE username='$username'");
        array_push($error_array,"sucess");   
    }
}
?>