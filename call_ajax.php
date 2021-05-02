<?php
require "base.php";
$s1=$_REQUEST["n"];
$sql = mysqli_query($con,"SELECT * FROM users WHERE username like '%".$s1."%'");
// $sql=mysqli_query($conn,"select * from product where name like '%".$s1."%'");
// <a class='link-p-colr' href='view.php?product=".$row['id']."'> </a>

$s="";
while($row=mysqli_fetch_array($sql))
{
	$username = $row['username'];
	$s=$s."
<div class='listitem1'>
	<img src='".$row["profilepic"]."'>
	<a href='http://localhost/osp/friendprofile.php?friendr=$username'>$username</a>
	</div>	
	"	;
}
echo $s;
?>