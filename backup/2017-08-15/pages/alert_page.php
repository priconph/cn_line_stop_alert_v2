<?php
require_once('libraries/includes.php');
?>

<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">Alert Monitoring</div>
		<div class="panel-body" style="overflow:auto;">
			<table class="table table-condensed table-bordered table-hover" id="tbl_alert">
				<thead>
					<th>Line Affected</th>
					<th>Machine Affected</th>
					<th>Status</th>
					<th>Date Time Last Sent</th>
					<th>Send Interval </th>
					<th>Number of Times Sent</th>
					<th>Interval Passed</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<?php
				$date_today = date('Y-m-d H:i:s');
				echo date('Y-m-d H:i:s', strtotime($date_today.'+1 hours'));
			?>
		</div>
	</div>
</div>


<script>
var handler = 'handler/handler.php';

fn_get_on_going_alerts();
setInterval(function(){
	fn_get_on_going_alerts();
},60000);

function fn_get_on_going_alerts(){
	var data = {
		"action"	: "get_ongoing_alert"
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			console.log(result);
			$('#tbl_alert tbody').empty();
			$('#tbl_alert tbody').append(result['html']);
		},error : function(result){
			console.log(result);
		}
	});
}
</script>