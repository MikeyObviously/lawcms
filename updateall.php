<?php
include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$size = count($_POST['client']);

$i = 1;
while($i < $size + 1) {
	$client = $_POST['client'][$i];
	$building = $_POST['building'][$i];
	$defendant = $_POST['defendant'][$i];
	$type_of_case = $_POST['type_of_case'][$i];
	$status = $_POST['status'][$i];
	$notice_expiration_date = $_POST['notice_expiration_date'][$i];
	$complaint_filed = $_POST['complaint_filed'][$i];
	$complaint_served = $_POST['complaint_served'][$i];	
	$msc_date = $_POST['msc_date'][$i];
	$trial_date = $_POST['trial_date'][$i];
	$eviction_date = $_POST['eviction_date'][$i];
	$settlement_expiration_date = $_POST['settlement_expiration_date'][$i];
	$tenant_moveout_date = $_POST['tenant_moveout_date'][$i];
	$comments = $_POST['comments'][$i];	
	
	$query = "UPDATE records SET 
	client = '$client', 
	building = '$building',  
	defendant = '$defendant',
	type_of_case = '$type_of_case',
	status = '$status',
	notice_expiration_date = '$notice_expiration_date',
	complaint_filed = '$complaint_filed',
	complaint_served = '$complaint_served',
	msc_date = '$msc_date',
	trial_date = '$trial_date',
	eviction_date = '$eviction_date',
	settlement_expiration_date = '$settlement_expiration_date',
	tenant_moveout_date= '$tenant_moveout_date',
	comments = '$comments'
	WHERE id = '$i'";
	mysqli_real_query($con,$query) or die ("Error in query: $query");
	
	++$i;
}
	echo "Records Updated!";
	echo "Back to menu...";

?>

<META http-equiv="refresh" content="1;URL=index.php">
