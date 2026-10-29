<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><span class="fa fa-exclamation-circle fa-lg"></span> Line Stop Alert <a href="" class="pull-right" target="_blank" rel="noopener noreferrer" title="Re-open (no session time-out)"><i class="fa fa-external-link btn-primary" aria-hidden="true"></i></a></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12 col-lg-offset-1 col-lg-1">
						<label class="fa fa-lg">Legends</label>
					</div>
					<div class="col-sm-12 col-lg-2 btn-group">
					<button class="btn btn-default" disabled type="button">�</button>
					<button class="btn btn-default" type="button" id="btn_load_all">ALL ALERT</button>
					</div>
					<div class="col-sm-12 col-lg-3 btn-group">
					<button class="btn" style="background-color: #AA4A44" disabled type="button">�</button>
					<button class="btn btn-default" type="button" id="btn_load_ongoing">ON-GOING ALERT</button>
					</div>
					<div class="col-sm-12 col-lg-3 btn-group">
					<button class="btn btn-success" disabled type="button">�</button>
					<button class="btn btn-default" type="button" id="btn_load_closed">CLOSED ALERT</button>
					</div>
					<div class="col-sm-12 col-lg-2 btn-group">
					<button class="btn" style="background-color: #FF0000" disabled type="button">�</button>
					<button class="btn btn-default" type="button" id="btn_load_red_alert">RED ALERT</button>
					</div>
				</div><br />
				<table class="table table-bordered table-condensed table-hover" id="tbl_alert_records">
					<thead>
						<th>Line Indication</th>
						<th>Product Line</th>
						<th>Model</th>
						<th>Process Station</th>
						<th>Problem</th>
						<th>Date & TimeStarted</th>
						<!-- <th>Time Started</th> -->
						<th>Target Resumption</th>
						<th>No. of Affected Manpower</th>
						<!-- <th>Output per Hour</th> -->
						<th>Affected Shipment Date</th>
						<!-- <th>Affected Shipment QTY</th> -->
						<th>Disposition</th>
						<th>Status</th>
						<!-- <th><span class="fa fa-cogs"></span></th> -->
					</thead>
				</table>
			</div>
		</div>
	</div>
  </div>
  
  <script>
	var dt_tbl_alert_records = $('#tbl_alert_records').DataTable({
		"ajax"	: 'server_side_scripts/kiosk_alert.php?status=ALL',
		"aaSorting"		: [],
		"pageLength": 25,
		"rowCallback"	: function( row, data, index ) {
			if ( data[10] == "ON-GOING" && data[0] != "RED-ALERT") {
				$("td",row).css("background-color","#AA4A44");
				$("td",row).css("color","#ffffff");
				$('td:eq(0)', row).html('LINE STOP');
			}
			if ( data[10] == "CLOSED" ) {
				$("td",row).css("background-color","#66ff66");
				$('td:eq(0)', row).html('CLOSED');
			}
			if ( data[0] == "RED-ALERT" ) {
				$("td",row).css("background-color","#FF0000");
				$("td",row).css("color","#ffffff");
			}
		}
	});
	
	window.setInterval(function(){
	  /* load alert every 5 second */
	  dt_tbl_alert_records.ajax.reload(null, false);
	}, 5000);
	
	$('#btn_load_all').click(function() {
		dt_tbl_alert_records.ajax.url('server_side_scripts/kiosk_alert.php?status=ALL').load();
	});
	
	$('#btn_load_ongoing').click(function() {
		dt_tbl_alert_records.ajax.url('server_side_scripts/kiosk_alert.php?status=ON-GOING').load();
	});
	
	$('#btn_load_closed').click(function() {
		dt_tbl_alert_records.ajax.url('server_side_scripts/kiosk_alert.php?status=CLOSED').load();
	});

	$('#btn_load_red_alert').click(function() {
		dt_tbl_alert_records.ajax.url('server_side_scripts/kiosk_alert.php?status=RED-ALERT').load();
	});
	
	$('#tbl_recipient_template tbody').on('click', '#btn_edit', function() {
		var pkid = $(this).val();
		$('#btn_update_template').val(pkid);
		return_recipients_lists('cmb_template_to_edit', function() {
			$('.chosen-select#cmb_template_to_edit').chosen({width:"100%", height: "100%"});
			return_recipients_lists('cmb_template_cc_edit', function() {
				$('.chosen-select#cmb_template_cc_edit').chosen({width:"100%", height: "100%"});
				return_recipients_template_by_id(pkid,function() {
					$('#modal_edit_template').modal();
				});				
			});
		});
	});
	
	</script>