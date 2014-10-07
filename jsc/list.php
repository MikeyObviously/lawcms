<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
<title>Zanghi Torres Arshawsky LLP - JCS Cases</title>

<!--STYLE SHEETS AND FONTS-->
<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700' rel='stylesheet' type='text/css'>	
	
<!--JAVASCRIPT-->

<!--PHP INCLUDES-->

</head>
<body>

<?php
//$con=mysqli_connect("localhost","dbdemo","dbdemo","cms");
$con=mysqli_connect("mysql.omahapokerstrategy.org","ops_dbdemo","dbdemo","ops_cms");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT DISTINCT building FROM records WHERE client = 'John Stewart Company' ORDER BY building ASC");
$i = 0;


echo "<h1>John Stewart Company - ZTA Case Management</h1>";
echo "<ul id='menu'>";




while($row = mysqli_fetch_array($result)){
	echo "<li><a href='?building=" . $row['building'] . "'>" . $row['building'] . "</a></li>";
}

echo "</ul>";

?>