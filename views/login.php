<?php

$username = "";
$password = "";
$error_array = array();
// ===============check post=================

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $_SESSION["username"] = $username;

    // ================validate================

    $check = mysqli_query($con,"SELECT * from users WHERE username='$username'");

    if (mysqli_num_rows($check) != 1) {
        array_push($error_array,"username");
    }else {
        $data = mysqli_fetch_array($check);
        if ($password != $data["password"]) {
            array_push($error_array,"password");
        }else {
            array_push($error_array,"sucess");
            $_SESSION["username"] = $data["username"];
            header("Location: /osp");
        }
    
    }
    
    $_SESSION["email"] = "";

}
?>