<?php session_start();
//mag show sang information sang user nga nag login
$member_id=$_SESSION['email'];

if (!isset($_SESSION['email']))
{
header('location: index.php');
}
//$result=mysql_query("select * from users where email='$email'")or die(mysql_error);
//$row=mysql_fetch_array($result);

//$email=$row['email'];
//$LastName=$row['LastName'];

//echo $FirstName." ".$LastName;
//ss
?>
<!DOCTYPE html>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<head>

<title>Ο Δήμος Μας</title>
<link rel="stylesheet" type="text/css" href="style.css">

<!-- maps from developers.google.com--> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
 <script>
//marker locations with address
var markers = [
      ['gipedo', 38.261738,21.745615],
      ['lidl', 38.263246,21.743383],
      ['pl. georgiou', 38.246244,21.735058],
      ['pl. olgas', 38.249172,21.737512],
      ['karabi', 38.255474,21.736793]
    ];
var map;

function initialize() {

  var mapOptions = {
    zoom: 10
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

google.maps.event.addListener(map, 'click', function(e) {
alert(e.latLng); 
}); 


  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: '<div style="width:80px; height:20px">είστε εδώ</div>'
	
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
//place multiple markers with info boxes from http://www.dreamdealer.nl/tutorials/placing_multiple_markers_on_a_google_map.html
var infowindow = new google.maps.InfoWindow(), marker, i;
for (i = 0; i < markers.length; i++) {  
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(markers[i][1], markers[i][2]),
        map: map
    });
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infowindow.setContent(markers[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
}


function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);

}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>


<h1>Αναφορά προς τον Δήμο μας</h1>


<br /><br /><br />
<br /><br />

<form action="rep.php" method="post">
<p>Επιλέξτε την κατηγορία αναφοράς που θα κάνετε:</p>
<select name="option">
<option value ="noise">Ηχορύπανση</option>
<option value ="clean">Καθαριότητα</option>
<option value ="roads">Δρόμοι</option>
<option value ="security" selected>Έλειψη φύλαξης</option>
<option value ="shops">Έλειψη καταστημάτων</option>
<option value ="pt">Μέσα μαζικής μεταφοράς</option>
</select>

<br /><br />
Σχόλια σχετικά με την αναφορά σας:<br /><br />
<div id="map-canvas" style="width:800px;height:400px;"></div>

<br><textarea name="sxolia" id="Σχόλια">
Γράψτε κάτι...
</textarea><br />


Τοποθεσια: <input type="float" name="latlon"><br>

<input type="submit" value="Προσθήκη" /><br>
</form>
<br /><br />
<br /><br />

<p>Ανεβάστε φωτογραφίες σχετικά με το πρόβλημά σας:</p>
<form action="upload.php" method="post" enctype="multipart/form-data">
Αρχείο: <input type="file" name="filename" />
<input type="submit" value="Φόρτωση" />
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
Αρχείο: <input type="file" name="filename" />
<input type="submit" value="Φόρτωση" />
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
Αρχείο: <input type="file" name="filename" />
<input type="submit" value="Φόρτωση" />
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
Αρχείο: <input type="file" name="filename" />
<input type="submit" value="Φόρτωση" />
</form>
<br /><br />
<br />
<ul>
      <li><a href="index.php">Αρχική</a></li>
</ul>
<footer>
  <p>by GPtuning</p>
</footer>
</body>
