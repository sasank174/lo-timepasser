<?php

$username = "";
$email = "";
$password = "";
$date = "";
$error_array = array();

// checking ===================================

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $date = date("Y-m-d");

    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;

    $checke = mysqli_query($con,"SELECT email from users WHERE email='$email'");

    if (mysqli_num_rows($checke) != 0) {
        array_push($error_array,"email");
    }

    $checku = mysqli_query($con,"SELECT username from users WHERE username='$username'");
    if (mysqli_num_rows($checku) != 0) {
        array_push($error_array,"username");
    }

    if (str_word_count($username)!=1) {
        array_push($error_array,"word");
    }

    if (strlen($password) > 25 || strlen($password) < 5) {
        array_push($error_array,"password");
    }



    if (empty($error_array)) {
        $password = md5($password);

        $random = rand(1,16);

        $profile_pic = "public/images/default/profilepics/head" . $random .".png";

        $query = mysqli_query($con,"INSERT INTO users VALUES ('','$username', '$email', '$password', '$date', '$profile_pic', '0', '$username')");
        array_push($error_array,"sucess");

        $_SESSION["username"] = "";
        $_SESSION["email"] = "";
    }
}

?>
