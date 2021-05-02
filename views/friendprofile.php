<?php
$temp = "";
if (isset($_SESSION["username"])) {
    $userdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_SESSION['username'] ."'");
    $user = mysqli_fetch_array($userdetails);
    $temp = $user["username"];
    $profiledetails = explode(',', $user["friends"]);

    $_SESSION["friend"] = $_GET['friendr'];

    $friendrequestdetails = mysqli_query($con,"SELECT * FROM users WHERE username='". $_GET['friendr'] ."'");
    $friendrequest = mysqli_num_rows($friendrequestdetails);
    $friendcount=0;
    if($friendrequest==1){
        foreach ($profiledetails as $value) {
            if ($value == $_GET['friendr']) {
                $friendcount=$friendcount+1;
          }
        }
    }else{
        header("Location: home.php");
    }
}else {
    header("Location: login.php");
}
$sucess = "";



$temp1="";
if (isset($_POST["post"])) {
    $username = $user["username"];
    $target = "public/images/posts/".basename($_FILES['image']['name']);
    $text = $_POST["text"];
    $time = date("Y-m-d H:i:s");
    $image = $_FILES['image']['name'];
    $query = mysqli_query($con,"INSERT INTO posts VALUES (',','$username','$target','$text','$time')");
    $noposts = $user["nopost"]+1;
    $nopo = mysqli_query($con,"UPDATE users set nopost='$noposts' WHERE username='". $_SESSION['username'] ."'");
    $temp1 = $username;
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        $sucess = "sucessfilly posted";
        header("Location: home.php");
    }else{
        header("Location: profile.php");
    }
}

?>