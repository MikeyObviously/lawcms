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
<form method='post' action='delete-process.php'>
<thead>
<tr>
<th>#</th>
<th>ID</th>
<th>Client</th>
<th>Building</th>
<th>Defendant</th>
<th>Type of Case</th>
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
	
  echo "<td><input type='hidden' name='count[$i]'><input type='checkbox' name='delete[$i]' value='" . $row['id'] ."'></td>"; 
  echo "<td>" . $row['id'] . "</td>"; 
  echo "<td>" . $row['client'] . "</td>";
  echo "<td>" . $row['building'] . "</td>";
  echo "<td>" . $row['defendant'] . "</td>";
  echo "<td>" . $row['type_of_case'] . "</td>";
  echo "<td>" . $row['notice_expiration_date'] . "</td>";
  echo "<td>" . $row['complaint_filed'] . "</td>";
  echo "<td>" . $row['complaint_served'] . "</td>";
  echo "<td>" . $row['msc_date'] . "</td>";
  echo "<td>" . $row['trial_date'] . "</td>";
  echo "<td>" . $row['eviction_date'] . "</td>";
  echo "<td>" . $row['settlement_expiration_date'] . "</td>";
  echo "<td>" . $row['tenant_moveout_date'] . "</td>";
  echo "<td class='td-right'>" . $row['comments'] . "</td>";
  echo "</tr>";
  $rowcount++;
  ++$i;
  }
echo "</table><input type='submit' name='Submit' value='Delete'></form>";

echo "<p>";
	
mysqli_close($con);
?>