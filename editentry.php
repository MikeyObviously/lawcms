<?php
include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$id = $_POST['id'];
$value = $_POST['value'];
$column = $_POST['column'];

$query = "UPDATE records SET $column = '$value' WHERE id = '$id'";
mysqli_real_query($con,$query) or die ("Error in query: $query");

mysqli_close($con);
echo $value;
 ?>