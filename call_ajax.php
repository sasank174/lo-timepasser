<?php
require "base.php";
$s1=$_REQUEST["n"];
$sql = mysqli_query($con,"SELECT * FROM users WHERE username like '%".$s1."%'");
$s="";
while($row=mysqli_fetch_array($sql))
{
	$username = $row['username'];
	$s=$s."
<div class='listitem1'>
	<img src='".$row["profilepic"]."'>
	<a href='friendprofile.php?friendr=$username'>$username</a>
	</div>
	"	;
}
echo $s;
?>
