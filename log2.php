<?php session_start();
$con=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	$email = $_POST['email'];
 	$password = $_POST['password'];
//an email kai password yparxoun sti basi -> mpes sti selida gia anafora problimatos
$result=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
$count=mysqli_num_rows($result);
if($count==1)
	{header('Location: index.php');}
mysqli_close($con);
?>
