<?php
$con=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	$email = $_POST['email'];
	$password = $_POST['password'];
$sql="SELECT * FROM $users WHERE email='$email' AND password='$password'"
$result=mysqli_query($sql);
$count=mysql_num_rows($result);
if($count==1)
	{header("egkegr.html");}



mysqli_close($con);
?>
