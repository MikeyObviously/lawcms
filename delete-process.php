<?php
 include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$size = count($_POST['count']);

$i = 1;



while($i < $size + 1) {
	
	echo "<p>" . $_POST['delete'][$i];
	++$i;
}

echo "Records Deleted, Back to menu...";
  
?>

<META http-equiv="refresh" content="1;URL=index.php">
