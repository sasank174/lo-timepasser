<?php

$username = "";
$password = "";
$password2 = "";
$error_array = array();

// ===============check post=================

if (isset($_GET["userd"]) ) {
    $userd = $_GET["userd"];
    $pass = $_GET["pass"];
    $query = mysqli_query($con,"SELECT * FROM users WHERE username='$userd' AND tpass='$pass'");
    if (mysqli_num_rows($query) == 1) {
        
        $query = mysqli_query($con,"UPDATE users SET password='$pass',tpass=',' WHERE username='$userd'");

        array_push($error_array,"verified");
    }else{
        array_push($error_array,"inurl");
    }
}

if (isset($_POST["passwordchange"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $password2 = md5($_POST["password2"]);

    
    
    $subject = 'LO password change';
    $from = 'manamwhy@gmail.com';
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    
    // ================validate================
    
    $check = mysqli_query($con,"SELECT * from users WHERE username='$username'");
    
    
    if (mysqli_num_rows($check) != 1) {
        array_push($error_array,"username");
    }else {
        $data = mysqli_fetch_array($check);
        
        if ($password != $data["password"]) {
            array_push($error_array,"passwordnomatch");
        }
        $email = $data["email"];
        
        $to = $email;
        
        $mlink = "http://localhost/osp/password.php?userd=".$username."&pass=".$password;
        
        $message = '<div>
        <h1 style="position: relative;width: 50px;background: rgba(0, 0, 0, 0.1);border: 3px solid rgba(0, 0, 0, 0.3);color: black;font-weight: 900;font-size: 30px;padding: 20px;margin-left: 10px;vertical-align: middle;border-radius: 50%;text-decoration: none;">LO</h1>
        <a href="'.$mlink.'">click here to change your password MR/ms '.$username.'</a>
        <p>if link is not working copy paste the text:</p>
        <p>'.$mlink.'</p>
        </div>';


        if(mail($to, $subject, $message, $headers)){
            $query = mysqli_query($con,"UPDATE users SET tpass='$password' WHERE username='$username'");
            array_push($error_array,"sucess");
        }
    }
}
?>