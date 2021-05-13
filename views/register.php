<?php

$username = "";
$email = "";
$password = "";
$date = "";
$error_array = array();


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

    if (str_word_count($username)!=1 || strlen($username)>5) {
        array_push($error_array,"word");
    }

    if (strlen($password) > 25 || strlen($password) < 5) {
        array_push($error_array,"password");
    }
    
    $to = $email;
    $subject = 'LO verification';
    $from = 'manamwhy@gmail.com';
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
    
    
    
    
    if (empty($error_array)) {
        $password = md5($password);
        
        $random = rand(1,16);
        
        $profile_pic = "public/images/default/profilepics/head" . $random .".png";
        
        $mlink = "http://localhost/osp/login.php?userd=".$username."&pass=".$password;
        $message = '<div>
        <h1 style="position: relative;width: 50px;background: rgba(0, 0, 0, 0.1);border: 3px solid rgba(0, 0, 0, 0.3);color: black;font-weight: 900;font-size: 30px;padding: 20px;margin-left: 10px;vertical-align: middle;border-radius: 50%;text-decoration: none;">LO</h1>
        <a href="'.$mlink.'">click here to verify your account</a>
        <p>if link is not working copy paste the text:</p>
        <p>'.$mlink.'</p>
        </div>';


        if(mail($to, $subject, $message, $headers)){
            $query = mysqli_query($con,"INSERT INTO users VALUES ('','$username', '$email', 'password', '$date', '$profile_pic', '0', '$username','$password','no')");
            array_push($error_array,"sucess");
            $_SESSION["username"] = "";
            $_SESSION["email"] = "";
        }


    }
}

?>