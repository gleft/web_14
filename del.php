<?php 
session_start();
$con=mysqli_connect("localhost","root","","dimos") or die(mysql_error());

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo var_dump($_POST);
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	
$result = mysqli_query($con,"SELECT * FROM users where email='$email'");
$count = mysqli_num_rows($result);
echo var_dump($result);
if($count==1){
    $result = mysqli_query($con,"DELETE FROM users where email='$email'");
	

}

else {session_destroy();
header('location: index.php');}

}
mysqli_close($con);
?>
