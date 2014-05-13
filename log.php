<?php
$con=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	$email = $_POST['email'];
	$password = $_POST['password'];
$result = mysqli_query($con,"SELECT * FROM users where password='$password' and email='$email'");
$count = mysqli_num_rows($result);
if($count==1)
	header('Location: http://localhost/web_2014/egkegr.html');



mysqli_close($con);
?>
