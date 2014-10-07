<?php
include('list.php'); 

$building = $_GET['building'];
  
$result = mysqli_query($con,"SELECT * FROM records WHERE building = '$building' and client='John Stewart Company'");
$rowcount = 0;

echo "<h1>$building</h1>";
echo "<table id='resultTable'>
<thead>
<tr>

<th>Defendant</th>
<th>Type of Case</th>
<th class='dateColumn'>Notice Expiration Date</th>
<th class='dateColumn'>Complaint Filed</th>
<th class='dateColumn'>Complaint Served</th>
<th class='dateColumn'>MSC Date</th>
<th class='dateColumn'>Trial Date</th>
<th class='dateColumn'>Eviction Date</th>
<th class='dateColumn'>Settlement Expiration Date</th>
<th class='dateColumn'>Tenant Moveout Date</th>
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
}
echo "</table>";

mysqli_close($con);
?>
