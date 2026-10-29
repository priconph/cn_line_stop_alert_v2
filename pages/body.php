<article class="wrapper">
	
	<aside class="sidebar">
		<ul class="sidebar-nav">
			<li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<?php
				if( $user_role[1]['read']  == 1 || $user_role[3]['read']  == 1){
					echo '<li><a href="#alert" data-toggle="tab"><i class="fa fa-exclamation-circle"></i> <span>Alert</span></a></li>';
				}
				if( $user_role[2]['read']  == 1){
					echo '<li><a href="#template" data-toggle="tab"><i class="fa fa-envelope"></i> <span>Recipient Template</span></a></li>';
				}
				// if( $user_role[3]['read']  == 1){
				// 	echo '<li><a href="#add_dashboard" data-toggle="tab"><i class="fa fa-bar-chart"></i> <span>Add Dashboard</span></a></li>';
				// }
				if( $user_role[4]['read']  == 1){
					echo '<li><a href="#product_lines" data-toggle="tab"><i class="fa fa-microchip"></i> <span>Product Lines & Models</span></a></li>';
				}
				if( $account_type  == 2){
					echo '<li><a href="#configuration" data-toggle="tab"><i class="fa fa-users"></i> <span>Configuration</span></a></li>';
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
						if( $user_role[1]['read']  == 1 || $user_role[3]['read']  == 1){
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
						// ADD
						// if( $user_role[3]['read']  == 1 ){
						// 	echo '	<div class="col-xs-12 col-sm-6 col-lg-4">
						// 				<a href="#" id="a_add_dashboard">
						// 					<div class="panel panel-info">
						// 						<div class="panel-heading">
						// 							<div class="row">
						// 							  <div class="col-xs-2">
						// 								<i class="fa fa-bar-chart fa-5x"></i>
						// 							  </div>
						// 							  <div class="col-xs-10 text-right">
						// 								<p class="announcement-heading"></p>
						// 								<p class="announcement-text fa-2x"> <b>Add Dashboard</b></p>
						// 							  </div>
						// 							</div>
						// 						 </div>
						// 						<div class="panel-footer announcement-bottom">
						// 						  <div class="row">
						// 							<div class="col-xs-6">
						// 							  Add dashboard
						// 							</div>
						// 							<div class="col-xs-6 text-right">
						// 							  <i class="fa fa-arrow-circle-right"></i>
						// 							</div>
						// 						  </div>
						// 						</div>
						// 					</div>
						// 				</a>
						// 			</div>';
						// }
						if( $user_role[4]['read']  == 1 ){
							echo '	<div class="col-xs-12 col-sm-6 col-lg-4">
										<a href="#" id="a_product_lines">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
													  <div class="col-xs-2">
														<i class="fa fa-microchip fa-5x"></i>
													  </div>
													  <div class="col-xs-10 text-right">
														<p class="announcement-heading"></p>
														<p class="announcement-text fa-2x"> <b>Product Lines & Models</b></p>
													  </div>
													</div>
												 </div>
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  Add dashboard
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
						// ADD
						if( $account_type == 2 ){
							echo'	<div class="col-xs-12 col-sm-6 col-lg-4">
										<a href="#" id="a_configuration">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
													  <div class="col-xs-2">
														<i class="fa fa-users fa-5x"></i>
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
								<div class="panel-heading">
									<ul class="nav nav-tabs">
										<?php
										if( $user_role[1]['read']  == 1 ){
										echo '<li class="nav-item active">
										<a class="nav-link" id="line_stop-tab" data-toggle="tab" href="#line_stop" role="tab" aria-controls="line_stop" aria-selected="false"> Line Stop Alert</a>
										</li>';
										}
										?>
										<?php
										if( $user_role[3]['read']  == 1 ){
										echo '<li class="nav-item">
											<a class="nav-link" id="line_status-tab" data-toggle="tab" href="#line_status" role="tab" aria-controls="line_status" aria-selected="false"> Line Downtime Status</a>
										</li>';
										}
										?>
									</ul>
								</div>

							<div class="tab-content" id="myTabContent">

								<div class="tab-pane active" id="line_stop" role="tabpanel" aria-labelledby="line_stop-tab">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-lg-1">
												<label class="fa fa-lg"><strong>Legends</strong></label>
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
											<div class="col-sm-12 col-lg-2 pull-right">
												<?php
													if( $user_role[3]['create']  == 1 ){
														echo '<button type="button" class="btn btn-success pull-right" id="btn_export_excel_PER"> Export PER Report</button><br /><br /><br />';
													}
												?>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<?php
													if( $user_role[1]['create']  == 1 ){
														echo '<button type="button" class="btn btn-primary fa fa-plus pull-right" id="btn_new_alert"> New Alert</button><br /><br /><br />';
													}
												?>
											</div>	
										</div>
										<table class="table table-bordered table-condensed table-hover" id="tbl_alert">
											<thead bgcolor="#D4F1F4">
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
												<th><span class="fa fa-cogs"></span></th>
											</thead>
										</table>
									</div>
								</div><!-- line_stop end-->
								
								
								<div class="tab-pane fade" id="line_status" role="tabpanel" aria-labelledby="line_status-tab">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-9" style="border-style: solid; border-width: thin; padding: 10px;">
												<div class="row">
													<div class="col-sm-10 col-lg-4">
														<label class="fa fa-lg"><strong>Legends:</strong></label>
														<button class="btn btn-default btn-sm" disabled type="button">�</button>
														<button class="btn btn-sm" type="button" id="btn_status_load_all">ALL ALERT</button>
													</div>
												</div>
												<br>
												<!-- 1st row -->
												<div class="row">
													<!-- <div class="col-sm-2 btn-group">
														<button class="btn btn-default btn-sm" disabled type="button">�</button>
														<button class="btn btn-sm" type="button" id="btn_status_load_all">ALL ALERT</button>
													</div> -->
													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-success btn-sm" disabled type="button">P</button>
														<button class="btn btn-sm" type="button" id="btn_status_load_closed">MASS PRODUCTION</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #FFC000" disabled type="button">Q</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_quality">QC QUALIFICATION</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #AEAAAA" disabled type="button">&nbsp;&nbsp;&nbsp;</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_nosched">NO-SCHEDULE</button>
													</div>
												</div>
												<!-- 2nd row -->
												<div class="row">
													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #FF0000" disabled type="button">M</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_machine">MACHINE DOWNTIME</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #CC00FF" disabled type="button">P</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_parameter">PARAMETER</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #E7E6E6 " disabled type="button">&nbsp;&nbsp;&nbsp;</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_waiting">WAITING</button>
													</div>
												</div>
												<!-- 3rd row -->
												<div class="row">
													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #FFFF00" disabled type="button">S</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_changeover">CHANGEOVER</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #00B0F0" disabled type="button">R</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_material">MATERIAL ISSUE</button>
													</div>

													<div class="col-sm-3 col-md-4 btn-group">
														<button class="btn btn-sm" style="background-color: #99CCFF" disabled type="button">&nbsp;&nbsp;&nbsp;</button>
														<button	button class="btn btn-sm" type="button" id="btn_status_load_others">OTHERS</button>
													</div>
												</div>
											</div>
											
											<div class="col-sm-3">

												<div class="row">
													<br><br><br><br><br><br>
														<?php
															if( $user_role[3]['create']  == 1 ){
																echo '<button type="button" class="btn btn-success pull-right" id="btn_export_excel_PLM" style="margin-top:5px;">Export PLM Report</button>';
															}
														?>
												</div>
											</div>
										</div>
										<br>

										<table class="table table-bordered table-condensed table-hover" id="tbl_add_dashboard">
											<thead bgcolor="#D4F1F4">
												<th>Status</th>
												<th>Downtime Status</th>
												<th>Product Line</th>
												<th>Line No.</th>	
												<th>Area</th>
												<th>Person-in-charge</th>
											</thead>
										</table>	
									</div>
								</div><!-- line_status end-->
							</div><!-- myTabContent end-->
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
										<thead bgcolor="#D4F1F4">
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

			   <!-- new -->
			   <section class="tab-pane fade" id="product_lines">
			   <section class="content">
					  <legend><span class="fa fa-microchip"></span> Product Lines & Models</legend>
					  <div class="row">
						<div class="col-sm-12">
							<!-- <div class="panel panel-primary"> -->
								<div class="panel-heading">
									<ul class="nav nav-tabs">
										<li class="nav-item active">
										<a class="nav-link" id="prod_lines-tab" data-toggle="tab" href="#prod_lines" role="tab" aria-controls="prod_lines" aria-selected="false" style="color: black;">Production Lines</a>
										</li>

										<li class="nav-item">
										<a class="nav-link" id="models-tab" data-toggle="tab" href="#models" role="tab" aria-controls="models" aria-selected="false" style="color: black;">Models</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link" id="equipments-tab" data-toggle="tab" href="#equipments" role="tab" aria-controls="equipments" aria-selected="false">Report Generation</a>
										</li> -->
									</ul>
								</div>

								<div class="tab-content" id="myTabContent">

									<div class="tab-pane active" id="prod_lines" role="tabpanel" aria-labelledby="prod_lines-tab">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12">
													<?php
														if( $user_role[4]['create']  == 1 ){
															echo '<button type="button" class="btn btn-primary fa fa-plus pull-right" id="btn_new_prod_line"> New Production Line</button><br /><br />';
														}	
													?>
												</div>
											</div>
											<table class="table table-bordered table-condensed table-hover" id="tbl_prod_lines">
												<thead bgcolor="#D4F1F4">
													<!-- <th>Status</th> -->
													<!-- <th>Logdel</th> -->
													<th>Product Line</th>
													<th>Line No.</th>
													<th>Area</th>
													<th>Category</th>
													<th>SAT</th>
													<th>Production_type</th>
													<th>Person-in-charge</th>
													<th><span class="fa fa-cogs"></span></th>
												</thead>
											</table>
										</div>
									</div>

									<div class="tab-pane" id="models" role="tabpanel" aria-labelledby="models-tab">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12">
													<?php
														if( $user_role[5]['create']  == 1 ){
															echo '<button type="button" class="btn btn-primary fa fa-plus pull-right" id="btn_new_model"> New Model</button><br /><br />';
														}	
													?>
												</div>
											</div>
											<table class="table table-bordered table-condensed table-hover" id="tbl_models">
												<thead bgcolor="#D4F1F4">
													<th>Product Line</th>
													<th>Model</th>
													<th><span class="fa fa-cogs"></span></th>
												</thead>
											</table>
										</div>
									</div>
									
									<!-- <div class="tab-pane fade" id="equipments" role="tabpanel" aria-labelledby="equipments-tab">
										<div class="panel-body">
												<div class="row">
													<div class="col-sm-12">
														<button	type="button" class="btn btn-success" id="btn_export_excel_PLM" style="margin-top:5px;"> Export PLM</button>
													</div>

													<div class="col-sm-12">
														<button	type="button" class="btn btn-success" id="btn_export_excel_PER" style="margin-top:5px;"> Export PER Report</button>
													</div>
												</div>
												
											</div> -->
										
											<!-- <nav class="subbar">
												<ul class="nav nav-tabs">
													<li class="active"><a href="#access" data-toggle="tab"><i class="fa fa-code"></i> <span>System</span></a></li>//comment
													<li><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <span>Roles</span></a></li>
												</ul>
											</nav> -->
											
											<!-- <section class="tab-content content"> -->
												
											<!-- </section> -->
									<!-- </div> -->
								</div>
							<!-- </div> -->
						</div>
					  </div>
				  </section>
			   </section>
	           <!-- new -->

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
							<label class="fa fa-lg">Product Line: </label>
						</div> 
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
							<select data-placeholder="Select Product Line" class="chosen-select" name="line_affected" id="txt_line_affected">
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Process Affected: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_process_affected" name="process_affected" required>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Model: </label>
						</div>
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_model" name="model" required> -->
							<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
							<select data-placeholder="Please Select Model" class="chosen-select" style="width: 100%; height: 4%" name="model" id="txt_model">
								<!-- <option value=''></option> -->
							</select>
						</div>

						<div class="col-sm-2">
							<label class="fa fa-lg">Machine Affected: </label>
						</div> 
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_machine_affected" name="machine_affected" required> -->
							<select data-placeholder="Select Machine Affected" class="chosen-select" name="machine_affected" id="txt_machine_affected">
								<option value=''></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Downtime Status: </label>
						</div> 
						<div class="col-sm-4">
							<select data-placeholder="Select Product Line" class="chosen-select" name="error_category" id="txt_error_category">
								<option style="display:none" value='N/A' selected disabled>Select Downtime Status</option>
								<option value='MACHINE'>Machine Downtime</option>
								<option value='CHANGEOVER'>Changeover</option>
								<option value='QUALITY'>QC Qualification</option>
								<option value='PARAMETER'>Parameter Adjustment</option>
								<option value='MATERIAL'>Material Issue</option>
								<option value='NO-SCHED'>No Schedule</option>
								<option value='WAITING'>Waiting</option>
								<option value='OTHERS'>Others</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="fa fa-lg"><strong>RED ALERT INDICATOR:</strong></label>
						</div>
						<div class="col-sm-3">
							<input type="hidden" name="red_alert" value="" />
							<input type="checkbox" id="txt_red-alert" name="red_alert" value="RED-ALERT">
							<label for="txt_red-alert">RED ALERT? (Y/N)</label>
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
			<!-- ADD INFO -->
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Affected by the Problem</div>
				<div class="panel-body">
					<!-- dito -->
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">No. of Manpower:</label>
						</div> 
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_no_of_manpower" name="no_of_manpower" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Output per Hour:</label>
						</div> 
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_out_per_hour" name="out_per_hour" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Shipment Date:</label>
						</div> 
						<div class="col-sm-4">
							<input type="date" class="form-control" class="form-control" id="txt_afctd_shipment_date" name="afctd_shipment_date" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Shipment Quantity:</label>
						</div> 
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_afctd_shipment_qty" name="afctd_shipment_qty" required>
						</div>
					</div>
				</div>
			</div>
			<!-- ADD INFO END-->
			<!-- primary start -->
			<div class="panel panel-primary">
				
				<div class="panel-heading"><i class="fa fa-envelope"></i> Primary Recipients(Hourly)</div>
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
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="primary_recipient_to" id="primary_cmb_recipient_to" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="primary_txt_to_display" readonly>
						</div>
					</div>
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="primary_recipient_cc" id="primary_cmb_recipient_cc" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="primary_txt_cc_display" readonly>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(per hour) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="1" step="1" max="24" required>
						</div>
					</div> -->
				</div>
			</div>
			<!-- primary end -->
			<!-- secondary start -->
			<div class="panel panel-primary">
				
				<div class="panel-heading"><i class="fa fa-envelope"></i> Secondary Recipients</div>
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
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="secondary_recipient_to" id="secondary_cmb_recipient_to" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="secondary_txt_to_display" readonly>
						</div>
					</div>
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="secondary_recipient_cc" id="secondary_cmb_recipient_cc" readonly>
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="secondary_txt_cc_display" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(hourly) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="2" step="1" max="24" required>
						</div>
					</div>
				</div>
			</div>
			<!-- secondary end -->
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
							<label class="fa fa-lg">Product Line: </label>
						</div>
						<!-- <div class="col-sm-2 popup" onclick="myFunction()">
							<input type="text" class="form-control" id="txt_line_affected" readonly>
							<span class="popuptext" id="myPopup">Current Line Affected!</span>
						</div> -->

						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
							<select data-placeholder="Select Product Line" class="chosen-select" name="line_affected" id="edit_line_affected">
								<option value=''></option>
							</select>
						</div>

						<div class="col-sm-2">
							<label class="fa fa-lg">Process Affected: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="edit_process_affected" name="process_affected" required>
						</div>

					</div>
					<!-- <hr style="height:1px;border:none;color:#333;background-color:#333;"> -->
					<div class="row">
					<div class="col-sm-2">
							<label class="fa fa-lg">Model: </label>
						</div>
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
							<select data-placeholder="Select Model" class="chosen-select" name="model" id="edit_model">
								<option value=''></option>
							</select>
						</div>
						<!-- <div class="col-sm-4">
							<input type="text" class="form-control" id="txt_model" name="model">
						</div> -->

						<div class="col-sm-2">
							<label class="fa fa-lg">Machine Affected: </label>
						</div> 
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_machine_affected" name="machine_affected" required> -->
							<select data-placeholder="Select Machine Line" class="chosen-select" name="machine_affected" id="edit_machine_affected">
								<option value=''></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Downtime Status: </label>
						</div> 
						<div class="col-sm-4">
							<select data-placeholder="Select Product Line" class="chosen-select" name="error_category" id="txt_error_category">
								<option value='' selected disabled>Select Downtime Status</option>
								<option value='MACHINE'>Machine Downtime</option>
								<option value='CHANGEOVER'>Changeover</option>
								<option value='QUALITY'>QC Qualification</option>
								<option value='PARAMETER'>Parameter Adjustment</option>
								<option value='MATERIAL'>Material Issue</option>
								<option value='NO-SCHED'>No Schedule</option>
								<option value='WAITING'>Waiting</option>
								<option value='OTHERS'>Others</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="fa fa-lg"><strong>RED ALERT INDICATOR:</strong></label>
						</div>
						<div class="col-sm-3">
							<input type="hidden" name="red_alert" value="" />
							<input type="checkbox" id="txt_red-alert" name="red_alert" value="RED-ALERT"/>
							<label for="txt_red-alert">RED ALERT? (Y/N)</label>
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
			<!-- ADD INFO -->
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Affected by the Problem</div>
				<div class="panel-body">
					<!-- dito -->
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">No. of Manpower:</label>
						</div> 
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_no_of_manpower" name="no_of_manpower" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Equivalent <br>Man-Hours: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_equiv_manhours" name="equiv_manhours" readOnly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Output per Hour:</label>
						</div>
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_out_per_hour" name="out_per_hour" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Equivalent <br>Output Loss: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_equiv_output_loss" name="equiv_output_loss" readOnly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Shipment Date:</label>
						</div> 
						<div class="col-sm-4">
							<input type="date" class="form-control" class="form-control" id="txt_afctd_shipment_date" name="afctd_shipment_date" value="<?php echo date('Y-m-d'); ?>" required>
						</div>
						<div class="col-sm-2">
							<label class="fa fa-lg">Shipment Quantity:</label>
						</div> 
						<div class="col-sm-4">
							<input type="number" class="form-control" id="txt_afctd_shipment_qty" name="afctd_shipment_qty" required>
						</div>
					</div>
				</div>
			</div>
			<!-- ADD INFO END-->
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
			<!-- primary start -->
			<div class="panel panel-primary">
				
				<div class="panel-heading"><i class="fa fa-envelope"></i> Primary Recipients(Hourly)</div>
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
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="primary_recipient_to" id="primary_cmb_recipient_to_edit" >
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="primary_txt_to_display" readonly>
						</div>
					</div>
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="primary_recipient_cc" id="primary_cmb_recipient_cc_edit" >
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="primary_txt_cc_display" readonly>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(per hour) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="1" step="1" max="24" required>
						</div>
					</div> -->
				</div>
			</div>
			<!-- primary end -->
			<!-- secondary start -->
			<div class="panel panel-primary">
				
				<div class="panel-heading"><i class="fa fa-envelope"></i> Secondary Recipients</div>
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
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="secondary_recipient_to" id="secondary_cmb_recipient_to_edit" >
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="secondary_txt_to_display" readonly>
						</div>
					</div>
					<div class="row" id="disabled_div">
						<div class="col-sm-2">
							<label class="fa fa-lg">CC: </label>
						</div> 
						<div class="col-sm-10" style="display:none;">
							<select data-placeholder="Select Email Recipients" multiple class="chosen-select" name="secondary_recipient_cc" id="secondary_cmb_recipient_cc_edit" >
								<option value=''></option>
							</select>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="secondary_txt_cc_display" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg">Set Mail Interval:<br>(hourly) </label>
						</div> 
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt_send_interval" name="send_interval" value="2" min="2" step="1" max="24" required>
						</div>
					</div>
				</div>
			</div>
			<!-- secondary end -->
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_prod_line">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<!-- <div class="col-sm-10"> -->
			<h4 class="modal-title"><i class="fa fa-bell-o"></i> New Production Line</h4>
			<!-- </div>  -->
		<!-- <label class="fa fa-md"><h4>( * = required)</h4></label> -->
      </div>
      <div class="modal-body">
		<form id="frm_new_prod_line">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Production Line Information</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> Product Line: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_product_name" name="product_name" required>
						</div>
					
						<div class="col-sm-2">
							<label class="fa fa-lg">Line Number: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_line_number" name="line_number">
						</div>
					</div>
					<br>
					<div class="row">

						<!-- <div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> Model: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_prod_model" name="prod_model" required>
						</div> -->

						<div class="col-sm-2">
							<label class="fa fa-lg">Category: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_category" name="category">
						</div>

						<div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> Production Type: </label>
						</div>
						<div class="col-sm-4">
							<select data-placeholder="Select Production Type" class="chosen-select" name="prod_type" id="txt_prod_type">
							<!-- <select data-placeholder="Select Production Type" name="prod_type" id="txt_prod_type"> -->
								<option value='' selected disabled>Select Production Type:</option>
								<option value='MANUAL'>MANUAL</option>
								<option value='SEMI-AUTO'>SEMI-AUTO</option>
								<option value='AUTO'>AUTO</option>
							</select>
						</div>

					</div>
					<br>
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> SAT: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_sat" name="sat" required>
						</div>

						<div class="col-sm-2">
							<label class="fa fa-lg">Area: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_area" name="area">
						</div>

					</div>
					<br>
					<div class="row">
					
						<div class="col-sm-2">
							<label class="fa fa-lg">Person-in-charge: </label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_person_in_charge" name="person_in_charge">
						</div>
					</div>
					
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-envelope"> Create Product Line</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_prod_line">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-bell-o"></i> Update Production Line </h4>
      </div>
      <div class="modal-body">
		<form id="frm_edit_prod_line">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Production Line Information</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> Product Line: </label>
							</div> 
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_product_name" name="product_name" required>
							</div>
						
							<div class="col-sm-2">
								<label class="fa fa-lg">Line Number: </label>
							</div> 
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_line_number" name="line_number">
							</div>
						</div>
						<br>
						<div class="row">
							<!-- <div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> Model: </label>
							</div> 
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_prod_model" name="prod_model" required>
							</div> -->

							<div class="col-sm-2">
								<label class="fa fa-lg">Category: </label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_category" name="category">
							</div> 

							<div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> Production Type: </label>
							</div>
							<div class="col-sm-4">
								<select data-placeholder="Select Production Type" class="chosen-select" name="prod_type" id="txt_prod_type">
									<option value='' selected disabled>Select Production Type:</option>
									<option value='MANUAL'>MANUAL</option>
									<option value='SEMI-AUTO'>SEMI-AUTO</option>
									<option value='AUTO'>AUTO</option>
								</select>
							</div>

						</div>
						<br>
						<div class="row">
							
							<div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> SAT: </label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_sat" name="sat" required>
							</div>

							<div class="col-sm-2">
								<label class="fa fa-lg">Area: </label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_area" name="area" >
							</div>

						</div>
						<br>
						<div class="row">
				
							<div class="col-sm-2">
								<label class="fa fa-lg">Person-in-charge: </label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_person_in_charge" name="person_in_charge" >
							</div>
						</div>
					</div>
				</div>
			</div>
	  		<div class="modal-footer">
				<?php
					if( $user_role[4]['update']  == 1 ){
						echo '<button type="submit" class="btn btn-primary fa fa-envelope" id="btn_update_prod_line"> Update Product Line</button>';
					}
				?>
		</form>
				<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_model">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<!-- <div class="col-sm-10"> -->
			<h4 class="modal-title"><i class="fa fa-bell-o"></i> New Model</h4>
			<!-- </div>  -->
		<!-- <label class="fa fa-md"><h4>( * = required)</h4></label> -->
      </div>
      <div class="modal-body">
		<form id="frm_new_model">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Production Line Information</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> Product Line: </label>
						</div> 
						<div class="col-sm-4">
							<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
							<select data-placeholder="Select Product Line" class="chosen-select" name="product_line" id="txt_product_line">
								<option value=''></option>
							</select>
						</div>
					
						<div class="col-sm-2">
							<label class="fa fa-lg"><strong style="color: red">*</strong> Model Name: </label>
						</div> 
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_model_name" name="model_name">
						</div>
					</div>
					
				</div>
			</div>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-envelope"> Create Model</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_model">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-bell-o"></i> Update Model </h4>
      </div>
      <div class="modal-body">
		<form id="frm_edit_model">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-exclamation-circle"></i> Production Line Information</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> Product Line: </label>
							</div> 
							<div class="col-sm-4">
								<!-- <input type="text" class="form-control" id="txt_line_affected" name="line_affected" required> -->
								<select data-placeholder="Select Product Line" class="chosen-select" name="product_line" id="edit_txt_product_line">
									<option value=''></option>
								</select>
							</div>
						
							<div class="col-sm-2">
								<label class="fa fa-lg"><strong style="color: red">*</strong> Model Name: </label>
							</div> 
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_model_name" name="model_name">
							</div>
						</div>
					</div>
				</div>
			</div>
	  		<div class="modal-footer">
				<?php
					if( $user_role[5]['update']  == 1 ){
						echo '<button type="submit" class="btn btn-primary fa fa-envelope" id="btn_update_model"> Update Model</button>';
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
        <h4 class="modal-title"><i class="fa fa-question-circle-o"></i> System Notification!</h4>
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

<div class="modal fade" tabindex="-1" role="dialog" id="export_PLM_modal_show">
	<div class="modal-dialog" style="width:30%;">
		<form id="form_excel_report">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<!-- ADD INFO -->
							<div class="panel panel-primary">
								<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Operation Date</div>
								<div class="panel-body">
									<!-- dito -->
									<div class="row">
										<div class="col-sm-1">
											<label class="fa fa-lg">Date:</label>
										</div> 
										<div class="col-sm-4">
										<input type="date" class="form-control" id="tbox_Date" name="tbox_Date" value="<?php echo date('Y-m-d'); ?>" required>
										</div>
									</div>
								</div>
							</div>
							<!-- ADD INFO END-->
						</div>
					</div>
				</div>
		        <div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
					<a role="button" class="btn btn-success btn-sm" data-placement="bottom" title="Click this to generate excel file." id="export_excel_PLM" data-original-title=""><font color="white">Export PLM</font></a>	
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="export_PER_modal_show">
	<div class="modal-dialog" style="width:30%;">
		<form id="form_excel_report">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<!-- ADD INFO -->
							<div class="panel panel-primary">
								<div class="panel-heading"><i class="fa fa-calendar-times-o"></i> Operation Date</div>
								<div class="panel-body">
									<!-- dito -->
									<div class="row">
										<div class="col-sm-2">
											<label class="fa fa-lg">FROM:</label>
										</div> 
										<div class="col-sm-4">
										<input type="date" class="form-control" id="tbox_fromDate" name="tbox_fromDate" value="<?php echo date('Y-m-d'); ?>" required>
										</div>
										<div class="col-sm-2">
											<label class="fa fa-lg">TO:</label>
										</div> 
										<div class="col-sm-4">
										<input type="date" class="form-control" id="tbox_toDate" name="tbox_toDate" value="<?php echo date('Y-m-d'); ?>" required>
										</div>
									</div>
								</div>
							</div>
							<!-- ADD INFO END-->
						</div>
					</div>
				</div>
		        <div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
					<a role="button" class="btn btn-success btn-sm" data-placement="bottom" title="Click this to generate excel file." id="export_excel_PER" data-original-title=""><font color="white">Export PER Report</font></a>	
				</div>
			</div>
		</form>
	</div>
</div>

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
	$('section#dashboard #a_add_dashboard').click(function(){ $('.sidebar li a[href="#add_dashboard"]').trigger('click'); });
	$('section#dashboard #a_product_lines').click(function(){ $('.sidebar li a[href="#product_lines"]').trigger('click'); });
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
			if ( data[10] == "ON-GOING" && data[0] != "RED-ALERT") {
				$("td",row).css("background-color","#AA4A44");
				$("td",row).css("color","#ffffff");
				$('td:eq(0)', row).html('LINE STOP');
			}
			if ( data[10] == "CLOSED" ) {
				$("td",row).css("background-color","#66ff66");
				$('td:eq(0)', row).html('CLOSED');
			}
			if ( data[10] == "ON-GOING" && data[0] == "RED-ALERT" ) {
				$("td",row).css("background-color","#FF0000");
				$("td",row).css("color","#ffffff");
			}
		}
	});

	var dt_tbl_dash = $('#tbl_add_dashboard').DataTable({
		"ajax"	: 'server_side_scripts/add_dashboard.php?status=ALL',
		"aaSorting"		: [],
		"rowCallback"	: function( row, data, index ) {
			//GGGG
			// $("td:eq(0)",row).css("display","none");
			if ( data[0] == "ON-GOING" )
			{
				if ( data[1] == "MACHINE" ) {
					$("td",row).css("background-color","#FF0000");
					$("td",row).css("color","#ffffff");
				}
				if ( data[1] == "CHANGEOVER" ) {
					$("td",row).css("background-color","#FFFF00");
					$("td",row).css("color","#000000");
				}
				if( data[1] == "QUALITY" ) {
					$("td",row).css("background-color","#FFC000");
					$("td",row).css("color","#000000");
				}
				if ( data[1] == "PARAMETER" ) {
					$("td",row).css("background-color","#cc00ff");
					$("td",row).css("color","#ffffff");
				}
				if ( data[1] == "MATERIAL" ) {
					$("td",row).css("background-color","#00b0f0");
					$("td",row).css("color","#000000");
				}
				if ( data[1] == "NO-SCHED" ) {
					$("td",row).css("background-color","#aeaaaa");
					$("td",row).css("color","#000000");
				}
				if ( data[1] == "WAITING" ) {
					$("td",row).css("background-color","#e7e6e6");
					$("td",row).css("color","#000000");
				}
				if ( data[1] == "OTHERS" ) {
					$("td",row).css("background-color","#99ccff");
					$("td",row).css("color","#000000");
				}
			}
			if ( data[0] == "CLOSED" ) {
				$("td",row).css("background-color","#00b050");
				// $("td",row).val("CLOSED");
				$("td",row).css("color","#ffffff");
				$('td:eq(1)', row).html('MASS PRODUCTION');
				// return 'CLOSED'
			}
		}
	});

	$('#btn_status_load_all').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=ALL').load();
	});
	$('#btn_status_load_closed').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=CLOSED').load();
	});
	$('#btn_status_load_machine').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=MACHINE').load();
	});
	$('#btn_status_load_changeover').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=CHANGEOVER').load();
	});
	$('#btn_status_load_quality').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=QUALITY').load();
	});
	$('#btn_status_load_parameter').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=PARAMETER').load();
	});
	$('#btn_status_load_material').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=MATERIAL').load();
	});
	$('#btn_status_load_nosched').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=NO-SCHED').load();
	});
	$('#btn_status_load_waiting').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=WAITING').load();
	});
	$('#btn_status_load_others').click(function() {
		dt_tbl_dash.ajax.url('server_side_scripts/add_dashboard.php?status=OTHERS').load();
	});
	

	var dt_tbl_prod_lines = $('#tbl_prod_lines').DataTable({
		"ajax"	: 'server_side_scripts/production_lines.php',
		"aaSorting"		: [],
		"rowCallback"	: function( row, data, index ) {
			// if ( data[0] == 1 ) {
			// 	$("td",row).css("background-color","#b30000");
			// 	$("td",row).css("color","#ffffff");
			// }
			// if ( data[0] == 0 ) {
			// 	$("td",row).css("background-color","#66ff66");
			// }
		}
	});

	var dt_tbl_models = $('#tbl_models').DataTable({
		"ajax"	: 'server_side_scripts/models.php',
		"aaSorting"		: [],
		"rowCallback"	: function( row, data, index ) {
			// if ( data[0] == 1 ) {
			// 	$("td",row).css("background-color","#b30000");
			// 	$("td",row).css("color","#ffffff");
			// }
			// if ( data[0] == 0 ) {
			// 	$("td",row).css("background-color","#66ff66");
			// }
		}
	});

// 	$('.chosen-select#txt_machine_affected').chosen({
//     // disable_search_threshold: 10,
//     no_results_text: "Oops, nothing found!",
//     width: "100%",
// 	search_contains: true
//   });
	
	// $('#frm_new_alert').on('click','#disabled_div',function(){
		// alert("You are not allowed to change recipients");
		// $('input').blur();
		// $('textarea').blur();
		 // $('.chosen-select').removeClass('chosen-container-active');
		// return false;
	// });
	
	$('#btn_new_alert').click(function(){
		
		// return_recipients_lists_by_id(15, 'txt_to_display', 'txt_cc_display');
		return_primary_recipients_lists_by_id(15, 'primary_txt_to_display', 'primary_txt_cc_display');
		return_secondary_recipients_lists_by_id(17, 'secondary_txt_to_display', 'secondary_txt_cc_display');
		return_machine_affected_lists('txt_machine_affected', function() {
			$('.chosen-select#txt_machine_affected').chosen({width:"100%", height: "100%", search_contains: true});
		});
		return_product_line_lists('txt_line_affected', function() 
				{
					$('.chosen-select#txt_line_affected').chosen({width:"100%", height: "100%", search_contains: true});				
				});
					$('.chosen-select#txt_error_category').chosen({width:"100%", height: "100%", search_contains: true});	

		// get_modelbyline_affected();
		let line_affected_val = "";
		get_modelbyline_affected('txt_model', line_affected_val,function()
				{
					// $("#frm_new_alert #txt_model").val('').trigger('chosen:updated');
					$('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});			
				});
		// $('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});
					
		// return_model('txt_model', function() 
		// {
			// $('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});			
		// });

		
		/* 
		Uncomment this portion pagnagbago nnaman isip ng user (by rona). then comment mo yung nsa taas :)
		return_recipients_lists('cmb_recipient_to', function() {
			$('.chosen-select#cmb_recipient_to').chosen({width:"100%", height: "100%", search_contains: true});
			return_recipients_lists('cmb_recipient_cc', function() {
				$('.chosen-select#cmb_recipient_cc').chosen({width:"100%", height: "100%", search_contains: true});					
			});
		}); */
		$('#modal_new_alert').modal('show');
	});

	// get values of model by line affected
    $('select[name="line_affected"]').on('change', function () {
        let line_affected_val = $('select[name="line_affected"]').val();
        // get_modelbyline_affected(line_affected_val);
		// $('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});	
		// $("#frm_new_alert #cmb_recipient_to").trigger('chosen:updated');
		// console.log('ewe');

		
		get_modelbyline_affected('txt_model', line_affected_val,function()
				{
					$("#frm_new_alert #txt_model").val('').trigger('chosen:updated');
					$('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});			
				});

				
    });

	$('#frm_edit_alert select[name="line_affected"]').on('change', function () {
        let line_affected_val = $('#frm_edit_alert select[name="line_affected"]').val();
        // get_modelbyline_affected(line_affected_val);
		// $('.chosen-select#txt_model').chosen({width:"100%", height: "100%", search_contains: true});	
		// $("#frm_new_alert #cmb_recipient_to").trigger('chosen:updated');
		// console.log('ewe');
		
		get_modelbyline_affected('edit_model', line_affected_val,function()
				{
					$("#frm_edit_alert #edit_model").val('').trigger('chosen:updated');
					$('.chosen-select#edit_model').chosen({width:"100%", height: "100%", search_contains: true});			
				});

				
    });

	function get_modelbyline_affected(cmb_id, line_affected_val,callback) {
		$('#'+cmb_id).empty();
		var data = {
			"action" 				: "get_modelbyline_affected",
			'line_affected'			: line_affected_val
		} 
		call_ajax(data, handler, function(result){

			$('#'+cmb_id).append( '<option selected disabled value=""></option>' );
			$('#'+cmb_id).append( '<option value="N/A">N/A</option>' );
			$('#'+cmb_id).append( result['html_select'] );
            callback();
		});
	}

	// function get_modelbyline_affected(line_affected_val) {
	// 	let data = {
	// 		'action'		: 'get_modelbyline_affected',
	// 		'line_affected' : line_affected_val
	// 	}
	// 	data = $.param(data);
	// 	$.ajax({
	// 		type: "POST",
	// 		url: handler,
	// 		data: data,
	// 		dataType: "JSON",
	// 		success: function (data) {
	// 			let ctr = data['ctr'];
	// 			$("select[name='model']").empty().prepend(`<option value="" hidden>Please Select Model</option><option value="N/A">N/A</option>`);

	// 			for (let i = 0; i < ctr; i++) {

	// 				let body = `<option value="${data['model_name'][i]}">${data['model_name'][i]}</option>`;
	// 				$("select[name='model']").append(body);
	// 			}
				
	// 		},
	// 		error: (data) => { console.log(data) }
	// 	});
	// }

	function return_model(cmb_id, callback) {
		$('#'+cmb_id).empty();
		var data = {
			"action" 		: "return_model"
		} 
		call_ajax(data, handler, function(result){
			$('#'+cmb_id).append( '<option selected disabled value="N/A"></option>' );
			$('#'+cmb_id).append( '<option value="N/A">N/A</option>' );
			$('#'+cmb_id).append( result['html_select'] );
            callback();
		});
	}

	

	$('#btn_export_excel_PLM').click(function(){
		$('#export_PLM_modal_show').modal('show');
	});

	$('#btn_export_excel_PER').click(function(){
		$('#export_PER_modal_show').modal('show');
	});

	$('#btn_new_prod_line').click(function(){
		$('#modal_new_prod_line').modal('show');
				
		$('.chosen-select#txt_prod_type').chosen({width:"100%", height: "100%", search_contains: true});
	});
	
	$('#btn_new_model').click(function(){
		$('#modal_new_model').modal('show');

		return_product_line_lists('txt_product_line', function() 
				{
					$('.chosen-select#txt_product_line').chosen({width:"100%", height: "100%", search_contains: true});			
				});
		
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
		$('.btn').prop("disabled",true);

		// if($('#txt_line_affected').val() == null) {
		// 		$('#txt_line_affected').val('N/A');
		// }
		// if($('#txt_error_category').val() == null) {
		// 		$('#txt_error_category').val('N/A');
		// }

		var primary_recipient_to = $('#primary_txt_to_display').val();
		var primary_recipient_cc = $('#primary_txt_cc_display').val();
		var secondary_recipient_to = $('#secondary_txt_to_display').val();
		var secondary_recipient_cc = $('#secondary_txt_cc_display').val();
		console.log('to '+JSON.stringify(primary_recipient_to));
		console.log('cc '+JSON.stringify(primary_recipient_cc));
		console.log('to '+JSON.stringify(secondary_recipient_to));
		console.log('cc '+JSON.stringify(secondary_recipient_cc));
		var serialized_data = $(this).serialize();
		var data = {
			"action" 					: "create_new_alert",
			"primary_recipient_to2"		: primary_recipient_to,
			"primary_recipient_cc2"		: primary_recipient_cc,
			"secondary_recipient_to2"	: secondary_recipient_to,
			"secondary_recipient_cc2"	: secondary_recipient_cc,
			"username"		: username
		} 
		call_ajax_serialize(data, serialized_data, handler, function(result){
			if(result['msg'] == 'Line Affected is required') {
				$('#container_message').attr('class','alert alert-danger');
			}
			else if(result['msg'] == 'Downtime Status is required') {
				$('#container_message').attr('class','alert alert-danger');
			}
			else if(result['msg'] == 'Please select Machine Affected') {
				$('#container_message').attr('class','alert alert-danger');
			}
			else if(result['msg'] == 'ERROR! <br> Product Line Affected is currently ONGOING!') {
				$('#container_message').attr('class','alert alert-danger');
			} 
			else {
				$('#modal_new_alert').modal('hide');
				$('#container_message').attr('class','alert alert-success');
				$('#frm_new_alert input').val('');
				$('#frm_new_alert select').val('').trigger('chosen:updated');
				$('#frm_new_alert textarea').val('');
				dt_tbl_alert.ajax.reload();
				dt_tbl_dash.ajax.reload();
			}
			$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
			$('#modal_system_message').modal();
			$('.btn').prop("disabled",false);
			$('#primary_cmb_recipient_to').val('').trigger('chosen:updated');
			$('#primary_cmb_recipient_cc').val('').trigger('chosen:updated');
			$('#secondary_cmb_recipient_to').val('').trigger('chosen:updated');
			$('#secondary_cmb_recipient_cc').val('').trigger('chosen:updated');
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
		return_recipients_lists('primary_cmb_recipient_to_edit', function() {
			$('.chosen-select#primary_cmb_recipient_to_edit').chosen({width:"100%", height: "100%", search_contains: true});
			return_recipients_lists('primary_cmb_recipient_cc_edit', function() {
				$('.chosen-select#primary_cmb_recipient_cc_edit').chosen({width:"100%", height: "100%", search_contains: true});
				return_recipients_lists('secondary_cmb_recipient_to_edit', function() {
				$('.chosen-select#secondary_cmb_recipient_to_edit').chosen({width:"100%", height: "100%", search_contains: true});
					return_recipients_lists('secondary_cmb_recipient_cc_edit', function() {
					$('.chosen-select#secondary_cmb_recipient_cc_edit').chosen({width:"100%", height: "100%", search_contains: true});		
						return_alert_recipients_by_fkalert(pkid);				
					});				
				});					
			});
		});
		return_machine_affected_lists('edit_machine_affected', function() {
			$('.chosen-select#edit_machine_affected').chosen({width:"100%", height: "100%", search_contains: true});
			return_product_line_lists('edit_line_affected', function() {
							$('.chosen-select#edit_line_affected').chosen({width:"100%", height: "100%", search_contains: true});	
				return_model('edit_model', function() {
					$('.chosen-select#edit_model').chosen({width:"100%", height: "100%", search_contains: true});			
					return_alert_details_by_id(pkid, function() {

						// return_model('edit_model', function() {
						// 	$('.chosen-select#edit_model').chosen({width:"100%", height: "100%", search_contains: true});
							$('#modal_edit_alert').modal();	
						// });
					});
				});
			});
		});
				$('.chosen-select#txt_error_category').chosen({width:"100%", height: "100%", search_contains: true});
	});

	$('#modal_edit_alert').on('hide.bs.modal', function () {
    $(this).find('form').trigger('reset');
	});

	$('#form_excel_report #export_excel_PLM').click(function(){
		var PLM_startDate 		= $('#tbox_Date').val();
				
		if( PLM_startDate == '') {
			alert("Please select date");
		}else {
			window.location.href = "./pages/excel_export_PLM.php?startDate="+PLM_startDate;
		}

		$('#export_PLM_modal_show').modal('hide');
	});

	$('#form_excel_report #export_excel_PER').click(function(){
		var PER_startDate 		= $('#tbox_fromDate').val();
		var PER_endDate 		= $('#tbox_toDate').val();
				
		if( PER_startDate == '') {
			alert("Please select date range");
		}else {
			window.location.href = "./pages/excel_export_PER.php?startDate="+PER_startDate+"&endDate="+PER_endDate;
		}

		$('#export_PER_modal_show').modal('hide');
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
		if( $('#frm_edit_alert #primary_cmb_recipient_to_edit option:selected').length <= 0 ) {
			console.log($('#frm_edit_alert #primary_cmb_recipient_to_edit option:selected').length);
			$('#frm_edit_alert #div_recipients_validation').html('<h4>Please select email recipient.</h4>');
			$('#frm_edit_alert #div_recipients_validation').show();
		} else {
			// console.log('oteeeess');
			var primary_recipient_to = [];
			$('#frm_edit_alert #primary_cmb_recipient_to_edit :selected').each(function(i, selected) {
				primary_recipient_to[i] = $(selected).val();
			});
			var primary_recipient_cc = [];
			$('#frm_edit_alert #primary_cmb_recipient_cc_edit :selected').each(function(i, selected) {
				primary_recipient_cc[i] = $(selected).val();
			});
			var secondary_recipient_to = [];
			$('#frm_edit_alert #secondary_cmb_recipient_to_edit :selected').each(function(i, selected) {
				secondary_recipient_to[i] = $(selected).val();
			});
			var secondary_recipient_cc = [];
			$('#frm_edit_alert #secondary_cmb_recipient_cc_edit :selected').each(function(i, selected) {
				secondary_recipient_cc[i] = $(selected).val();
			});
			$('#frm_edit_alert #div_recipients_validation').hide();
			$('.btn').prop("disabled",true);
			var serialized_data = $(this).serialize();
			console.log(JSON.stringify(primary_recipient_to));
			console.log(JSON.stringify(primary_recipient_cc));
			console.log(JSON.stringify(secondary_recipient_to));
			console.log(JSON.stringify(secondary_recipient_cc));
			var data = {
				"action" 					: "update_line_alert",
				"pkid"						: $('#btn_update_alert').val(),
				"primary_recipient_to2"		: JSON.stringify(primary_recipient_to),
				"primary_recipient_cc2"		: JSON.stringify(primary_recipient_cc),
				"secondary_recipient_to2"	: JSON.stringify(secondary_recipient_to),
				"secondary_recipient_cc2"	: JSON.stringify(secondary_recipient_cc),
				"username"					: username
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				if ( result["msg1"] == '0' ) {
					alert('Please check time finished');
				}
				
				if(result['msg'] == 'ERROR! <br> Product Line Affected is currently ONGOING!') {
						$('#container_message').attr('class','alert alert-danger');
				} 
				else {
					$('#modal_edit_alert').modal('hide');
					$('#container_message').attr('class','alert alert-success');
					$('#frm_new_alert input').val('');
					$('#frm_new_alert select').val('').trigger('chosen:updated');
					$('#frm_new_alert textarea').val('');
					
					$('#primary_cmb_recipient_to_edit').val('').trigger('chosen:updated');
					$('#primary_cmb_recipient_cc_edit').val('').trigger('chosen:updated');
					$('#secondary_cmb_recipient_to_edit').val('').trigger('chosen:updated');
					$('#secondary_cmb_recipient_cc_edit').val('').trigger('chosen:updated');
				}
				
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();	
				dt_tbl_alert.ajax.reload();
				dt_tbl_dash.ajax.reload();
				$('.btn').prop("disabled",false);
			});
		}
	});

	$('#frm_new_prod_line').submit(function(e){
		e.preventDefault(); 
		$('.btn').prop("disabled",true);
		var serialized_data = $(this).serialize();
		var data = {
			"action" 					: "create_new_product_line"
			// "primary_recipient_to2"		: primary_recipient_to,
			// "username"		: username
		} 
		call_ajax_serialize(data, serialized_data, handler, function(result){
			if(result['msg'] == 'ERROR! <br><br> Product Line already exist!') {
				$('#container_message').attr('class','alert alert-danger');
			} 
			else {
				$('#modal_new_prod_line').modal('hide');
				$('#container_message').attr('class','alert alert-success');
				$('#frm_new_prod_line input').val('');
				$('#frm_new_prod_line select').val('').trigger('chosen:updated');
				$('#frm_new_alert select').val('').trigger('chosen:updated');	
			}

			$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
			$('#modal_system_message').modal();
			dt_tbl_prod_lines.ajax.reload();
				dt_tbl_dash.ajax.reload();
			$('.btn').prop("disabled",false);
		});

	});

	$('#frm_edit_prod_line').submit(function(e){
		e.preventDefault();
			var serialized_data = $(this).serialize();
			var data = {
				"action" 		: "update_prod_line",
				"pkid"			: $('#btn_update_prod_line').val()
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				if(result['msg'] == 'ERROR! <br> Product Line already exist!') {
					$('#container_message').attr('class','alert alert-danger');
				} else {
					$('#modal_edit_prod_line').modal('hide');
					$('#container_message').attr('class','alert alert-success');
				}
				// $('#frm_edit_prod_line input').val('');
				// $('#frm_edit_prod_line select').val('').trigger('chosen:updated');
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();	
				dt_tbl_prod_lines.ajax.reload();
				$('.btn').prop("disabled",false);
			});
	});

	$('#frm_new_model').submit(function(e){
		e.preventDefault(); 
		$('.btn').prop("disabled",true);
		var serialized_data = $(this).serialize();
		var data = {
			"action" 					: "create_new_model"
			// "primary_recipient_to2"		: primary_recipient_to,
			// "username"		: username
		} 
		call_ajax_serialize(data, serialized_data, handler, function(result){
			if(result['msg'] == 'ERROR! <br> Product Line Model already exist!') {
				$('#container_message').attr('class','alert alert-danger');
			} 
			else {
				$('#modal_new_model').modal('hide');
				$('#container_message').attr('class','alert alert-success');

				$('#frm_new_model input').val('');
				$('#frm_new_model select').val('').trigger('chosen:updated');
				dt_tbl_models.ajax.reload();
				dt_tbl_prod_lines.ajax.reload();
				dt_tbl_dash.ajax.reload();
				
			}

			$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
			$('#modal_system_message').modal();
			$('.btn').prop("disabled",false);
		});

	});

	$('#frm_edit_model').submit(function(e){
		e.preventDefault();
			var serialized_data = $(this).serialize();
			var data = {
				"action" 		: "update_model",
				"pkid"			: $('#btn_update_model').val()
			} 
			call_ajax_serialize(data, serialized_data, handler, function(result){
				if(result['msg'] == 'ERROR! <br> Product Line Model already exist!') {
					$('#container_message').attr('class','alert alert-danger');
					
				} else {
					$('#modal_edit_model').modal('hide');
					$('#container_message').attr('class','alert alert-success');
				}
				// $('#frm_edit_prod_line input').val('');
				// $('#frm_edit_prod_line select').val('').trigger('chosen:updated');
					
				$('#container_message').html( '<h4>'+result["msg"]+'</h4>' );
				$('#modal_system_message').modal();
				dt_tbl_models.ajax.reload();
				$('.btn').prop("disabled",false);
			});
	});

	$('#tbl_prod_lines tbody').on('click', '#btn_edit', function() {
		var pkid = $(this).val();
		$('#btn_update_prod_line').val(pkid);
		return_prod_line_details_by_id(pkid, function() {			
			$('#modal_edit_prod_line').modal();
		});
		$('.chosen-select#txt_prod_type').chosen({width:"100%", height: "100%", search_contains: true});
	});

	$('#tbl_models tbody').on('click', '#btn_edit', function() {
		var pkid = $(this).val();
		$('#btn_update_model').val(pkid);
		return_product_line_lists('edit_txt_product_line', function() 
				{
					$('.chosen-select#edit_txt_product_line').chosen({width:"100%", height: "100%", search_contains: true});			
				return_model_details_by_id(pkid, function() {
							
					$('#modal_edit_model').modal();
				});
			});	


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

	$('#btn_load_red_alert').click(function() {
		dt_tbl_alert.ajax.url('server_side_scripts/alert.php?status=RED-ALERT').load();
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

	function return_product_line_lists(cmb_id, callback) {
		$('#'+cmb_id).empty();
		var data = {
			"action" 		: "get_product_line_lists"
		} 
		call_ajax(data, handler, function(result){
			$('#'+cmb_id).append( '<option selected disabled value="N/A"></option>' );
			$('#'+cmb_id).append( '<option value="N/A">N/A</option>' );
			$('#'+cmb_id).append( result['html_select'] );
            callback();
		});
	}
	
	// function return_recipients_lists_by_id(template_id, txt_to, txt_cc) {
	// 	var data = {
	// 		"action" 		: "return_recipients_template_by_id",
	// 		"pkid"			: template_id
	// 	} 
	// 	call_ajax(data, handler, function(result){
	// 		$('#'+txt_to).val(result['template_to']);
	// 		$('#'+txt_cc).val(result['template_cc']);
	// 	});
	// }

	function return_primary_recipients_lists_by_id(template_id, txt_to, txt_cc) {
		var data = {
			"action" 		: "return_recipients_template_by_id",
			"pkid"			: template_id
		} 
		call_ajax(data, handler, function(result){
			$('#'+txt_to).val(result['template_to']);
			$('#'+txt_cc).val(result['template_cc']);
		});
	}

	function return_secondary_recipients_lists_by_id(template_id, txt_to, txt_cc) {
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

	function return_machine_affected_lists(cmb_id, callback) {
		$('#'+cmb_id).empty();
		var data = {
			"action" 		: "get_machine_affected_lists"
		} 
		call_ajax(data, handler, function(result){
			$('#'+cmb_id).append( '<option style="display:none" value="NULL">Select Machine Affected</option>');
			$('#'+cmb_id).append( '<option value="N/A">N/A</option>');
			$('#'+cmb_id).append( result['html_select'] );
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
			// $('#frm_edit_alert #edit_line_affected').val(result['line_affected']);
			// data-placeholder="Select Product Line"

			// add attr->placeholder
			// $('#frm_edit_alert #edit_line_affected').attr("data-placeholder", result['line_affected']).trigger('chosen:updated');
			$('#frm_edit_alert #edit_line_affected').val(result['line_affected']).trigger('chosen:updated');
			$('#frm_edit_alert #edit_model').val(result['model']).trigger('chosen:updated');
			$('#frm_edit_alert #txt_error_category').val(result['error_category']).trigger('chosen:updated');
			$('#frm_edit_alert #edit_process_affected').val(result['process_affected']);
			$('#frm_edit_alert #edit_machine_affected').val(result['machine_affected']).trigger('chosen:updated');
			if(result['red_alert'] == 'RED-ALERT') {
				$('#frm_edit_alert #txt_red-alert').attr( 'checked', true );
			}
			else{
				$('#frm_edit_alert #txt_red-alert').attr( 'checked', false );
			}
				// $('#frm_edit_alert #txt_red-alert').show(':checked');
				// $('#frm_edit_alert #txt_red-alert').attr(":checked");
				
				// $('#frm_edit_alert #txt_red-alert').show();
				// document.getElementById("#txt_red-alert").checked=true;
				// $('#frm_edit_alert #txt_red-alert').is(':checked')
				// $('#frm_edit_alert #txt_time_finished').prop('disabled', true);
				// $('#frm_edit_alert #txt_red-alert').val(result['red_alert']).trigger('chosen:updated');
			
			$('#frm_edit_alert #txt_problem').val(result['problem']);
			$('#frm_edit_alert #txt_date_started').val(result['date_started']);
			$('#frm_edit_alert #txt_time_started').val(result['time_started']);
			$('#frm_edit_alert #txt_action_being_done').val(result['action_being_done']);
			$('#frm_edit_alert #txt_who').val(result['who']);
			$('#frm_edit_alert #txt_target_resumption').val(result['target_resumption']);
			$('#frm_edit_alert #txt_alert_remarks').val(result['alert_remarks']);
			$('#frm_edit_alert #txt_no_of_manpower').val(result['manpower_affected']);
			$('#frm_edit_alert #txt_equiv_manhours').val(result['equivalent_manhours']);
			$('#frm_edit_alert #txt_out_per_hour').val(result['output_per_hour']);
			$('#frm_edit_alert #txt_equiv_output_loss').val(result['equivalent_output_loss']);
			$('#frm_edit_alert #txt_afctd_shipment_date').val(result['afctd_shipment_date']);
			$('#frm_edit_alert #txt_afctd_shipment_qty').val(result['afctd_shipment_qty']);
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

	function return_prod_line_details_by_id(pkid, callback) {
		var data = {
			"action" 		: "return_prod_line_details_by_id",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){

			$('#frm_edit_prod_line #txt_product_name').val(result['product_name']);
			// $('#frm_edit_prod_line #txt_prod_model').val(result['model']);
			$('#frm_edit_prod_line #txt_line_number').val(result['line_number']);
			$('#frm_edit_prod_line #txt_category').val(result['category']);
			$('#frm_edit_prod_line #txt_sat').val(result['sat']);
			$('#frm_edit_prod_line #txt_prod_type').val(result['production_type']).trigger('chosen:updated');
			$('#frm_edit_prod_line #txt_area').val(result['area']);
			$('#frm_edit_prod_line #txt_person_in_charge').val(result['person_in_charge']);
			callback();
		});
	}

	function return_model_details_by_id(pkid, callback) {
		var data = {
			"action" 		: "return_model_details_by_id",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){

			$('#frm_edit_model #edit_txt_product_line').val(result['pk_product_name']).trigger('chosen:updated');
			$('#frm_edit_model #txt_model_name').val(result['model']);
			callback();
		});
	}
	
	function return_alert_recipients_by_fkalert(pkid) {
		var data = {
			"action" 		: "return_alert_recipients_by_fkalert",
			"pkid"			: pkid
		} 
		call_ajax(data, handler, function(result){
			$('#primary_cmb_recipient_to_edit').val(result['pri_recipient_to']).trigger('chosen:updated');
			$('#primary_cmb_recipient_cc_edit').val(result['pri_recipient_cc']).trigger('chosen:updated');
			$('#secondary_cmb_recipient_to_edit').val(result['sec_recipient_to']).trigger('chosen:updated');
			$('#secondary_cmb_recipient_cc_edit').val(result['sec_recipient_cc']).trigger('chosen:updated');
			$('#frm_edit_alert #primary_txt_to_display').val(result['pri_recipient_to']);
			$('#frm_edit_alert #primary_txt_cc_display').val(result['pri_recipient_cc']);
			$('#frm_edit_alert #secondary_txt_to_display').val(result['sec_recipient_to']);
			$('#frm_edit_alert #secondary_txt_cc_display').val(result['sec_recipient_cc']);
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
			$('.chosen-select#cmb_template_to').chosen({width:"100%", height: "100%", search_contains: true});
			return_recipients_lists('cmb_template_cc', function() {
				$('.chosen-select#cmb_template_cc').chosen({width:"100%", height: "100%", search_contains: true});				
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
			$('.chosen-select#cmb_template_to_edit').chosen({width:"100%", height: "100%", search_contains: true});
			return_recipients_lists('cmb_template_cc_edit', function() {
				$('.chosen-select#cmb_template_cc_edit').chosen({width:"100%", height: "100%", search_contains: true});
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
		ajax	: "server_side_scripts/user_roles_main?fk_system=111"
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

	/* ******************************
			Export - Start
	******************************* */

	// $('#export_excel').on('click',function(){ //NOTE: MIGZ EXPORT
	// // var pkid 	= $(this).attr("id");	
	// //  console.log(pkid); //NOTE: EXPORT
	//  console.log(`test`); //NOTE: EXPORT
	// window.location.href = "./pages/excel_export_new.php"
	// }); //NOTE EXPORT


	/* ******************************
			Export - End
	******************************* */
	
	// $('.sidebar li a[href="#template"]').trigger('click');
</script>