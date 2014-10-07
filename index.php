<?php include('header.php');
$array['E'] =  'Letter E'; 
$array['F'] =  'Letter F'; 
$array['G'] =  'Letter G'; 
$array['selected'] =  'F'; ?>

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Client</th>
			<th>Building</th>
            <th>Defendant</th>
            <th>Type of Case</th>
            <th>Status</th>
            <th>Notice Expiration</th>
			<th>Complaint Filed</th>
            <th>Complaint Served</th>
            <th>MSC</th>
            <th>Trial</th>
            <th>Eviction</th>
			<th>Settlement</th>
            <th>Tenant Moveout</th>
            <th>Comments</th>			
			<th>ID</th>
        </tr>
    </thead>

    <tbody>

    </tbody>

</table>

<?php
include('databaseconnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM records");
$rowcount = 0;

mysqli_close($con);
?>

<script>
	$(document).ready(function() {
		var oTable = $('#table_id').dataTable( {
			"bProcessing": true,
			//"sDom": 'rt<"top"iflp<"clear">>',
			"sDom": '<"selectMenu"fl>rtip',
			"sAjaxSource": "view.php",
			"aaSorting": [[2, 'asc']],
			//"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			//"sScrollX": "100%",
			"fnCreatedRow": function( nRow, aData, iDataIndex ) {
				$(nRow).attr('id', aData['id']);
			},
			
			"aoColumns": [
			{ "mData": "client", "sClass": "client", "bSortable": false },
            { "mData": "building", "sClass": "building" },
            { "mData": "defendant", "sClass": "defendant" },
            { "mData": "type_of_case", "sClass": "type_of_case" },
			{ "mData": "status", "sClass": "status", "bSortable": false},	
            { "mData": "notice_expiration_date", "sClass": "notice_expiration_date" },
            { "mData": "complaint_filed", "sClass": "complaint_filed" },
            { "mData": "complaint_served", "sClass": "complaint_served" },
            { "mData": "msc_date", "sClass": "msc_date" },
            { "mData": "trial_date", "sClass": "trial_date" },
            { "mData": "eviction_date", "sClass": "eviction_date" },
            { "mData": "settlement_expiration_date", "sClass": "settlement_expiration_date" },
            { "mData": "tenant_moveout_date", "sClass": "tenant_moveout_date" },
            { "mData": "comments", "sClass": "comments"  },
            { "mData": "id", "bVisible": false}			
			],
			"fnDrawCallback": function () {
				$('#table_id tbody tr td').editable( 'editentry.php', {
					"submitdata" : function() {return {id: $(this).parent().attr('id'), column: $(this).attr('class').split(' ')[0]}},
					"tooltip" : "Edit Field",
					"placeholder" : "",
					"callback": function( sValue, y ) {
						/* Redraw the table from the new data on the server */
						//oTable.fnReloadAjax('view.php');
						oTable.fnDraw();
					},
					"height": "14px"
				} );

			}
		} ).columnFilter({
				//sPlaceHolder: 'head:before',
				sPlaceHolder: 'head:after',
				aoColumns: [
					{type: 'select', values: ['JSC','Conard','Caritas']},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'select', values: ['Open','Closed'], selected: 'Open'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},
					{type: 'null'},

				]
			
			});
		$('.dataTables_filter label input').focus();
	} );
</script>

<style>
	tr td:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
	tr td:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px; }
	tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
	tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px; }	
	div.top {border-radius: 10px;}
	thead {background-color: #2a6eab; color: white;}
	
</style>