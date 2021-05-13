<?php

$username = "";
$password = "";
$error_array = array();

if (isset($_GET["userd"]) ) {
    $userd = $_GET["userd"];
    $pass = $_GET["pass"];
    $query = mysqli_query($con,"SELECT * FROM users WHERE username='$userd' AND tpass='$pass'");
    if (mysqli_num_rows($query) == 1) {
        
        $query = mysqli_query($con,"UPDATE users SET password='$pass',tpass=',',temp='yes' WHERE username='$userd'");

        array_push($error_array,"verified");
    }else{
        array_push($error_array,"inurl");
    }
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $_SESSION["username"] = $username;

    $check = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
    
    if (mysqli_num_rows($check) != 1) {
        array_push($error_array,"username");
    }else {
        $data = mysqli_fetch_array($check);
        if ($password != $data["password"]) {
            array_push($error_array,"password");
        }elseif("yes" != $data["temp"]){
            array_push($error_array,"url");
        }else {
            array_push($error_array,"sucess");
            $_SESSION["username"] = $data["username"];

            $time1 = getdate();
            $minuit1 = $time1["minutes"];
            $_SESSION["minuit1"] = $minuit1;
            $date = $time1["month"]."/".$time1["mday"]."/".$time1["year"];
            $_SESSION["date"] = $date;

            $query = mysqli_query($con,"SELECT * FROM time WHERE username='$username' AND date='$date'");

            if(mysqli_num_rows($query) == 0){
                $query = mysqli_query($con,"INSERT INTO time VALUES ('','$username','$date','0')");
            }
            
            header("Location: /osp");
        }
    
    }
    
    $_SESSION["email"] = "";

}
?>