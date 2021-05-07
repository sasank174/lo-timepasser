<?php

$temp="";
if (isset($_SESSION["username"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_SESSION['username'] ."'");
    $user = mysqli_fetch_array($userdetails);
    $temp = $user["username"];
}else {
    header("Location: login.php");
}

if (isset($_SESSION["username"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_SESSION['username'] ."'");
    $user = mysqli_fetch_array($userdetails);
}else {
    header("Location: login.php");
}

if(isset($_GET['delete'])) {
    $x = $_GET["delete"];
    $y = mysqli_query($con,"SELECT * FROM posts WHERE  id = '$x'");
    $row = mysqli_fetch_array($y);
    $z=  mysqli_query($con,"SELECT * FROM users WHERE  username = '". $row['username'] ."'");
    $q = mysqli_fetch_array($z);
    $noposts = $q["nopost"]-1;
    $nopo = mysqli_query($con,"UPDATE users set nopost='$noposts' WHERE username = '". $row['username'] ."'");
    $query = mysqli_query($con,"DELETE FROM posts WHERE id = '$x'");
    $query1 = mysqli_query($con,"DELETE FROM comments WHERE post_id = '$x'");

    header("Location: profile.php");
}

if (isset($_POST["email"])) {
    $nemail = $_POST["nemail"];
    $username = $user["username"];
    $query = mysqli_query($con,"UPDATE users SET email='$nemail' WHERE username='$username'");
    $_SESSION["changed"] = "Email";
    // $sucess = "email changes sucessfully " . $username ;
    header("Location: profile.php");

}

if (isset($_POST["password"])) {
    $npassword = $_POST["npassword"];
    $username = $user["username"];
    $npassword = md5($npassword);
    $query = mysqli_query($con,"UPDATE users SET password='$npassword' WHERE username='$username'");
    $_SESSION["changed"] = "Password";
    // $sucess = "password changed sucessfully " . $username ;
    header("Location: profile.php");
}

if (isset($_POST["profilepic"])) {
    $username = $user["username"];
    $target = "public/images/uprofile/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $query = mysqli_query($con,"UPDATE users SET profilepic='$target' WHERE username='$username'");


    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        $_SESSION["changed"] = "Image";
        // $sucess = "image changed sucessfully " . $username ;
        header("Location: profile.php");
    }else{
        // $sucess = "wrong changed sucessfully " . $username ;
        header("Location: profile.php");
    }
}

?>
