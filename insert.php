<?php
include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO records (client, building, defendant, type_of_case, notice_expiration_date, complaint_filed, complaint_served, msc_date, trial_date, eviction_date, settlement_expiration_date, tenant_moveout_date, comments)
VALUES
('$_POST[client]','$_POST[building]','$_POST[defendant]', '$_POST[type_of_case]', '$_POST[notice_expiration_date]', '$_POST[complaint_filed]', '$_POST[complaint_served]', '$_POST[msc_date]', '$_POST[trial_date]', '$_POST[eviction_date]', '$_POST[settlement_expiration_date]', '$_POST[tenant_moveout_date]', '$_POST[comments]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "Record Added!<br />Back to Main...";

mysqli_close($con);
?>


<META http-equiv="refresh" content="1;URL=index.php">
