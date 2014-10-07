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



echo "<div id='container'><table id='resultTable' class='display'>
<thead>
<tr>
<th>ID</th>
<th id='clientHeader'>Client</th>
<th id='buildingHeader'>Building</th>
<th id='defendantHeader'>Defendant</th>
<th id='typeHeader'>Type of Case</th>
<th id='status'>Status</th>
<th id='dateHeader'>Notice Expiration Date</th>
<th id='dateHeader'>Complaint Filed</th>
<th id='dateHeader'>Complaint Served</th>
<th id='dateHeader'>MSC Date</th>
<th id='dateHeader'>Trial Date</th>
<th id='dateHeader'>Eviction Date</th>
<th id='dateHeader'>Settlement Expiration Date</th>
<th id='dateHeader'>Tenant Moveout Date</th>
<th id='commentHeader'>Comments</th>
</tr></thead><tbody>";

while($row = mysqli_fetch_array($result))
  {
	if (strtoupper($row['status']) == 'OPEN')
	{
		if ($rowcount % 2 === 0) {
			echo "<tr class='even'>";
		}
		else {
			echo "<tr class='odd'>";
		}
		  echo "<td>" . $row['id'] . "</td>"; 
		  echo "<td>" . $row['client'] . "</td>";
		  echo "<td>" . $row['building'] . "</td>";
		  echo "<td>" . $row['defendant'] . "</td>";
		  echo "<td>" . $row['type_of_case'] . "</td>";
		  echo "<td>" . $row['status'] . "</td>";
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
	}
  }
echo "</tbody></table></div>";

mysqli_close($con);
?>

