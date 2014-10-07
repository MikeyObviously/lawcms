<?php include('header.php'); ?>

<div style="margin: 0 auto; width: 800px;">

<form action="insert.php" method="post" id="addForm">
<label for="client">Client</label> <select required name="client" id="client">
	<option value="">Please select</option>
	<option value="Caritas">Caritas</option>
	<option value="Conard">Conard</option>
	<option value="John Stewart Company">John Stewart Company</option>
</select>
<label for="building">Building</label> <input type="text" name="building" id="building">
<label for="defendant">Defendant</label> <input type="text" name="defendant" id="defendant">
<label for="type_of_case">Type of Case</label> <input type="text" name="type_of_case" id="type_of_case">
<label for="notice_expiration_date">Notice Expiration Date</label> <input type="date" name="notice_expiration_date" id="notice_expiration_date">
<label for="complaint_filed">Complaint Filed</label> <input type="date" name="complaint_filed" id="complaint_filed">
<label for="complaint_served">Complaint Served</label> <input type="date" name="complaint_served" id="complaint_served">
<label for="msc_date">MSC Date</label> <input type="date" name="msc_date" id="msc_date">
<label for="trial_date">Trial Date</label> <input type="date" name="trial_date" id="trial_date">
<label for="eviction_date">Eviction Date</label> <input type="date" name="eviction_date" id="eviction_date">
<label for="settlement_expiration_date">Settlement Expiration Date</label> <input type="date" name="settlement_expiration_date" id="settlement_expiration_date">
<label for="tenant_moveout_date">Tenant Moveout Date</label> <input type="date" name="tenant_moveout_date" id="tenant_moveout_date">
<label for="comments">Comments</label> <textarea cols="60" rows="8" name="comments" id="comments"></textarea>
<label for="submit">&nbsp;</label><input type="submit" value="Add New Entry">
</form>

</div>

<script type="text/javascript">

	
$(function() {

	$("#building").autocomplete({
		source: "autocomplete.php",
		minLength: 2
	});				
	
});
</script>

</body>
</html>