<?php
        //include 'config.php';
        session_start();
        $link=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
	if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
        //mysql_select_db($db_server["dimos"]) or die(mysql_error());
        //mysql_query("SET CHARACTER SET greek", $link);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name =  $_POST['name'];
	$phone = $_POST['phone'];
	$sql="INSERT INTO users (email, password, name, phone) VALUES ('$email', '$password', '$name', '$phone')";
	if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}
header('Location: http://localhost/web_2014/index.php');
echo "1 record added";
        mysqli_close($link);
?>


