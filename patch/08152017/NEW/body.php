<article class="wrapper">
	
	<aside class="sidebar">
		<ul class="sidebar-nav">
			<li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<?php
				if( $user_role[1]['read']  == 1){
					echo '<li><a href="#alert" data-toggle="tab"><i class="fa fa-exclamation-circle"></i> <span>Alert</span></a></li>';
				}
				if( $user_role[2]['read']  == 1){
					echo '<li><a href="#template" data-toggle="tab"><i class="fa fa-envelope"></i> <span>Recipient Template</span></a></li>';
				}
				if( $account_type  == 2){
					echo '<li><a href="#configuration" data-toggle="tab"><i class="fa fa-cogs"></i> <span>Configuration</span></a></li>';
				}
			?>	
		</ul>
	</aside>
	
	<section class="main">
		<section class="tab-content">
			
			<section class="tab-pane active fade in content" id="dashboard">
				<div class="row">
					<legend><i class="fa fa-dashboard"></i> Dashboard</legend>
					
					<?php
						if( $user_role[1]['read']  == 1 ){
							echo '	<div class="col-xs-12 col-sm-6 col-lg-4">
										<a href="#" id="a_line_stop_alert">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
													  <div class="col-xs-2">
														<i class="fa fa-exclamation-circle fa-5x"></i>
													  </div>
													  <div class="col-xs-10 text-right">
														<p class="announcement-heading"></p>
														<p class="announcement-text fa-2x"> <b>Line Stop Alert</b></p>
													  </div>
													</div>
												 </div>
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  On-going Alert
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											</div>
										</a>
									</div>';
						}
						if( $user_role[2]['read']  == 1 ){
							echo '	<div class="col-xs-12 col-sm-6 col-lg-4">
										<a href="#" id="a_email_recipient_template">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
													  <div class="col-xs-2">
														<i class="fa fa-envelope-o fa-5x"></i>
													  </div>
													  <div class="col-xs-10 text-right">
														<p class="announcement-heading"></p>
														<p class="announcement-text fa-2x"> <b>Recipient Template</b></p>
													  </div>
													</div>
												 </div>
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  Recipient Template
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											</div>
										</a>
									</div>';
						}
						if( $account_type == 2 ){
							echo'	<div class="col-xs-12 col-sm-6 col-lg-4">
										<a href="#" id="a_configuration">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
													  <div class="col-xs-2">
														<i class="fa fa-cogs fa-5x"></i>
													  </div>
													  <div class="col-xs-10 text-right">
														<p class="announcement-heading"></p>
														<p class="announcement-text fa-2x"> <b>Configuration</b></p>
													  </div>
													</div>
												 </div>
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  Configuration
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											</div>
										</a>
									</div>';
						}
					?>
					
				</div>
			</section>
	   
			<section class="tab-pane fade" id="alert">
				  <section class="content">
					  <legend><span class="fa fa-exclamation-circle"></span> Line Stop Alert</legend>
					  <div class="row">
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading"><span class="fa fa-exclamation-circle fa-lg"></span> Line Stop Alert</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-lg-offset-4 col-lg-1">
											<label class="fa fa-lg">Legend</label>
										</div>
										<div class="col-sm-12 col-lg-2 btn-group">
										  <button class="btn btn-default" disabled type="button"> </button>
										  <button class="btn btn-default" type="button" id="btn_load_all">ALL ALERT</button>
										</div>
										<div class="col-sm-12 col-lg-3 btn-group">
										  <button class="btn btn-danger" disabled type="button"> </button>
										  <button class="btn btn-default" type="button" id="btn_load_ongoing">ON-GOING ALERT</button>
										</div>
										<div class="col-sm-12 col-lg-2 btn-group">
										  <button class="btn btn-success" disabled type="button"> </button>
										  <button class="btn btn-default" type="button" id="btn_load_closed">CLOSED ALERT</button>
										</div>
									</div><br />
									<div class="row">
										<div class="col-sm-12">
											<?php
												if( $user_role[1]['create']  == 1 ){
													echo '<button type="button" class="btn btn-primary fa fa-plus pull-right" id="btn_new_alert"> New Alert</button><br /><br />';
												}
											?>
										</div>
									</div>
									<table class="table table-bordered table-condensed table-hover" id="tbl_alert">
										<thead>
											<th>Status</th>
											<th>Line Affected</th>
											<th>Machine Affected</th>
											<th>Model</th>
											<th>Problem</th>
											<th>Date Started</th>
											<th>Time Started</th>
											<th>Target Resumption</th>
											<th>Disposition</th>
											<th><span class="fa fa-cogs"></span></th>
										</thead>
									</table>
								</div>
							</div>
						</div>
					  </div>
				  </section>
			   </section>
	   
			 <section class="tab-pane fade" id="template">
					<section class="content">
					  <legend><span class="fa fa-envelope"></span> Template Recipients</legend>
					  <div class="row">
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading"><span class="fa fa-exclamation-circle fa-lg"></span> Template Management</div>
								<div class="panel-body" style="overflow:auto;">
									<div class="row">
										<div class="col-sm-12">
											<?php
												if( $user_role[2]['create']  == 1 ){
													echo '<button type="button" class="btn btn-primary fa fa-plus pull-right" id="btn_new_template"> New Template</button><br /><br />';
												}
											?>
										</div>
									</div>
									<table class="table table-bordered table-condensed table-hover" id="tbl_recipient_template">
										<thead>
											<tr>
												<th>Template</th>
												<th>Recipients To</th>
												<th>Recipients CC</th>
												<th><i class="fa fa-cogs"></i></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td rowspan="2">Template 1</td>
												<td><span class="badge">marlope@pricon.ph</span>,<span class="badge">ronfern@pricon.ph</span></td>
												<td><span class="badge">marvald@pricon.ph</span>,<span class="badge">jangeco@pricon.ph</span></td>
												<td><button class="btn btn-default fa fa-edit"> Edit</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					  </div>
					</section>
			   </section>
	   
			<section class="tab-pane fade in" id="configuration"><!-- Start Configuration -->
			   <nav class="subbar">
					<ul class="nav nav-tabs">
						<!--<li class="active"><a href="#access" data-toggle="tab"><i class="fa fa-code"></i> <span>System</span></a></li>-->
						<li><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <span>Roles</span></a></li>
					</ul>
				</nav>
				
				<section class="tab-content content">
	
					<section class="tab-pane active fade in" id="roles">
						
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-9">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i class="fa fa-users fa-lg"></i> Users CRUD
									</div>
									<div class="panel-body">
										<?php
											if($account_type == 2){
												echo '<table class="table table-hover table-striped table-bordered table-condensed" id="tbl_user_main">
														<thead>
															<tr>
																<th>Fullname</th>
																<th>Position</th>
																<th>Department</th>
																<th>Section</th>
																<th>Division</th>
																<th>Username</th>
																<th><i class="fa fa-cogs"></i></th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>';
											}
										?>
									</div>
								</div>
							</div>
							
							<div class="hidden-xs col-sm-4 col-md-3">
								<div class="panel panel-info">
									<div class="panel-heading">
										<i class="fa fa-book fa-lg"></i> Didn't Find Employee from list?
									</div>
									<div class="panel-body">
										<p>To add employee to the CRUD list, please assign the system to this employee using Rapid.</p>
									</div>
								</div>
								
							</div>
					   </div>
					</section>
					
				</section>
				
		   </section> <!-- End Configuration -->
		   
		</section>
	</section>

</article>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_alert">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-bell-o"></i> New Alert</h4>
      </div>
      <div class="modal-body">
		<form id="frm_new_alert">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Line, Machine, Model Information</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Line Affected: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_line_affected" name="line_affected" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Machine Affected: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_machine_affected" name="machine_affected" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Model: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_model" name="model" required>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Problem Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Problem: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" class="form-control" id="txt_problem" name="problem" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Date Started: </label>
						</div> 
						<div class="col-sm-4">
							<input type="date" class="form-control" class="form-control" id="txt_date_started" name="date_started" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Time Started: </label>
						</div> 
						<div class="col-sm-4">
							<input type="time" class="form-control" id="txt_time_started" name="time_started" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Action Being Done: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_action_being_done" name="action_being_done" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Who: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_who" name="who" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Target Resumption: </label>
						</div> 
						<div class="col-sm-4">
							<input type="time" class="form-control" id="txt_target_resumption" name="target_resumption" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Remarks: </label>
						</div> 
						<div class="col-sm-10">
							<textarea style="width:100%" rows="3" class="form-control" id="txt_alert_remarks" name="alert_remarks"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				
				<div class="panel-heading"><i class="fa fa-envelope"></i> Recipients</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger" style="display:none;" role="alert" id="div_recipients_validation">					
							</div>
						</div>
					</div>
					<!-- 
					Uncomment this portion pagnagbago nnaman isip ng user (by rona). then no changes na sa portion na to :)
					<div class="row">
						<div class="col-sm-12">
							<button type="button" class="btn btn-primary fa fa-users pull-right" id="btn_recipients_template"> Recipients Template</button>
						</div> 
					</div>-->
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">To: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="recipient_to" id="cmb_recipient_to" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_to_display" readonly>
						</div>
					</div>
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="recipient_cc" id="cmb_recipient_cc" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_cc_display" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(per hour) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="1" step="1" max="24" required>
						</div>
					</div>
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-envelope"> Create Alert</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_alert">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-bell-o"></i> Update Alert </h4>
      </div>
      <div class="modal-body">
		<form id="frm_edit_alert">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Line, Machine, Model Information <span class="label label-info" id="spn_status"></span></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Line Affected: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_line_affected" name="line_affected" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Machine Affected: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_machine_affected" name="machine_affected" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Model: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_model" name="model">
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Problem Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Problem: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" class="form-control" id="txt_problem" name="problem" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Date Started: </label>
						</div> 
						<div class="col-sm-4">
							<input type="date" class="form-control" class="form-control" id="txt_date_started" name="date_started" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Time Started: </label>
						</div> 
						<div class="col-sm-4">
							<input type="time" class="form-control" id="txt_time_started" name="time_started" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Action Being Done: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_action_being_done" name="action_being_done" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Who: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_who" name="who" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Target Resumption: </label>
						</div> 
						<div class="col-sm-4">
							<input type="time" class="form-control" id="txt_target_resumption" name="target_resumption" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Remarks: </label>
						</div> 
						<div class="col-sm-10">
							<textarea style="width:100%" rows="3" class="form-control" id="txt_alert_remarks" name="alert_remarks" required></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-calendar-check-o"></i> Closing Alert</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Date Finished: </label>
						</div> 
						<div class="col-sm-4">
							<input type="date" class="form-control" id="txt_date_finished" name="date_finished" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Time Finished: </label>
						</div> 
						<div class="col-sm-4">
							<input type="time" class="form-control" id="txt_time_finished" name="time_finished">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Disposition: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_disposition" name="disposition">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Downtime Duration: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_downtime_duration" name="downtime_duration" readOnly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Remarks: </label>
						</div> 
						<div class="col-sm-10">
							<textarea style="width:100%" rows="3" class="form-control" id="txt_finish_remarks" name="finish_remarks"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-envelope"></i> Recipients</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger" style="display:none;" role="alert" id="div_recipients_validation">					
							</div>
						</div>
					</div>
					<!-- 
					Uncomment this portion pagnagbago nnaman isip ng user (by rona). then no changes na sa portion na to :)
					<div class="row">
						<div class="col-sm-12">
							<button type="button" class="btn btn-primary fa fa-users pull-right" id="btn_recipients_template"> Recipients Template</button>
						</div> 
					</div>-->					
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">To: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="recipient_to" id="cmb_recipient_to_edit">
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_to_display" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="recipient_cc" id="cmb_recipient_cc_edit">
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_cc_display" readonly>
						</div>
					</div>					
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(per hour) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="1" step="1" max="24" required>
						</div>
					</div>
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<?php
				if( $user_role[1]['update']  == 1 ){
					echo '<button type="submit" class="btn btn-primary fa fa-envelope" id="btn_update_alert"> Update Alert</button>';
				}
			?>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" style="z-index:1051"  id="modal_recipients_template">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-users"></i> Recipients Template</h4>
      </div>
      <div class="modal-body">
		<form id="frm_recipients_template">
			<table class="table table-bordered table-condensed" id="tbl_template_recipients">
				<thead>
					<tr>
						<th>Template</th>
						<th>Recipients To</th>
						<th>Recipients CC</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save" id="btn_use_template"> Use Template</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_template">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> New Template</h4>
      </div>
      <div class="modal-body">
		<form id="frm_new_template">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-envelope"></i> Recipients</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger" style="display:none;" role="alert" id="div_recipients_template_validation">					
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Template Name: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_recipients_template" name="recipients_template" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">To: </label>
						</div> 
						<div class="col-sm-10">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="template_to" id="cmb_template_to">
								<option value=''></option>
							</select>
						</div>
					</div>
					<div class="row" style="padding-top:2px;">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="template_cc" id="cmb_template_cc">
								<option value=''></option>
							</select>
						</div>
					</div>
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-envelope"> Create Template</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_template">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Update Template</h4>
      </div>
      <div class="modal-body">
		<form id="frm_edit_template">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-envelope"></i> Recipients</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger" style="display:none;" role="alert" id="div_recipients_template_validation">					
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Template Name: </label>
						</div> 
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txt_recipients_template" name="recipients_template" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">To: </label>
						</div> 
						<div class="col-sm-10">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="template_to_edit" id="cmb_template_to_edit">
								<option value=''></option>
							</select>
						</div>
					</div>
					<div class="row" style="padding-top:2px;">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="template_cc_edit" id="cmb_template_cc_edit">
								<option value=''></option>
							</select>
						</div>
					</div>
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<?php
				if( $user_role[2]['update']  == 1 ){
					echo '<button type="submit" class="btn btn-primary fa fa-envelope" id="btn_update_template"> Update Template</button>';
				}
				if( $user_role[2]['delete']  == 1 ){
					echo '<button type="button" class="btn btn-danger fa fa-envelope" id="btn_delete_template"> Delete Template</button>';
				}
			?>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_system_message">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-question-circle-o"></i> System Confirmation</h4>
      </div>
	  <div class="modal-body">
		<div class="row">
			<div class="col-sm-12" id="">				
				<div class="alert alert-success" role="alert" id="container_message">					
				</div>
			</div>
		</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default fa fa-close" data-dismiss="modal" id="btn_close"> Close</button>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_user_crud">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-edit"></span> Edit User Role</h4>
      </div>
      <div class="modal-body">
		<form id="frm_user_roles">
			<table class="table table-hover table-striped table-bordered" id="tbl_user_crud">
				<thead>
					<tr>
						<th>Module</th>
						<th><input type="checkbox" value="1"> Create</th>
						<th><input type="checkbox" value="2"> Read</th>
						<th><input type="checkbox" value="3"> Update</th>
						<th><input type="checkbox" value="4"> Delete</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
      </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save" id="btn_update_role"> Update Role</button>
			<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal">Close</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	var script_url 	= '';
	var handler 	= './handler/handler.php';
	var username 	= $('#hd_username').val();
	$(document).on("click",".sidebar-toggle",function(){
		$(".wrapper").toggleClass("toggled");
	});
	
	/* **********************************
			Dashboard Page - Start
	***********************************	*/
	$('section#dashboard #a_line_stop_alert').click(function(){ $('.sidebar li a[href="#alert"]').trigger('click'); });
	$('section#dashboard #a_email_recipient_template').click(function(){ $('.sidebar li a[href="#template"]').trigger('click'); });
	$('section#dashboard #a_configuration').click(function(){ $('.sidebar li a[href="#configuration"]').trigger('click'); });
	/* **********************************
			Dashboard Page - End
	***********************************	*/
	
	/* *********************************
			Alert Page - Start
	***********************************	*/
	var dt_tbl_alert = $('#tbl_alert').DataTable({
		"ajax"	: 'server_side_scripts/alert.php?status=ALL',
		"aaSorting"		: [],
		"rowCallback"	: function( row, data, index ) {
			if ( data[0] == "ON-GOING" ) {
				$("td",row).css("background-color","#b30000");
				$("td",row).css("color","#ffffff");
			}
			if ( data[0] == "CLOSED" ) {
				$("td",row).css("background-color","#66ff66");
			}
		}
	});
	
	// $('#frm_new_alert').on('click','#disabled_div',function(){
		// alert("You are not allowed to change recipients");
		// $('input').blur();
		// $('textarea').blur();
		 // $('.chosen-select').removeClass('chosen-container-active');
		// return false;
	// });
	
	$('#btn_new_alert').click(function(){
		
		return_recipients_lists_by_id(13, 'txt_to_display', 'txt_cc_display');
		
		/* 
		Uncomment this portion pagnagbago nnaman isip ng user (by rona). then comment mo yung nsa taas :)
		return_recipients_lists('cmb_recipient_to', function() {
			$('.chosen-select#cmb_recipient_to').chosen({width:"100%", height: "100%"});
			return_recipients_lists('cmb_recipient_cc', function() {
				$('.chosen-select#cmb_recipient_cc').chosen({width:"100%", height: "100%"});					
			});
		}); */
		$('#modal_new_alert').modal('show');
	});
	
	$( '.sidebar .sidebar-nav li a[href=#users]' ).on( 'click', function() {
		script_url = 'js/tqts_functions.js';
		$.getScript( script_url, function( data, textStatus, jqxhr ) {
		  console.log( textStatus ); // display success or fail
		});
	});
	
	$('#frm_new_alert #btn_recipients_template').click(function(){
		return_recipients_template(function() {
			$('#btn_use_template').prop('disabled',true);
			$('#modal_recipients_template').modal("show");
		});
	});
	
	$('.modal').on('hidden.bs.modal', function (e) {
		if($('.modal').hasClass('in')) {
			$('body').addClass('modal-open');
		}    
	});
	
	var to_recipient = '';
	var cc_recipient = '';
	$('#frm_recipients_template tbody').on('click','tr',function(){
		$('#tbl_template_recipients tbody tr').attr('style','');
		$(this).attr('style','background:teal;color:white;');
		to_recipient = $(this).find('td:eq(1)').text();
		cc_recipient = $(this).find('td:eq(2)').text();
		$('#btn_use_template').prop('disabled',false);
	});
	
	$('#frm_recipients_template').submit(function(e){
		e.preventDefault(); 
		$('#modal_recipients_template').modal('hide');
		if($('#modal_new_alert').is(':visible')) {
			var to_display = '';
			$.each(to_recipient.split(','), function(index, to)
			{
				if(to != '') {
				   $('#frm_new_alert #cmb_recipient_to').find('option[value="'+ to +'"]').attr('Selected', 'Selected');
				   $("#frm_new_alert #cmb_recipient_to").trigger('chosen:updated');
				   to_display += to+' ';
				}
			});
			$("#frm_new_alert #txt_to_display").val( to_display );
			var cc_display = '';
			$.each(cc_recipient.split(','), function(index2, cc)
			{
				if(cc != '') {
				   $('#frm_new_alert #cmb_recipient_cc').find('option[value="'+ cc +'"]').attr('Selected', 'Selected');
				   $("#frm_new_alert #cmb_recipient_cc").trigger('chosen:updated');
				    cc_display += cc+' ';
				}
			});
			$("#frm_new_alert #txt_cc_display").val( cc_display );
		} else {
			var to_display = '';
			$.each(to_recipient.split(','), function(index, to)
			{
				if(to != '') {
				   $('#frm_edit_alert #cmb_recipient_to_edit').find('option[value="'+ to +'"]').attr('Selected', 'Selected');
				   $("#frm_edit_alert #cmb_recipient_to_edit").trigger('chosen:updated');   
				   to_display += to+' ';
				}
			});
			$("#frm_edit_alert #txt_to_display").val( to_display );
			var cc_display = '';
			$.each(cc_recipient.split(','), function(index2, cc)
			{
				if(cc != '') {
				   $('#frm_edit_alert #cmb_recipient_cc_edit').find('option[value="'+ cc +'"]').attr('Selected', 'Selected');
				   $("#frm_edit_alert #cmb_recipient_cc_edit").trigger('chosen:updated'); 
				   cc_display += cc+' ';
				}
			});
			$("#frm_edit_alert #txt_cc_display").val( cc_display );
		}
		to_recipient = '';
		cc_recipient = '';
	});
		
	$('#frm_new_alert').submit(function(e){
		e.preventDefault(); 
		var recipient_to = $('#txt_to_display').val();
		var recipient_cc = $('#txt_cc_display').val();
		console.log('to '+JSON.stringify(recipient_to));
		console.log('cc '+JSON.stringify(recipient_cc));
		var serialized_data = $(this).serialize();
		var data = {
			"action" 		: "create_new_alert",
			"recipient_to2"	: recipient_to,
			"recipient_cc2"	: recipient_cc,
			"username"		: username
		} 
		call_ajax_serialize(data, serialized_data, handler, function(result){
			$('#modal_new_alert').modal('hide');
			$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
			$('#modal_system_message').modal();	
			dt_tbl_alert.ajax.reload();
			$('.btn').prop("disabled",false);
			$('#cmb_recipient_to').val('').trigger('chosen:updated');
			$('#cmb_recipient_cc').val('').trigger('chosen:updated');
		});
		
		/* 
		Uncomment this portion pagnagbago nnaman isip ng user :D (by: rona)
		if( $('#frm_new_alert #cmb_recipient_to option:selected').length <= 0 ) {
			$('#frm_new_alert #div_recipients_validation').html('<h4>Please select email recipient.</h4>');
			$('#frm_new_alert #div_recipients_validation').show();
		} else {			
			var recipient_to = [];
			$('#frm_new_alert #cmb_recipient_to :selected').each(function(i, selected) {
				recipient_to[i] = $(selected).val();
			});
			var recipient_cc = [];
			$('#frm_new_alert #cmb_recipient_cc :selected').each(function(i, selected) {
				recipient_cc[i] = $(selected).val();
			});
			$('#frm_new_alert #div_recipients_validation').hide();
			$('.btn').prop("disabled",true);
			console.log('to '+JSON.stringify(recipient_to));
			console.log('cc '+JSON.stringify(recipient_cc));
			var serialized_data = $(this).serialize();
			var data = {
				"action" 		: "create_new_alert",
				"recipient_to2"	: JSON.stringify(recipient_to),
				"recipient_cc2"	: JSON.stringify(recipient_cc),
				"username"		: username
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				$('#modal_new_alert').modal('hide');
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();	
				dt_tbl_alert.ajax.reload();
				$('.btn').prop("disabled",false);
				$('#cmb_recipient_to').val('').trigger('chosen:updated');
				$('#cmb_recipient_cc').val('').trigger('chosen:updated');
			});

		} */
	});
	
	$('#tbl_alert tbody').on('click', '#btn_edit', function() {
		var pkid = $(this).val();
		$('#btn_update_alert').val(pkid);
		return_recipients_lists('cmb_recipient_to_edit', function() {
			$('.chosen-select#cmb_recipient_to_edit').chosen({width:"100%", height: "100%"});
			return_recipients_lists('cmb_recipient_cc_edit', function() {
				$('.chosen-select#cmb_recipient_cc_edit').chosen({width:"100%", height: "100%"});		
				return_alert_recipients_by_fkalert(pkid);				
			});
		});
		return_alert_details_by_id(pkid, function() {			
			$('#modal_edit_alert').modal();
		});
	});

	$('#frm_edit_alert #txt_date_finished').change(function() {
		if($(this).val() == '') {
			$('#frm_edit_alert #txt_time_finished').prop('disabled', true);
			$('#frm_edit_alert #txt_time_finished').attr('required', false);
			$('#frm_edit_alert #txt_disposition').prop('disabled', true);
			$('#frm_edit_alert #txt_disposition').attr('required', false);
			$('#frm_edit_alert #txt_finish_remarks').prop('disabled', true);
		} else {
			$('#frm_edit_alert #txt_time_finished').prop('disabled', false);
			$('#frm_edit_alert #txt_time_finished').attr('required', true);
			$('#frm_edit_alert #txt_disposition').prop('disabled', false);
			$('#frm_edit_alert #txt_disposition').attr('required', true);
			$('#frm_edit_alert #txt_finish_remarks').prop('disabled', false);
		}
	});
	
	$('#frm_edit_alert').submit(function(e){
		e.preventDefault();
		if( $('#frm_edit_alert #cmb_recipient_to_edit option:selected').length <= 0 ) {
			$('#frm_edit_alert #div_recipients_validation').html('<h4>Please select email recipient.</h4>');
			$('#frm_edit_alert #div_recipients_validation').show();
		} else {
			var recipient_to = [];
			$('#frm_edit_alert #cmb_recipient_to_edit :selected').each(function(i, selected) {
				recipient_to[i] = $(selected).val();
			});
			var recipient_cc = [];
			$('#frm_edit_alert #cmb_recipient_cc_edit :selected').each(function(i, selected) {
				recipient_cc[i] = $(selected).val();
			});
			$('#frm_edit_alert #div_recipients_validation').hide();
			$('.btn').prop("disabled",true);
			var serialized_data = $(this).serialize();
			console.log(JSON.stringify(recipient_to));
			var data = {
				"action" 		: "update_line_alert",
				"pkid"			: $('#btn_update_alert').val(),
				"recipient_to2"	: JSON.stringify(recipient_to),
				"recipient_cc2"	: JSON.stringify(recipient_cc),
				"username"		: username
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				$('#modal_edit_alert').modal('hide');
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();	
				dt_tbl_alert.ajax.reload();
				$('.btn').prop("disabled",false);
				$('#cmb_recipient_to_edit').val('').trigger('chosen:updated');
				$('#cmb_recipient_cc_edit').val('').trigger('chosen:updated');
			});

		}
	});
	
	$('#frm_edit_alert #btn_recipients_template').click(function(){
		return_recipients_template(function() {
			$('#btn_use_template').prop('disabled',true);
			$('#modal_recipients_template').modal("show");
		});
	});
	
	$('#btn_load_all').click(function() {
		dt_tbl_alert.ajax.url('server_side_scripts/alert.php?status=ALL').load();
	});
	
	$('#btn_load_ongoing').click(function() {
		dt_tbl_alert.ajax.url('server_side_scripts/alert.php?status=ON-GOING').load();
	});
	
	$('#btn_load_closed').click(function() {
		dt_tbl_alert.ajax.url('server_side_scripts/alert.php?status=CLOSED').load();
	});
	
	function return_recipients_lists(cmb_id, callback) {
		$('#'+cmb_id).empty();
		var data = {
			"action" 		: "get_recipient_lists"
		} 
		call_ajax(data, handler, function(result){
			// $('#'+cmb_id).append( '<option value="">-</option>' );
			$('#'+cmb_id).append( result['html_select'] );
            callback();
		});
	}
	
	function return_recipients_lists_by_id(template_id, txt_to, txt_cc) {
		var data = {
			"action" 		: "return_recipients_template_by_id",
			"pkid"			: template_id
		} 
		call_ajax(data, handler, function(result){
			$('#'+txt_to).val(result['template_to']);
			$('#'+txt_cc).val(result['template_cc']);
		});
	}
	
	function return_recipients_template(callback) {
		$('#tbl_template_recipients tbody').empty();
		var data = {
			"action" 		: "return_recipients_template"
		} 
		call_ajax(data, handler, function(result){
			$('#tbl_template_recipients tbody').append(result['table_body']);
			callback();
		});
	}
	
	function return_alert_details_by_id(pkid, callback) {
		var data = {
			"action" 		: "return_alert_details_by_id",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){
			$('#frm_edit_alert #txt_send_interval').val(result['send_interval']);
			$('#frm_edit_alert #txt_line_affected').val(result['line_affected']);
			$('#frm_edit_alert #txt_machine_affected').val(result['machine_affected']);
			$('#frm_edit_alert #txt_model').val(result['model']);
			$('#frm_edit_alert #txt_problem').val(result['problem']);
			$('#frm_edit_alert #txt_date_started').val(result['date_started']);
			$('#frm_edit_alert #txt_time_started').val(result['time_started']);
			$('#frm_edit_alert #txt_action_being_done').val(result['action_being_done']);
			$('#frm_edit_alert #txt_who').val(result['who']);
			$('#frm_edit_alert #txt_target_resumption').val(result['target_resumption']);
			$('#frm_edit_alert #txt_alert_remarks').val(result['alert_remarks']);
			$('#frm_edit_alert #txt_date_finished').val(result['date_finished']);
			$('#frm_edit_alert #txt_time_finished').val(result['time_finished']);
			$('#frm_edit_alert #txt_disposition').val(result['disposition']);
			$('#frm_edit_alert #txt_finish_remarks').val(result['finish_remarks']);
			$('#frm_edit_alert #txt_downtime_duration').val(result['downtime_duration']);
			if(result['status'] == 'ON-GOING') {
				$('#frm_edit_alert #txt_time_finished').prop('disabled', true);
				$('#frm_edit_alert #txt_disposition').prop('disabled', true);
				$('#frm_edit_alert #txt_finish_remarks').prop('disabled', true);
			} else {
				$('#frm_edit_alert #txt_time_finished').prop('disabled', false);
				$('#frm_edit_alert #txt_disposition').prop('disabled', false);
				$('#frm_edit_alert #txt_finish_remarks').prop('disabled', false);
			}
			if(result['status'] == 'ON-GOING') {
				$('#spn_status').attr('class','label label-danger');
				$('#spn_status').html(result['status']);
				$('#btn_update_alert').show();
			} else {
				$('#spn_status').attr('class','label label-success');
				$('#spn_status').html(result['status']);
				$('#btn_update_alert').hide();
			}
			callback();
		});
	}
	
	function return_alert_recipients_by_fkalert(pkid) {
		var data = {
			"action" 		: "return_alert_recipients_by_fkalert",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){
			$('#cmb_recipient_to_edit').val(result['recipient_to']).trigger('chosen:updated');
			$('#cmb_recipient_cc_edit').val(result['recipient_cc']).trigger('chosen:updated');
			$('#frm_edit_alert #txt_to_display').val(result['recipient_to']);
			$('#frm_edit_alert #txt_cc_display').val(result['recipient_cc']);
		});
	}
	
	/* ***************************
			Alert Page - End
	***************************	*/
	
	/* *********************************
			Template Page - Start
	***********************************	*/
	var dt_tbl_recipient = $('#tbl_recipient_template').DataTable({
		"ajax"	: 'server_side_scripts/recipient_template.php',
		"aaSorting"		: []
	});
	
	$('#btn_new_template').click(function() {
		return_recipients_lists('cmb_template_to', function() {
			$('.chosen-select#cmb_template_to').chosen({width:"100%", height: "100%"});
			return_recipients_lists('cmb_template_cc', function() {
				$('.chosen-select#cmb_template_cc').chosen({width:"100%", height: "100%"});				
			});
		});
		$('#modal_new_template').modal();
	});
	
	$('#frm_new_template').submit(function(e){
		e.preventDefault();
		if( $('#frm_new_template #cmb_template_to option:selected').length <= 0 ) {
			$('#frm_new_template #div_recipients_template_validation').html('<h4>Please select email recipient.</h4>');
			$('#frm_new_template #div_recipients_template_validation').show();
		} else {
			var recipient_to = [];
			$('#frm_new_template #cmb_template_to :selected').each(function(i, selected) {
				recipient_to[i] = $(selected).val();
			});
			var recipient_cc = [];
			$('#frm_new_template #cmb_template_cc :selected').each(function(i, selected) {
				recipient_cc[i] = $(selected).val();
			});
			var serialized_data = $(this).serialize();
			var data = {
				"action" 		: "create_recipients_template",
				"recipient_to"	: JSON.stringify(recipient_to),
				"recipient_cc"	: JSON.stringify(recipient_cc),
				"username"		: username
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				if(result['msg'] == 'Template name already exist!') {
					$('#container_message').attr('class','alert alert-danger');
				} else {
					$('#modal_new_template').modal('hide');
					$('#container_message').attr('class','alert alert-success');
					dt_tbl_recipient.ajax.reload();
				}
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();			
			});
		}
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
	
	$('#frm_edit_template').submit(function(e){
		e.preventDefault();
		if( $('#frm_edit_template #cmb_template_to_edit option:selected').length <= 0 ) {
			$('#frm_edit_template #div_recipients_template_validation').html('<h4>Please select email recipient.</h4>');
			$('#frm_edit_template #div_recipients_template_validation').show();
		} else {
			var recipient_to = [];
			$('#frm_edit_template #cmb_template_to_edit :selected').each(function(i, selected) {
				recipient_to[i] = $(selected).val();
			});
			var recipient_cc = [];
			$('#frm_edit_template #cmb_template_cc_edit :selected').each(function(i, selected) {
				recipient_cc[i] = $(selected).val();
			});
			var serialized_data = $(this).serialize();
			var data = {
				"action" 		: "update_recipients_template",
				"recipient_to"	: JSON.stringify(recipient_to),
				"recipient_cc"	: JSON.stringify(recipient_cc),
				"pkid"			: $('#btn_update_template').val(),
				"username"		: username
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				$('#container_message').attr('class','alert alert-success');
				$('#modal_edit_template').modal('hide');	
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();	
				dt_tbl_recipient.ajax.reload();				
			});
		}
	});

	$('#btn_delete_template').click(function() {
		var data = {
			"action" 		: "delete_recipients_template",
			"pkid"			: $('#btn_update_template').val(),
			"username"		: username
		} 
		call_ajax(data, handler, function(result){
			$('#container_message').attr('class','alert alert-success');
			$('#modal_edit_template').modal('hide');	
			$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
			$('#modal_system_message').modal();	
			dt_tbl_recipient.ajax.reload();				
		});
	});
	
	function return_recipients_template_by_id(pkid,callback) {
		var data = {
			"action" 		: "return_recipients_template_by_id",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){
			$('#frm_edit_template #txt_recipients_template').val(result['recipients_template']);
			$('#cmb_template_to_edit').val(result['template_to']).trigger('chosen:updated');
			$('#cmb_template_cc_edit').val(result['template_cc']).trigger('chosen:updated');
			callback();
		});
	}
	
	/* ***************************
			Template Page - End
	***************************	*/
	
	/* ******************************
			User Roles - Start
	******************************* */
	var handler_user_roles  	= 'handler/handler_user_roles.php';
	var table_main_id 			= '#tbl_user_main';
	var tbl_user_crud_id 		= '#tbl_user_crud';
	var modal_edit_user_crud_id = '#modal_edit_user_crud';
	var table_main_dt 			= $(table_main_id).DataTable({
		ajax	: "server_side_scripts/user_roles_main?fk_system=64"
	});

	$(table_main_id + ' tbody').on('click','tr .fa-edit',function(){
		var user = $(this).closest('tr').find('td:eq(5)').text();
		get_user_role(user);
		$(modal_edit_user_crud_id).data('id',user);
		$(modal_edit_user_crud_id).modal('show');
	});
		
	function get_user_role(user){
		var data = {
			"action"	: "get_user_roles",
			"user"		: user,
			"username"	: username
		}
		data = $.param(data);
		$.ajax({
			type 	: "POST",
			dataType: "JSON",
			data 	: data,
			url 	: handler_user_roles,
			success : function(result){
				$(tbl_user_crud_id + ' tbody').empty();
				$(tbl_user_crud_id + ' tbody').append(result['html']);
			},error	: function(result){
				alert('handler..');
				console.log(result);
			}
		});
	}

	$(tbl_user_crud_id + ' thead th input').click(function(){
		if( $(this).prop('checked') ){
			var col = this.value;
			$(tbl_user_crud_id + ' tbody tr').each(function(){
				$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',true);
			});
		}else{
			var col = this.value;
			$(tbl_user_crud_id + ' tbody tr').each(function(){
				$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',false);
			});
		}
	});

	var frm_user_roles_id = '#frm_user_roles';

	$(frm_user_roles_id).submit(function(e){
		e.preventDefault();
		$('.btn').prop('disabled',true);
		get_role();
	});

	function get_role(){
		var role 			= {};
			role.role_id 	= [];
			role.user 		= [];
			role.fk_module 	= [];
			role.create 	= [];
			role.read 		= [];
			role.update 	= [];
			role.delete 	= [];

		$(tbl_user_crud_id + ' tbody tr').each(function(){
			role.role_id.push( $(this).find('td:eq(1) input').val() );
			role.user.push( $( modal_edit_user_crud_id).data('id') );
			role.fk_module.push( $(this).find('td:eq(0) input[type=hidden]').val() );
			role.create.push( ( $(this).find('td:eq(1) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
			role.read.push( ( $(this).find('td:eq(2) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
			role.update.push( ( $(this).find('td:eq(3) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
			role.delete.push( ( $(this).find('td:eq(4) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		});
		fn_update_role(role);
	}

	function fn_update_role(role){
		var data = {
			"action" 	: "update_role",
			"role"		: role,
			"username"	: username
		}
		data = $.param(data);
		$.ajax({
			type 	: "POST",
			dataType: "JSON",
			data 	: data,
			url 	: handler_user_roles,
			success : function(result){
				alert('User role has been updated!');
				$('.modal').modal('hide');
				$('.btn').prop('disabled',false);
			},error	: function(result){
				alert('handler..');
				console.log(result);
			}
		});
	}
	/* ******************************
			User Roles - End
	******************************* */
	
	// $('.sidebar li a[href="#template"]').trigger('click');
</script>