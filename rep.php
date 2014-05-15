<?php
        //include 'config.php';
        session_start();
        $link=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
	if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
        //mysql_select_db($db_server["dimos"]) or die(mysql_error());
        //mysql_query("SET CHARACTER SET greek", $link);
	$title = $_POST['option'];
	$sxolia = $_POST['sxolia'];
	$email =  $_SESSION['email'];
	$latlon = $_POST['latlon'];
	$sql="INSERT INTO reports (title, sxolia, email, latlon) VALUES ('$title', '$sxolia', '$email', '$latlon')";
	if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}
header('Location: index.php');
echo "1 record added";
        mysqli_close($link);
?>
