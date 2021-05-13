<?php
ob_start();

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