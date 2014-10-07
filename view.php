<?php

include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}

$result = mysqli_query($con,"SELECT * FROM records");
$table = array();

while($row = mysqli_fetch_assoc($result))
  {
	//if (strtoupper($row['status']) == 'OPEN')
	//{
		$table[] = $row;
	//}
  }
  
echo "{\"aaData\":";
echo json_encode($table);
echo "}";

mysqli_close($con);

?>