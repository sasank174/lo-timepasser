<?php
ob_start();
// date_default_timezone_set('Asia/Kolkata');
if (!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}

$con = mysqli_connect("localhost","root","","osp");
if(mysqli_connect_errno()){
    echo "failed to connet " . mysqli_connect_errno();
}

?>