<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
        //include 'config.php';
        session_start();
        $link=mysqli_connect("localhost","root","","dimos") or die(mysql_error());
	if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts)){
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/home/gleft/Documents/weblink/htdocs/web_2014/upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "/home/gleft/Documents/weblink/htdocs/web_2014/upload/" . $_FILES["file"]["name"];
	$url_file= urlencode($_FILES["file"]["name"]);
			 
				$URL = "/home/gleft/Documents/weblink/htdocs/web_2014/upload/{$url_file}";
				
			
				
    }
  }
} else {
  echo "Invalid file";
}

$title = $_POST['option'];
	$sxolia = $_POST['sxolia'];
	$email =  $_SESSION['email'];
	$latlon = $_POST['latlon'];
	$sql="INSERT INTO reports (title, sxolia, email, latlon,path) VALUES ('$title', '$sxolia', '$email', '$latlon','$URL')";
	if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}
header('Location: index.php');
//echo "1 record added";
        mysqli_close($link);
?>
