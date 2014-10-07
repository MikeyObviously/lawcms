<?php include('header.php'); ?>
<?php

include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM records");
$rowcount = 0;
$i = 1;

echo "<table id='resultTable'>
<form method='post' action='updateall.php'>
<thead>
<tr>
<th>ID</th>
<th>Client</th>
<th>Building</th>
<th>Defendant</th>
<th>Type of Case</th>
<th>Status</th>
<th>Notice Expiration Date</th>
<th>Complaint Filed</th>
<th>Complaint Served</th>
<th>MSC Date</th>
<th>Trial Date</th>
<th>Eviction Date</th>
<th>Settlement Expiration Date</th>
<th>Tenant Moveout Date</th>
<th>Comments</th>
</tr></thead>";

while($row = mysqli_fetch_array($result))
  {
	  if ($rowcount % 2 === 0) {
		  echo "<tr class='even'>";
	  }
	  else {
		  echo "<tr class='odd'>";
	  }
  echo "<td>" . $row['id'] . "</td>"; 
  
  echo "<td><select name='client[$i]'><option value='" . $row['client'] . "'>" . $row['client'] . "</option>
	  <option value='Caritas'>Caritas</option>
	  <option value='Conard'>Conard</option>
	  <option value='John Stewart Company'>John Stewart Company</option></select></td>";
	  
  echo "<td><input name='building[$i]' type='text' value='" . $row['building'] . "'></td>";
  echo "<td><input name='defendant[$i]' type='text' value='" . $row['defendant'] . "'></td>";
  echo "<td><input class='typeOfCaseInput' name='type_of_case[$i]' type='text' value='" . $row['type_of_case'] . "'></td>";
  
  



  echo "<td><select name='status[$i]'><option value='" . $row['status'] . "'>" . $row['status'] . "</option>
  <option value='Open'>Open</option>
  <option value='Closed'>Closed</option></select></td>";  
  
  
  
  
  
  echo "<td><input class='dateInput' name='notice_expiration_date[$i]' type='text' value='" . $row['notice_expiration_date'] . "'></td>";
  echo "<td><input class='dateInput' name='complaint_filed[$i]' type='text' value='" . $row['complaint_filed'] . "'></td>";
  echo "<td><input class='dateInput' name='complaint_served[$i]' type='text' value='" . $row['complaint_served'] . "'></td>";
  echo "<td><input class='dateInput' name='msc_date[$i]' type='text' value='" . $row['msc_date'] . "'></td>";
  echo "<td><input class='dateInput' name='trial_date[$i]' type='text' value='" . $row['trial_date'] . "'></td>";
  echo "<td><input class='dateInput' name='eviction_date[$i]' type='text' value='" . $row['eviction_date'] . "'></td>";
  echo "<td><input class='dateInput' name='settlement_expiration_date[$i]' type='text' value='" . $row['settlement_expiration_date'] . "'></td>";
  echo "<td><input class='dateInput' name='tenant_moveout_date[$i]' type='text' value='" . $row['tenant_moveout_date'] . "'></td>";
  echo "<td class='td-right'><input name='comments[$i]' type='text' value='" . $row['comments'] . "'></td>";
 
  echo "</tr>";
  ++$i;
  $rowcount++;
  }
echo "</table>";

echo "<p><input type='submit' name='Submit' value='Make Changes'></form>";

mysqli_close($con);

?>

