<?php

$aname = "";
$apassword = "";
$error_array = array();


if(isset($_POST["asubmit"])){
    $aname = $_POST["aname"];
    $apassword = $_POST["apassword"];

    if($aname == "sasank@gmail.com" && $apassword == "sasank"){
        $_SESSION["aname"] = $aname;
        header("Location: adminpanel.php");
    }
}

?>