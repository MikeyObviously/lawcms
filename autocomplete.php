<?php
 $return_arr = array();
 $q=$_GET['term'];
 $my_data=mysql_real_escape_string($q);
 include('databaseconnect.php');
 $sql="SELECT DISTINCT building FROM records WHERE building LIKE '%$my_data%'";
 $result = mysqli_query($con,$sql) or die(mysqli_error());

 if($result)
 {
  while($row=mysqli_fetch_array($result))
  {
	$return_arr[] =  $row['building'];
  }
 }
 
 echo json_encode($return_arr);
 
?>