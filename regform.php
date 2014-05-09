<!DOCTYPE HTML> 
<html>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
<h1>

Εγγραφή Χρήστη
</h1>

<body>

<?php
// define variables and set to empty values
$name = $email = $password = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = test_input($_POST["name"]);
   $email = test_input($_POST["email"]);
   $phone = test_input($_POST["phone"]);
   $password = test_input($_POST["password"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<form method="post">
<table>
<tr>
<td><label>Email:</label></td> <td><input type="email" placeholder="Γράψτε το email σας" name="email"size="30"></td>
</tr>
<tr>
<td><label>password: </label></td> <td><input type="password" placeholder="Γράψτε το password σας" name="password"size="30"></td>
</tr>
<tr>
<td><label>Ονοματεπώνυμο(*): </label></td> <td><input type="text" placeholder="Γράψτε το όνομά σας" name="name"size="30"></td>
</tr>
<tr>
<td><label>Τηλέφωνο(*): </label></td> <td><input type="text" placeholder="Γράψτε το τηλέφωνό σας" name="phone" size="30"></td>
</tr>
</table>
<input type="submit" value="Εγγραφή">
</form>
<p style="text-align:center">Τα πεδία με * δεν είναι υποχρεωτικά</p>

<ul>
      <li><a href="index.php">Αρχική</a></li>
</ul>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $phone;
echo "<br>";
?>
<footer>
  <p>by GPtuning</p>
  
</footer>
</body>
</html>
