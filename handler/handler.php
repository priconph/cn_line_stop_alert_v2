<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				/* do not edit below */
				case "create_recipients_template" 					: create_recipients_template(); break; 
				case "return_recipients_template_by_id" 			: return_recipients_template_by_id(); break; 
				case "update_recipients_template" 					: update_recipients_template(); break; 
				case "delete_recipients_template" 					: delete_recipients_template(); break; 
				case "create_new_alert" 							: create_new_alert(); break; 
				case "create_new_product_line" 						: create_new_product_line(); break; 
				case "update_line_alert" 							: update_line_alert(); break; 
				case "update_prod_line" 							: update_prod_line(); break; 
				case "create_new_model" 							: create_new_model(); break; 
				case "update_model" 								: update_model(); break; 
				case "close_line_alert" 							: close_line_alert(); break; 
				
				case "get_recipient_lists" 							: get_recipient_lists(); break; 
				case "get_machine_affected_lists" 					: get_machine_affected_lists(); break; 
				case "get_product_line_lists" 						: get_product_line_lists(); break; 
				case "get_modelbyline_affected" 					: get_modelbyline_affected(); break; 
				case "return_alert_details_by_id" 					: return_alert_details_by_id(); break; 
				case "return_prod_line_details_by_id" 				: return_prod_line_details_by_id(); break; 
				case "return_model_details_by_id" 					: return_model_details_by_id(); break; 
				case "return_model" 								: return_model(); break; 
				case "return_alert_recipients_by_fkalert" 			: return_alert_recipients_by_fkalert(); break; 
				case "return_recipients_template" 					: return_recipients_template(); break; 
								
				case "get_ongoing_alert" 							: get_ongoing_alert(); break;				
				
				case "encode" 										: encode(); break; 
				case "decode" 										: decode(); break; 
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) =='xmlhttprequest';
	}
	
	/* convert an array to encode base64 and serialize */
	function encode(){
		$str = base64_encode(serialize($_POST));
		echo json_encode($str);
	}

	/* revert to normal array, decode str to base64 and unserialize */
	function decode(){
		$array = unserialize(base64_decode($_POST));
		echo json_encode($array);
	}

	function encodeURIComponent($str) {
		$revert = array('%21'=>'!','%2A'=>'*','%27'=>"'",'%28'=>'(','%29'=>')');
		return strtr(rawurlencode($str), $revert);
	}

	function create_new_product_line() {
		require_once('../class/oop.php'); 
		$product_name 		= $_POST['product_name'];
		$line_number 		= $_POST['line_number']; 
		$category 			= $_POST['category'];  
		$sat 				= $_POST['sat'];  
		$prod_type 			= $_POST['prod_type'];
		$area 				= $_POST['area']; 
		$person_in_charge 	= $_POST['person_in_charge'];
		$result 			= "";
		$array_fields = array('pkid');
		$table  	= "tbl_product_line";	
		$joins 	  	='';
		$sql_where 	='WHERE product_name="'.$product_name.'" AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';	
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($result->num_rows ==0){
			$result 			= "";
			$array_fields 		= array('product_name','line_number','area','category','sat','production_type','person_in_charge'); 
			$array_values 		= array($product_name,$line_number,$area, $category, $sat, $prod_type, $person_in_charge); 
			$msg 				= ALERT::getInstance()->insert_query($table,$array_fields,$array_values);
		} else {
			$msg				= 'ERROR! <br><br> Product Line already exist!';
		}
		$return["msg"] 			= $msg;
		echo json_encode($return); 
	}

	function update_prod_line() {
		require_once('../class/oop.php'); 
		$pkid 				= $_POST['pkid']; 
		$product_name 		= $_POST['product_name'];
		$line_number 		= $_POST['line_number'];   
		$category 			= $_POST['category'];  
		$sat 				= $_POST['sat'];  
		$prod_type 			= $_POST['prod_type']; 
		$area 				= $_POST['area'];  
		$person_in_charge 	= $_POST['person_in_charge']; 
		$result 			= "";

		//1st validation for updating product line
		$array_fields_for_query = array('pkid');
		$table  			= "tbl_product_line";
		$joins 	  			='';
		$sql_where 			='WHERE product_name="'.$product_name.'" AND logdel=0';
		$sql_order 			='';
		$sql_limit 			='LIMIT 0,1';	
		$result = ALERT::getInstance()->select_query($array_fields_for_query,$table,$joins,$sql_where,$sql_order,$sql_limit);

		//2nd validation for updating product line
		$array_fields2 = array('pkid','product_name');
		$table2 	= "tbl_product_line";	
		$joins2 	  	='';
		$sql_where2 	='WHERE pkid ="'.$pkid.'" AND logdel=0';
		$sql_order2 	='';
		$sql_limit2 	='LIMIT 0,1';	
		$validation_result2 = ALERT::getInstance()->select_query($array_fields2,$table2,$joins2,$sql_where2,$sql_order2,$sql_limit2);
		$validation_result_fetched2 = mysqli_fetch_assoc($validation_result2);

		if($result->num_rows ==0 || $validation_result_fetched2['product_name'] = $product_name){
			$array_fields 		= array('product_name','line_number','area','category','sat','production_type','person_in_charge'); 
			$array_values 		= array($product_name,$line_number, $area, $category, $sat, $prod_type, $person_in_charge); 
		$msg 				= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 			= ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		} else {
			$msg				= 'ERROR! <br> Product Line already exist!';
			$script				= 'ERROR! <br> Product Line already exist!';
		}
		$return["msg"] 			= $msg;
		$return["script"] 		= $script;
		echo json_encode($return); 
	}

	function create_new_model() {
		require_once('../class/oop.php'); 
		$product_name 		= $_POST['product_line']; 
		$model_name 		= $_POST['model_name']; 
		$result 			= "";
		$array_fields = array('pkid');
		$table  	= "tbl_model";	
		$joins 	  	='';
		$sql_where 	='WHERE pk_product_name="'.$product_name.'" AND model="'.$model_name.'" AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';	
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($result->num_rows ==0){
			$result 			= "";
			$array_fields 		= array('pk_product_name','model'); 
			$array_values 		= array($product_name,$model_name); 
			$msg 				= ALERT::getInstance()->insert_query($table,$array_fields,$array_values);
		} else {
			$msg				= 'ERROR! <br> Product Line Model already exist!';
		}
		$return["msg"] 			= $msg;
		echo json_encode($return); 
	}

	function update_model() {
		require_once('../class/oop.php'); 
		$pkid 				= $_POST['pkid']; 
		$product_name 		= $_POST['product_line'];
		$model_name 		= $_POST['model_name']; 
		$result 			= "";

		//1st validation for updating model
		$array_fields_for_query = array('pkid');
		$table  			= "tbl_model";
		$joins 	  			='';
		$sql_where 			='WHERE pk_product_name="'.$product_name.'" AND model="'.$model_name.'" AND logdel=0';
		$sql_order 			='';
		$sql_limit 			='LIMIT 0,1';	
		$result = ALERT::getInstance()->select_query($array_fields_for_query,$table,$joins,$sql_where,$sql_order,$sql_limit);

		//2nd validation for updating model
		$array_fields2 = array('pkid','model');
		$table2 	= "tbl_model";	
		$joins2 	  	='';
		$sql_where2 	='WHERE pkid ="'.$pkid.'" AND logdel=0';
		$sql_order2 	='';
		$sql_limit2 	='LIMIT 0,1';	
		$validation_result2 = ALERT::getInstance()->select_query($array_fields2,$table2,$joins2,$sql_where2,$sql_order2,$sql_limit2);
		$validation_result_fetched2 = mysqli_fetch_assoc($validation_result2);

		if($result->num_rows == 0 || $validation_result_fetched2['model'] = $model_name){
			$array_fields 		= array('pk_product_name','model'); 
			$array_values 		= array($product_name,$model_name); 
		$msg 				= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 			= ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		} else {
			$msg				= 'ERROR! <br> Product Line Model already exist!';
			$script				= 'ERROR! <br> Product Line Model already exist!';
		}
		$return["msg"] 			= $msg;
		$return["script"] 		= $script;
		echo json_encode($return); 
	}
  
	function create_recipients_template() {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$template 			= $_POST['recipients_template']; 
		$recipient_to 		= json_decode($_POST['recipient_to']); 
		$recipient_cc 		= json_decode($_POST['recipient_cc']); 
		$username 			= $_POST['username']; 
		$to = array();
		foreach($recipient_to as $r_to) {
			array_push($to, $r_to);
		}
		$cc = array();
		foreach($recipient_cc as $r_cc) {
			array_push($cc, $r_cc);
		}	
		$to 		 = implode(',',$to);
		$cc 		 = implode(',',$cc);	
		
		$result = "";
		$array_fields = array('pkid');
		$table  	= "tbl_recipients_template";
		$joins 	  	='';
		$sql_where 	='WHERE recipients_template="'.$template.'" AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($result->num_rows ==0){
			$result 			= "";
			$array_fields 		= array('date_time_created','created_by','recipients_template','recipients_username_to','recipients_username_cc','lastupdate','username'); 
			$array_values 		= array($date_time_today,$username,$template, $to, $cc, $date_time_today, $username); 
			$msg 				= ALERT::getInstance()->insert_query($table,$array_fields,$array_values);
		} else {
			$msg				= 'Template name already exist!';
		}
		$return["msg"] 		= $msg;
		echo json_encode($return); 
	}
  
	function return_recipients_template_by_id() {
		require_once('../class/oop.php'); 
		$pkid 	= $_POST["pkid"];
		$result = "";
		$array_fields = array('recipients_template', 'recipients_username_to', 'recipients_username_cc');
		$table 	  	='tbl_recipients_template';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$pkid.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$return['recipients_template'] = $row['recipients_template'];
			$to_array = array();
			$recipient_to = explode(',',$row['recipients_username_to']);
			for($i=0;$i<count($recipient_to);$i++) {
				array_push($to_array, $recipient_to[$i]);
			}
			$cc_array = array();
			$recipient_cc = explode(',',$row['recipients_username_cc']);
			for($i=0;$i<count($recipient_cc);$i++) {
				array_push($cc_array, $recipient_cc[$i]);
			}
			$return['template_to'] 	= $to_array;
			$return['template_cc'] 	= $cc_array;
		}
		echo json_encode($return);
	}
	
	function update_recipients_template() {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$pkid 				= $_POST['pkid']; 
		$template 			= $_POST['recipients_template']; 
		$recipient_to 		= json_decode($_POST['recipient_to']); 
		$recipient_cc 		= json_decode($_POST['recipient_cc']); 
		$username 			= $_POST['username']; 
		$to = array();
		foreach($recipient_to as $r_to) {
			array_push($to, $r_to);
		}
		$cc = array();
		foreach($recipient_cc as $r_cc) {
			array_push($cc, $r_cc);
		}	
		$to 		 	= implode(',',$to);
		$cc 		 	= implode(',',$cc);
		$result 		= "";
		$table  		= "tbl_recipients_template";
		$array_fields 	= array('recipients_template','recipients_username_to','recipients_username_cc','lastupdate','username'); 
		$array_values 	= array($template, $to, $cc, $date_time_today, $username); 
		$result 		= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["msg"] 	= $result;
		echo json_encode($return); 
	}
  
	function delete_recipients_template() {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$pkid 				= $_POST['pkid']; 
		$username 			= $_POST['username']; 
		$result 			= "";
		$table  			= "tbl_recipients_template";
		$array_fields 		= array('lastupdate','username','logdel'); 
		$array_values 		= array($date_time_today, $username,1); 
		$result 			= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["msg"] 		= $result;
		echo json_encode($return); 
	}
  
	function create_new_alert() {
		require_once('../class/oop.php'); 

		if(empty($_POST['error_category'])){
			$error_category 	= 'N/A'; 
		}else{
			$error_category 	= $_POST['error_category'];
		}

		if (empty($_POST['line_affected'])) {
			$line_affected 	= 'N/A';
		}else {
			$line_affected 		= $_POST['line_affected'];
		}

		$date_time_today	= date('Y-m-d H:i:s');
		// $error_category 	= $_POST['error_category']; 
		$send_interval 		= $_POST['send_interval']; 
		// $line_affected 		= $_POST['line_affected']; 
		$process_affected 	= $_POST['process_affected'];
		$machine_affected 	= $_POST['machine_affected']; 
		$red_alert 			= $_POST['red_alert'];
		$model 				= $_POST['model']; 
		$problem 			= $_POST['problem']; 
		$date_started 		= $_POST['date_started']; 
		$time_started 		= $_POST['time_started']; 
		$action_being_done 	= $_POST['action_being_done']; 
		$who 				= $_POST['who']; 
		$target_resumption 	= $_POST['target_resumption']; 
		$alert_remarks 		= $_POST['alert_remarks']; 
		// additional information
		$no_of_manpower 	= $_POST['no_of_manpower']; 
		$out_per_hour 	= $_POST['out_per_hour']; 
		$afctd_shipment_date 	= $_POST['afctd_shipment_date']; 
		$afctd_shipment_qty 	= $_POST['afctd_shipment_qty'];
		// $recipient_to 		= json_decode($_POST['recipient_to2']); 
		// $recipient_cc 		= json_decode($_POST['recipient_cc2']); 
		$primary_recipient_to 		= explode(",",$_POST['primary_recipient_to2']); 
		$primary_recipient_cc 		= explode(",",$_POST['primary_recipient_cc2']); 
		$secondary_recipient_to 	= explode(",",$_POST['secondary_recipient_to2']); 
		$secondary_recipient_cc 	= explode(",",$_POST['secondary_recipient_cc2']); 
		$username 			= $_POST['username']; 

		if($line_affected == 'N/A'){
			$msg = "Line Affected is required";

		}elseif ($error_category == 'N/A') {
			$msg = "Downtime Status is required";

		}elseif ($machine_affected == 'NULL') {
			$msg = "Please select Machine Affected";
		}
		else{
				//test start
				$array_fields = array('pkid');
				$table  	= "tbl_alert";	
				$joins 	  	='';
				$sql_where 	='WHERE line_affected ="'.$line_affected.'" AND machine_affected ="'.$machine_affected.'" AND red_alert = "'.$red_alert.'" AND status = "ON-GOING" AND logdel=0';
				$sql_order 	='';
				$sql_limit 	='LIMIT 0,1';	
				$validation_result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
				if($validation_result->num_rows == 0){
					$result 			= "";
					$table  			= "tbl_alert";		
					$array_fields 		= array('date_time_created','created_by','status','error_category',
												'send_interval','line_affected','machine_affected','red_alert','process_affected',
												'model','problem','date_started','time_started',
												'action_being_done','who','target_resumption',
												'date_time_last_sent','sec_date_time_last_sent','alert_remarks',
												'manpower_affected', 'output_per_hour', 'afctd_shipment_date', 'afctd_shipment_qty',
												'no_times_sent', 'lastupdate','username'); 
					$array_values 		= array($date_time_today,$username,'ON-GOING', $error_category,
												$send_interval, $line_affected, $machine_affected, $red_alert,$process_affected, 
												$model, $problem, $date_started, $time_started,
												$action_being_done, $who,$target_resumption,
												$date_time_today,$date_time_today,$alert_remarks,
												$no_of_manpower, $out_per_hour, $afctd_shipment_date, $afctd_shipment_qty,
												'1', $date_time_today,$username); 
					$fk_alert 			= ALERT::getInstance()->insert_query_id($table,$array_fields,$array_values);

					$pri_to = array();
					$pri_cc = array();
					foreach($primary_recipient_to as $rp_to) {
						array_push($pri_to, $rp_to);
					}
					foreach($primary_recipient_cc as $rp_cc) {
						array_push($pri_cc, $rp_cc);
					}
					$sec_to = array();
					$sec_cc = array();
					foreach($secondary_recipient_to as $rs_to) {
						array_push($sec_to, $rs_to);
					}	
					foreach($secondary_recipient_cc as $rs_cc) {
						array_push($sec_cc, $rs_cc);
					}	

					$primary_to 		 = implode(',',$pri_to);
					$primary_cc 		 = implode(',',$pri_cc);	
					$secondary_to 		 = implode(',',$sec_to);
					$secondary_cc 		 = implode(',',$sec_cc);	
					
					/* Record the recipients selected and send email notification after */
					$msg = add_alert_recipients_by_fkid($fk_alert,$primary_to,$primary_cc,$secondary_to,$secondary_cc,$username);
				} else {
					$msg				= 'ERROR! <br> Product Line Affected is currently ONGOING!';
				}

			}
		
		$return["msg"] 	= $msg;
		echo json_encode($return); 
		//test end
		
	}
	
	function add_alert_recipients_by_fkid($fk_alert,$primary_to,$primary_cc,$secondary_to,$secondary_cc,$username) {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$result 			= "";
		$table  			= "tbl_alert_recipients";
		$array_fields 		= array('date_time_created', 'created_by', 'fk_alert', 'primary_recipient_to', 'primary_recipient_cc', 'secondary_recipient_to', 'secondary_recipient_cc', 'lastupdate', 'username'); 
		$array_values 		= array($date_time_today,$username,$fk_alert,$primary_to, $primary_cc, $secondary_to, $secondary_cc, $date_time_today,$username); 
		$result 			= ALERT::getInstance()->insert_query($table,$array_fields,$array_values);
		
		/* Send email notification to assigned recipients */
		$msg = send_newly_created_template('NEW',$fk_alert);
		return $msg;
	}
	
	function send_newly_created_template($status,$fk_alert) {
		require_once('../class/oop.php'); 
		// require_once('../class/send_email.php');  //old
		require_once('../class/send_email_smtp.php'); 
		/* Select email content */
		$result = "";
		$array_fields = array('send_interval', 'line_affected', 'machine_affected', 'model', 'problem', 'date_started', 'time_started','date_finished','time_finished','action_being_done', 'who', 'target_resumption', 'alert_remarks');
		$table 	  	='tbl_alert';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$send_interval 		= $row['send_interval'];
			$line_affected 		= $row['line_affected'];
			$machine_affected 	= $row['machine_affected'];
			$model 				= $row['model'];
			$problem 			= $row['problem'];
			$date_started 		= $row['date_started'];
			$time_started 		= $row['time_started'];
			$action_being_done 	= $row['action_being_done'];
			$who 				= $row['who'];
			$target_resumption 	= $row['target_resumption'];
			$alert_remarks 		= $row['alert_remarks'];
			$downtime_duration 	= compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		/* Get email recipients */
		$result = "";
		$array_fields = array('primary_recipient_to','primary_recipient_cc','secondary_recipient_to','secondary_recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$primary_to 		= $row['primary_recipient_to'];
			$primary_cc 		= $row['primary_recipient_cc'];
			$secondary_to 		= $row['secondary_recipient_to'];
			$secondary_cc 		= $row['secondary_recipient_cc'];

			$recipient_to = $primary_to.','.$secondary_to;
			$recipient_cc = $primary_cc.','.$secondary_cc;
		}
		
		/* Construct email */
		$subject = '('.$status.' LINE ALERT) : LINE STOP '.$line_affected;
		$body	 = 'Line Affected : '.$line_affected.'<br>';
		$body	.= 'Machine Affected : '.$machine_affected.'<br>';
		$body	.= 'Model : '.$model.'<br>';
		$body	.= 'Problem : '.$problem.'<br>';
		$body	.= 'Date Started : '.($date_started == '' ? 'N/A' : date('M d, Y',strtotime($date_started)).'<br>');
		$body	.= 'Time Started : '.($time_started == '' ? 'N/A' : date('h:i:s a',strtotime($time_started)).'<br>');
		$body	.= 'Action Being Done : '.$action_being_done.'<br>';
		$body	.= 'Who : '.$who.'<br>';
		$body	.= 'Target Resumption :'.date('h:i A',strtotime($target_resumption)).'<br>';
		$body	.= 'Remarks :'.$alert_remarks.'<br>';
		$body	.= 'Downtime Duration :'.$downtime_duration.'<br>';
		
		$from 	 = 'CN LINE STOP ALERT';
		/* OLD
		$php_mailer = new email();
		$msg = $php_mailer->send_email($to, $from, $cc, $subject, $body,'');
		*/
		
		/* NEW START */
		$mail = new SENDMAILSMTP;
		$mail->set_smtp_parameters();
		$msg = $mail->email_with_no_attachment($recipient_to,$from,$recipient_cc,$subject,$body);
		/* NEW END */
		
		return $msg;
	}
	
	function update_line_alert() {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$pkid 				= $_POST['pkid']; 
		$error_category 	= $_POST['error_category']; 
		$send_interval 		= $_POST['send_interval']; 
		$line_affected 		= $_POST['line_affected']; 
		$process_affected 	= $_POST['process_affected'];
		$machine_affected 	= $_POST['machine_affected']; 
		$red_alert 			= $_POST['red_alert']; 
		$model 				= $_POST['model']; 
		$problem 			= $_POST['problem']; 
		$date_started 		= $_POST['date_started']; 
		$time_started 		= $_POST['time_started']; 
		$action_being_done 	= $_POST['action_being_done']; 
		$who 				= $_POST['who']; 
		$target_resumption 	= $_POST['target_resumption']; 
		$alert_remarks 		= $_POST['alert_remarks']; 
		$date_finished 		= isset($_POST['date_finished']) ? $_POST['date_finished'] : ''; 
		$time_finished 		= isset($_POST['time_finished']) ? $_POST['time_finished'] : ''; 
		$disposition 		= isset($_POST['disposition']) ? $_POST['disposition'] : ''; 
		$finish_remarks 	= isset($_POST['finish_remarks']) ? $_POST['finish_remarks'] : ''; 
		$primary_recipient_to 		= json_decode($_POST['primary_recipient_to2']); 
		$primary_recipient_cc 		= json_decode($_POST['primary_recipient_cc2']); 
		$secondary_recipient_to 	= json_decode($_POST['secondary_recipient_to2']); 
		$secondary_recipient_cc 	= json_decode($_POST['secondary_recipient_cc2']); 
		$username 			= $_POST['username']; 
		$result 			= "";
		$table  			= "tbl_alert";
		if($date_finished == '' && $time_finished == '' && $disposition == '') {
			$status = 'ON-GOING';
		} else {
			$status = 'CLOSED';
		}

		$proceed = 1;
		$script = '';
		if ($date_started == $date_finished){

			if ($time_finished < $time_started){
				$proceed = 0;
			}	
		}
		$return['msg1']	= $proceed;

		//test start

		//1st validation for updating alert
		$array_fields1 = array('pkid');
		$table1  	= "tbl_alert";	
		$joins1 	  	='';
		$sql_where1 	='WHERE line_affected ="'.$line_affected.'" AND red_alert = "'.$red_alert.'" AND status = "ON-GOING" AND logdel=0';
		$sql_order1 	='';
		$sql_limit1 	='LIMIT 0,1';	
		$validation_result1 = ALERT::getInstance()->select_query($array_fields1,$table1,$joins1,$sql_where1,$sql_order1,$sql_limit1);
		// $validation_result_fetched1 = mysqli_fetch_assoc($validation_result1);

		//2nd validation for updating alert
		$array_fields2 = array('pkid','line_affected');
		$table2 	= "tbl_alert";	
		$joins2 	  	='';
		$sql_where2 	='WHERE pkid ="'.$pkid.'" AND red_alert = "'.$red_alert.'" AND status = "ON-GOING" AND logdel=0';
		$sql_order2 	='';
		$sql_limit2 	='LIMIT 0,1';	
		$validation_result2 = ALERT::getInstance()->select_query($array_fields2,$table2,$joins2,$sql_where2,$sql_order2,$sql_limit2);
		$validation_result_fetched2 = mysqli_fetch_assoc($validation_result2);

		if($validation_result1->num_rows == 0 || $validation_result_fetched2['line_affected'] == $line_affected){
			if ($proceed == 1){
				$array_fields 		= array('status','error_category','send_interval','line_affected','machine_affected' ,'process_affected' ,'red_alert' ,'model','problem','date_started','time_started','action_being_done','who','target_resumption','date_finished', 'time_finished','disposition','finish_remarks','lastupdate','username'); 
				$array_values 		= array($status,$error_category,$send_interval, $line_affected, $machine_affected, $process_affected, $red_alert, $model, $problem, $date_started, $time_started, $action_being_done, $who, $target_resumption,$date_finished,$time_finished,$disposition,$finish_remarks,$date_time_today,$username); 
				$result 			= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
				$script 			= ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
			}
			
			$pri_to = array();
			foreach($primary_recipient_to as $r_pri_to) {
				array_push($pri_to, $r_pri_to);
			}
			$pri_cc = array();
			foreach($primary_recipient_cc as $r_pri_cc) {
				array_push($pri_cc, $r_pri_cc);
			}	
			$sec_to = array();
			foreach($secondary_recipient_to as $r_sec_to) {
				array_push($sec_to, $r_sec_to);
			}
			$sec_cc = array();
			foreach($secondary_recipient_cc as $r_sec_cc) {
				array_push($sec_cc, $r_sec_cc);
			}	
			$pri_to 		 = implode(',',$pri_to);
			$pri_cc 		 = implode(',',$pri_cc);	
			$sec_to 		 = implode(',',$sec_to);
			$sec_cc 		 = implode(',',$sec_cc);	
			
			$msg = update_line_alert_recipients($pkid,$pri_to,$pri_cc,$sec_to,$sec_cc,$username,$status);
		} else {
			$msg = 'ERROR! <br> Product Line Affected is currently ONGOING!';
		}
		//test end
		
		$return["msg"] 		= $msg;
		$return["script"] 	= $script;
		echo json_encode($return); 
	}
	
	function update_line_alert_recipients($fk_alert,$primary_recipient_to,$primary_recipient_cc,$secondary_recipient_to,$secondary_recipient_cc,$username,$status) {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$table  			= "tbl_alert_recipients";
		$array_fields 		= array('primary_recipient_to', 'primary_recipient_cc', 'secondary_recipient_to', 'secondary_recipient_cc', 'lastupdate', 'username'); 
		$array_values 		= array($primary_recipient_to, $primary_recipient_cc, $secondary_recipient_to, $secondary_recipient_cc, $date_time_today,$username); 
		$sql_where			= 'WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$msg	 			= ALERT::getInstance()->update_query_detailed($table,$array_fields,$array_values,$sql_where);
		if($status == 'ON-GOING') {
			/* Send email notification to assigned recipients */
			$msg = send_newly_created_template('REVISED',$fk_alert);
		} else {
			/* Send closed alert */
			$msg = send_closed_line_alert($fk_alert);
		}
		return $msg;
	}
	
	function send_closed_line_alert($fk_alert) {
		require_once('../class/oop.php'); 
		// require_once('../class/send_email.php'); 
		require_once('../class/send_email_smtp.php'); 
		/* Select email content */
		$result = "";
		$array_fields = array('status','send_interval', 'line_affected', 'machine_affected', 'model', 'problem', 'date_started', 'time_started', 'action_being_done', 'who', 'target_resumption','alert_remarks','date_finished', 'time_finished','disposition','finish_remarks');
		$table 	  	='tbl_alert';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$send_interval 		= $row['send_interval'];
			$line_affected 		= $row['line_affected'];
			$machine_affected 	= $row['machine_affected'];
			$model 				= $row['model'];
			$problem 			= $row['problem'];
			$date_started 		= $row['date_started'];
			$time_started 		= $row['time_started'];
			$action_being_done 	= $row['action_being_done'];
			$who 				= $row['who'];
			$target_resumption 	= $row['target_resumption'];
			$alert_remarks 		= $row['alert_remarks'];
			$date_finished 		= $row['date_finished'];
			$time_finished 		= $row['time_finished'];
			$disposition 		= $row['disposition'];
			$finish_remarks 	= $row['finish_remarks'];
			$downtime_duration 	= $row['status'] == 'ON-GOING' ? '-' : compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		/* Get email recipients */
		$result = "";
		$array_fields = array('primary_recipient_to','primary_recipient_cc','secondary_recipient_to','secondary_recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$primary_to 		= $row['primary_recipient_to'];
			$primary_cc 		= $row['primary_recipient_cc'];
			$secondary_to 		= $row['secondary_recipient_to'];
			$secondary_cc 		= $row['secondary_recipient_cc'];

			$recipient_to = $primary_to.$secondary_to;
			$recipient_cc = $primary_cc.$secondary_cc;
		}
		
		/* Construct email */
		$subject = '(CLOSED LINE ALERT) : LINE STOP '.$line_affected.' '.date('h A').' '.date('M d, Y');
		$body	 = 'Line Affected : '.$line_affected.'<br>';
		$body	.= 'Machine Affected : '.$machine_affected.'<br>';
		$body	.= 'Model : '.$model.'<br>';
		$body	.= 'Problem : '.$problem.'<br>';
		$body	.= 'Date Started : '.($date_started == '' ? 'N/A' : date('M d, Y',strtotime($date_started)).'<br>');
		$body	.= 'Time Started : '.($time_started == '' ? 'N/A' : date('h:i:s a',strtotime($time_started)).'<br>');
		$body	.= 'Action Being Done : '.$action_being_done.'<br>';
		$body	.= 'Who : '.$who.'<br>';
		$body	.= 'Target Resumption :'.$target_resumption.'<br>';
		$body	.= 'Remarks :'.$alert_remarks.'<br>';
		$body	.= 'Date Finished :'.$date_finished == '' ? 'N/A' : date('M d, Y',strtotime($date_finished)).'<br>';
		$body	.= 'Time Finished :'.$time_finished == '' ? 'N/A' : date('h:i:s a',strtotime($time_finished)).'<br>';
		$body	.= 'Disposition :'.$disposition.'<br>';
		$body	.= 'Remarks :'.$finish_remarks.'<br>';
		$body	.= 'Downtime Duration :'.$downtime_duration.'<br>';
		
		$from 	 = 'CN LINE STOP ALERT';
		/* OLD
		$php_mailer = new email();
		$msg = $php_mailer->send_email($to, $from, $cc, $subject, $body,'');
		*/
		/* NEW START */
		$mail = new SENDMAILSMTP;
		$mail->set_smtp_parameters();
		$msg = $mail->email_with_no_attachment($recipient_to,$from,$recipient_cc,$subject,$body);
		/* NEW END */
		return $msg;
	}
	
	function send_hourly_line_alert($fk_alert) {
		require_once('../class/oop.php'); 
		// require_once('../class/send_email.php');  //old
		require_once('../class/send_email_smtp.php');  
		/* Select email content */
		$result = "";
		$array_fields = array('status','send_interval', 'line_affected', 'machine_affected', 'model', 'problem', 'date_started', 'time_started', 'action_being_done', 'who', 'target_resumption','alert_remarks','date_finished', 'time_finished','disposition','finish_remarks');
		$table 	  	='tbl_alert';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$send_interval 		= $row['send_interval'];
			$line_affected 		= $row['line_affected'];
			$machine_affected 	= $row['machine_affected'];
			$model 				= $row['model'];
			$problem 			= $row['problem'];
			$date_started 		= $row['date_started'];
			$time_started 		= $row['time_started'];
			$action_being_done 	= $row['action_being_done'];
			$who 				= $row['who'];
			$target_resumption 	= $row['target_resumption'];
			$alert_remarks 		= $row['alert_remarks'];
			$date_finished 		= $row['date_finished'];
			$time_finished 		= $row['time_finished'];
			$disposition 		= $row['disposition'];
			$finish_remarks 	= $row['finish_remarks'];
			$downtime_duration 	= compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		/* Get email recipients */
		$result = "";
		$array_fields = array('primary_recipient_to','primary_recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to 		= $row['primary_recipient_to'];
			$cc 		= $row['primary_recipient_cc'];
			// $to 		= 'cdcasuyon@pricon.ph';
			// $cc 		= 'mclegaspi@pricon.ph';
		}
		/* Construct email */
		$subject = 'LINE STOP '.$line_affected.' '.date('h A').' '.date('M d, Y');
		$body	 = 'Line Affected : '.$line_affected.'<br>';
		$body	.= 'Machine Affected : '.$machine_affected.'<br>';
		$body	.= 'Model : '.$model.'<br>';
		$body	.= 'Problem : '.$problem.'<br>';
		$body	.= 'Date Started : '.($date_started == '' ? 'N/A' : date('M d, Y',strtotime($date_started)).'<br>');
		$body	.= 'Time Started : '.($time_started == '' ? 'N/A' : date('h:i:s a',strtotime($time_started)).'<br>');
		$body	.= 'Action Being Done : '.$action_being_done.'<br>';
		$body	.= 'Who : '.$who.'<br>';
		$body	.= 'Target Resumption :'.$target_resumption.'<br>';
		$body	.= 'Remarks :'.$alert_remarks.'<br>';
		$body	.= 'Date Finished :'.($date_finished == '' ? 'N/A <br>' : date('M d, Y',strtotime($date_finished)).'<br>');
		$body	.= 'Time Finished :'.($time_finished == '' ? 'N/A <br>' : date('h:i:s a',strtotime($time_finished)).'<br>');
		$body	.= 'Disposition :'.$disposition.'<br>';
		$body	.= 'Remarks :'.$finish_remarks.'<br>';
		$body	.= 'Downtime Duration :'.$downtime_duration.'<br>';
		
		$from 	 = 'CN LINE STOP ALERT';
		/* OLD
		$php_mailer = new email();
		$msg = $php_mailer->send_email($to, $from, $cc, $subject, $body,'');
		*/

		/* NEW START */
		$mail = new SENDMAILSMTP;
		$mail->set_smtp_parameters();
		$msg = $mail->email_with_no_attachment($to,$from,$cc,$subject,$body);
		/* NEW END */
		return $msg;
	}

	function send_hourly_interval_line_alert($fk_alert) {
		require_once('../class/oop.php'); 
		// require_once('../class/send_email.php');  //old
		require_once('../class/send_email_smtp.php');  
		/* Select email content */
		$result = "";
		$array_fields = array('status','send_interval', 'line_affected', 'machine_affected', 'model', 'problem', 'date_started', 'time_started', 'action_being_done', 'who', 'target_resumption','alert_remarks','date_finished', 'time_finished','disposition','finish_remarks');
		$table 	  	='tbl_alert';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$send_interval 		= $row['send_interval'];
			$line_affected 		= $row['line_affected'];
			$machine_affected 	= $row['machine_affected'];
			$model 				= $row['model'];
			$problem 			= $row['problem'];
			$date_started 		= $row['date_started'];
			$time_started 		= $row['time_started'];
			$action_being_done 	= $row['action_being_done'];
			$who 				= $row['who'];
			$target_resumption 	= $row['target_resumption'];
			$alert_remarks 		= $row['alert_remarks'];
			$date_finished 		= $row['date_finished'];
			$time_finished 		= $row['time_finished'];
			$disposition 		= $row['disposition'];
			$finish_remarks 	= $row['finish_remarks'];
			$downtime_duration 	= compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		/* Get email recipients */
		$result = "";
		$array_fields = array('secondary_recipient_to','secondary_recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to 		= $row['secondary_recipient_to'];
			$cc 		= $row['secondary_recipient_cc'];
			// $to 		= 'cdcasuyon@pricon.ph';
			// $cc 		= 'mclegaspi@pricon.ph';
		}
		/* Construct email */
		$subject = 'LINE STOP '.$line_affected.' '.date('h A').' '.date('M d, Y');
		$body	 = 'Line Affected : '.$line_affected.'<br>';
		$body	.= 'Machine Affected : '.$machine_affected.'<br>';
		$body	.= 'Model : '.$model.'<br>';
		$body	.= 'Problem : '.$problem.'<br>';
		$body	.= 'Date Started : '.($date_started == '' ? 'N/A' : date('M d, Y',strtotime($date_started)).'<br>');
		$body	.= 'Time Started : '.($time_started == '' ? 'N/A' : date('h:i:s a',strtotime($time_started)).'<br>');
		$body	.= 'Action Being Done : '.$action_being_done.'<br>';
		$body	.= 'Who : '.$who.'<br>';
		$body	.= 'Target Resumption :'.$target_resumption.'<br>';
		$body	.= 'Remarks :'.$alert_remarks.'<br>';
		$body	.= 'Date Finished :'.($date_finished == '' ? 'N/A <br>' : date('M d, Y',strtotime($date_finished)).'<br>');
		$body	.= 'Time Finished :'.($time_finished == '' ? 'N/A <br>' : date('h:i:s a',strtotime($time_finished)).'<br>');
		$body	.= 'Disposition :'.$disposition.'<br>';
		$body	.= 'Remarks :'.$finish_remarks.'<br>';
		$body	.= 'Downtime Duration :'.$downtime_duration.'<br>';
		
		$from 	 = 'CN LINE STOP ALERT';
		/* OLD
		$php_mailer = new email();
		$msg = $php_mailer->send_email($to, $from, $cc, $subject, $body,'');
		*/
		
		/* NEW START */
		$mail = new SENDMAILSMTP;
		$mail->set_smtp_parameters();
		$msg = $mail->email_with_no_attachment($to,$from,$cc,$subject,$body);
		/* NEW END */
		return $msg;
	}
	
	function get_ongoing_alert(){
		require_once('../class/oop.php'); 
		$result = "";
		$array_fields = array('*');
		$table 	  	='vw_ongoing_alerts';
		$joins 	  	='';
		$sql_where 	='';
		$sql_order 	='';
		$sql_limit 	='';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return = array();
		$html 	= '';
		while( $row = mysqli_fetch_array($result) ){
			$html .= '<tr>';
			$html .= '	<td>'.$row['line_affected'].'</td>';
			$html .= '	<td>'.$row['machine_affected'].'</td>';
			$html .= '	<td>'.$row['status'].'</td>';
			$html .= '	<td>'.$row['date_time_last_sent'].'</td>';
			// hidden for display purposes
			$html .= '	<td>'.$row['sec_date_time_last_sent'].'</td>';
			$html .= '	<td>'.$row['send_interval'].'</td>';
			$html .= '	<td>'.$row['no_times_sent'].'</td>';
			$date_time_last_sent = strtotime($row['date_time_last_sent']);
			$date_time_last_sent_2 = strtotime($row['sec_date_time_last_sent']);
			
			$date_time_today = strtotime(date('Y-m-d H:i:s'));
			// $one_hour = 60*60; //60 seconds * 60
			$one_hour = 60*60; //60 seconds * 60
			$interval = $one_hour * 1; // 1 is for the default interval of 1 hour
			$interval_2 = $one_hour * $row['send_interval']; //user defined interval - minimum 2 hours
			$send = 'not yet';
				// send to primary
				if( ($date_time_today - $date_time_last_sent) >= $interval ){
					$send = 'send';
					// stop email
					send_hourly_line_alert($row['pkid']);			
					update_date_time_last_sent($row['pkid'],$row['no_times_sent']);
				}
				// send to secondary
				if( ($date_time_today - $date_time_last_sent_2) >= $interval_2 ){
					$send = 'send';
					// stop email
					send_hourly_interval_line_alert($row['pkid']);
					update_sec_date_time_last_sent($row['pkid']);			
				}
				// update date/time last sent
			
			$html .= '	<td>'.(int)(($date_time_today - $date_time_last_sent) / 60).' minutes passed '.$send.'</td>';
			$html .= '</tr>';
		}
		$return['html'] = $html;
		echo json_encode($return);
	}
	
	function update_date_time_last_sent($pkid,$no_times_sent){
		require_once('../class/oop.php'); 
		$result 	  = '';
		$table 		  = 'tbl_alert';
		$array_fields = array(	
								'date_time_last_sent',
								'no_times_sent'
							 );
		$array_values = array(
								date('Y-m-d H:i:s'),
								($no_times_sent+1)
							 );
		$pkid 		  = $pkid;
		$result = ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		// $result = ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		return true;
	}

	function update_sec_date_time_last_sent($pkid){
		require_once('../class/oop.php'); 
		$result 	  = '';
		$table 		  = 'tbl_alert';
		$array_fields = array(	
								'sec_date_time_last_sent'
							 );
		$array_values = array(
								date('Y-m-d H:i:s')
							 );
		$pkid 		  = $pkid;
		$result = ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		// $result = ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		return true;
	}
	
	function get_recipient_lists() {
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('CONCAT(firstname," ",lastname) as emp_name', 'email_add');
		$table 	  	='db_hris.vw_emp_hris';
		$joins 	  	='';
		$sql_where 	='WHERE EmpStatus=1 AND (email_add != NULL OR email_add != "kiosk@pricon.ph")';
		$sql_order 	='';
		$sql_limit 	='';
		$html_select= '';
		$result = SYS1::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result)){
			$html_select .= '<option value="'.$row['email_add'].'">'.$row['emp_name'].'</option>';
		}
		// SELECT `name`, `email_add` FROM `tbl_useraccounts` WHERE 
		$array_fields = array('name as emp_name', 'email_add');
		$table 	  	='db_rapid.tbl_useraccounts';
		$joins 	  	='';
		$sql_where 	="WHERE `emp_type`='Subcon Hired' AND (`email_add` != '' AND email_add != 'kiosk@pricon.ph')";
		$sql_order 	='';
		$sql_limit 	='';
		$result2 = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result2)){
			$html_select .= '<option value="'.$row['email_add'].'">'.$row['emp_name'].'</option>';
		}
		$return['html_select']	 = $html_select;
		$return['script']	 = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function get_machine_affected_lists() {
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('machine_name');
		$table 	  	='db_eedms_v2.generallogistics';
		$joins 	  	='';
		$sql_where 	='WHERE machine_section = "CN" AND g_logdel = 0' ;
		$sql_order 	='';
		$sql_limit 	='';
		$html_select= '';
		$result2 = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result2)){
			$html_select .= '<option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>';
		}
		$return['html_select']	 = $html_select;
		$return['script']	 = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function get_product_line_lists() {
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$html_select= '';
		$array_fields = array('product_name');
		$table 	  	='tbl_product_line';
		$joins 	  	='';
		$sql_where 	="WHERE logdel=0";
		$sql_order 	='';
		$sql_limit 	='';
		$result2 = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result2)){
			$html_select .= '<option value="'.$row['product_name'].'">'.$row['product_name'].'</option>';
		}
		$return['html_select']	 = $html_select;
		$return['script']	 = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function get_modelbyline_affected(){
        require_once('../class/oop.php'); 
		$return 		= $_POST;
		$result 		= "";
		$html_select	= '';
		$array_fields 	= array('model');
		$table 	  		='tbl_model';
		$joins 	  		='';
		$sql_where 		="WHERE pk_product_name = '".$return['line_affected']."' AND logdel=0";
		$sql_order 		='';
		$sql_limit 		='';
		$result2    	= ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script    	 	= ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result2)){
			$html_select .= '<option value="'.$row['model'].'">'.$row['model'].'</option>';
		}
		$return['html_select']	 = $html_select;
		$return['script']	 = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
    }

	// function get_modelbyline_affected(){
    //     require_once('../class/oop.php'); 
	// 	$return 		= $_POST;
	// 	$result 		= "";
	// 	$html_select	= '';
	// 	$array_fields 	= array('model');
	// 	$table 	  		='tbl_model';
	// 	$joins 	  		='';
	// 	$sql_where 		="WHERE pk_product_name = '".$return['line_affected']."' AND logdel=0";
	// 	$sql_order 		='';
	// 	$sql_limit 		='';
	// 	$result2    	= ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	// 	$script    	 	= ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	// 	$ctr 	    	= 0;
	// 	while($row = mysqli_fetch_array($result2)){
	// 		$return['model_name'][$ctr]   = $row['model'];
	// 		$ctr++;
			
	// 	}

	// 	$return['script']	 = $script;
	// 	$return['ctr']	  	= $ctr;
	// 	echo json_encode($return);
    // }

	function return_model(){
        require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$html_select= '';
		$array_fields = array('model');
		$table 	  	='tbl_model';
		$joins 	  	='';
		$sql_where 	="WHERE logdel=0";
		$sql_order 	='';
		$sql_limit 	='';
		$result2 = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result2)){
			$html_select .= '<option value="'.$row['model'].'">'.$row['model'].'</option>';
		}
		$return['html_select']	 = $html_select;
		$return['script']	 = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
    }
	
	function return_alert_details_by_id() {
		require_once('../class/oop.php'); 
		$fk_alert	= $_POST['pkid'];
		/* Select email content */
		$result = "";
		$array_fields = array('status','error_category','send_interval', 'line_affected', 'machine_affected','red_alert','process_affected', 'model', 'problem', 'date_started', 'time_started', 'action_being_done', 'who', 'target_resumption', 'alert_remarks', 'manpower_affected', 'output_per_hour', 'afctd_shipment_date', 'afctd_shipment_qty', 'date_finished','time_finished','disposition','finish_remarks');
		$table 	  	='tbl_alert';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$return['status'] 				= $row['status'];
			$return['error_category'] 		= $row['error_category'];
			$return['send_interval'] 		= $row['send_interval'];
			$return['line_affected'] 		= $row['line_affected'];
			$return['process_affected'] 	= $row['process_affected'];
			$return['machine_affected'] 	= $row['machine_affected'];
			$return['red_alert'] 			= $row['red_alert'];
			$return['model'] 				= $row['model'];
			$return['problem'] 				= $row['problem'];
			$return['date_started'] 		= $row['date_started'];
			$return['time_started'] 		= $row['time_started'];
			$return['action_being_done'] 	= $row['action_being_done'];
			$return['who'] 					= $row['who'];
			$return['target_resumption'] 	= $row['target_resumption'];
			$return['alert_remarks'] 		= $row['alert_remarks'];
			$return['manpower_affected'] 	= $row['manpower_affected'];
			$return['output_per_hour'] 		= $row['output_per_hour'];
			$return['afctd_shipment_date'] 	= $row['afctd_shipment_date'];
			$return['afctd_shipment_qty'] 	= $row['afctd_shipment_qty'];
			$return['date_finished'] 		= $row['date_finished'];
			$return['time_finished'] 		= $row['time_finished'];
			$return['disposition'] 			= $row['disposition'];
			$return['finish_remarks'] 		= $row['finish_remarks'];
			$return['equivalent_manhours'] 		= $row['status'] == 'ON-GOING' ? '-' : compute_equiv_manhours(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']),($row['manpower_affected']));
			$return['equivalent_output_loss'] 	= $row['status'] == 'ON-GOING' ? '-' : compute_equiv_output_loss(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']),($row['output_per_hour']));
			$return['downtime_duration'] 	= $row['status'] == 'ON-GOING' ? '-' : compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function return_prod_line_details_by_id() {
		require_once('../class/oop.php'); 
		$fk_prod_line	= $_POST['pkid'];
		/* Select email content */
		$result = "";
		$array_fields = array('product_name','line_number', 'category', 'sat', 'production_type', 'area', 'person_in_charge');
		$table 	  	='tbl_product_line';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_prod_line;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$return['product_name'] 		= $row['product_name'];
			$return['line_number'] 			= $row['line_number'];
			$return['category'] 			= $row['category'];
			$return['sat'] 					= $row['sat'];
			$return['production_type'] 		= $row['production_type'];
			$return['area'] 				= $row['area'];
			$return['person_in_charge'] 	= $row['person_in_charge'];
			}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function return_model_details_by_id() {
		require_once('../class/oop.php'); 
		$fk_id_model	= $_POST['pkid'];
		/* Select email content */
		$result = "";
		$array_fields = array('pk_product_name','model');
		$table 	  	='tbl_model';
		$joins 	  	='';
		$sql_where 	='WHERE pkid='.$fk_id_model;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$return['pk_product_name'] 		= $row['pk_product_name'];
			$return['model'] 				= $row['model'];
			}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function return_alert_recipients_by_fkalert() {
		require_once('../class/oop.php'); 
		$fk_alert = $_POST['pkid'];
		/* Select email content */
		$result = "";
		$array_fields = array('primary_recipient_to','primary_recipient_cc','secondary_recipient_to','secondary_recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$pri_to_array = array();
			$pri_recipient_to = explode(',',$row['primary_recipient_to']);
			for($i=0;$i<count($pri_recipient_to);$i++) {
				array_push($pri_to_array, $pri_recipient_to[$i]);
			}
			$pri_cc_array = array();
			$pri_recipient_cc = explode(',',$row['primary_recipient_cc']);
			for($i=0;$i<count($pri_recipient_cc);$i++) {
				array_push($pri_cc_array, $pri_recipient_cc[$i]);
			}
			// 
			$sec_to_array = array();
			$sec_recipient_to = explode(',',$row['secondary_recipient_to']);
			for($i=0;$i<count($sec_recipient_to);$i++) {
				array_push($sec_to_array, $sec_recipient_to[$i]);
			}
			$sec_cc_array = array();
			$sec_recipient_cc = explode(',',$row['secondary_recipient_cc']);
			for($i=0;$i<count($sec_recipient_cc);$i++) {
				array_push($sec_cc_array, $sec_recipient_cc[$i]);
			}
			// 
			$return['pri_recipient_to'] 	= $pri_to_array;
			$return['pri_recipient_cc'] 	= $pri_cc_array;
			$return['sec_recipient_to'] 	= $sec_to_array;
			$return['sec_recipient_cc'] 	= $sec_cc_array;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function return_recipients_template() {
		require_once('../class/oop.php'); 
		$result = "";
		$array_fields = array('recipients_template', 'recipients_username_to', 'recipients_username_cc');
		$table 	  	='tbl_recipients_template';
		$joins 	  	='';
		$sql_where 	='WHERE logdel=0';
		$sql_order 	='';
		$sql_limit 	='';
		$table_body	= '';
		$to_bagde	= '';
		$cc_bagde	= '';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result)){
			$to_bagde	= '';
			$cc_bagde	= '';
			$recipients_template = $row['recipients_template'];
			$recipients_username_to = explode(',',$row['recipients_username_to']);
			for($i=0;$i<count($recipients_username_to);$i++) {
				$to_bagde .= '<span class="badge">'.$recipients_username_to[$i].'</span>,';
			}
			$recipients_username_cc = explode(',',$row['recipients_username_cc']);
			for($i=0;$i<count($recipients_username_cc);$i++) {
				$cc_bagde .= '<span class="badge">'.$recipients_username_cc[$i].'</span>,';
			}
			$table_body .= '<tr>';
			$table_body .= '	<td>'.$recipients_template.'</td>';
			$table_body .= '	<td>'.$to_bagde.'</td>';
			$table_body .= '	<td>'.$cc_bagde.'</td>';
			$table_body .= '</tr>';
		}
		$return['table_body'] = $table_body;
		echo json_encode($return);
	}

	function compute_equiv_manhours($date_time_finished, $date_time_started, $manpower_affected) {
		$date_time_finished = date('Y-m-d H:i:s',strtotime($date_time_finished));
		$date_time_started = date('Y-m-d H:i:s',strtotime($date_time_started));
		$no_of_manpower = $manpower_affected;

        $finish = strtotime($date_time_finished);
        $start  = strtotime($date_time_started);

        $diff = ($finish - $start)* $no_of_manpower;

        $diff_in_min = $diff / 60;
        $diff_in_min = explode(".",$diff_in_min);
        /* get the minute difference */
        $diff_in_min = $diff_in_min[0];

        /* get difference in hour */
        $diff_in_hour = $diff_in_min / 60 ;

        $diff_in_min = $diff_in_min % 60;

        $diff_in_hour = explode(".",$diff_in_hour);
        $diff_in_hour = $diff_in_hour[0];

        $equiv_manhours = $diff_in_hour . ' hr/s '.$diff_in_min.' min/s ';
        // $equiv_manhours = $diff_in_hour . ' hr/s '.$diff_in_min.' min/s ';
        return $equiv_manhours;
    }

	function compute_equiv_output_loss($date_time_finished, $date_time_started, $out_per_hour) {
		$date_time_finished = date('Y-m-d H:i:s',strtotime($date_time_finished));
		$date_time_started = date('Y-m-d H:i:s',strtotime($date_time_started));

        $finish = strtotime($date_time_finished);
        $start  = strtotime($date_time_started);

        $diff = ($finish - $start) * $out_per_hour;

        $diff_in_min = $diff / 60;
        $diff_in_min = explode(".",$diff_in_min);
        /* get the minute difference */
        $diff_in_min = $diff_in_min[0];

        /* get difference in hour */
        $diff_in_hour = $diff_in_min / 60 ;

        $diff_in_min = $diff_in_min % 60;

        $diff_in_hour = explode(".",$diff_in_hour);
        $diff_in_hour = $diff_in_hour[0];

        $output_loss = $diff_in_hour.'.'.$diff_in_min;
        return $output_loss;
    }
	
	function compute_downtime_duration($date_time_finished, $date_time_started) {
		$date_time_finished = date('Y-m-d H:i:s',strtotime($date_time_finished));
		$date_time_started = date('Y-m-d H:i:s',strtotime($date_time_started));
        $finish = strtotime($date_time_finished);
        $start  = strtotime($date_time_started);

        $diff = $finish - $start;

        $diff_in_min = $diff / 60;
        $diff_in_min = explode(".",$diff_in_min);
        /* get the minute difference */
        $diff_in_min = $diff_in_min[0];

        /* get difference in hour */
        $diff_in_hour = $diff_in_min / 60 ;

        $diff_in_min = $diff_in_min % 60;

        $diff_in_hour = explode(".",$diff_in_hour);
        $diff_in_hour = $diff_in_hour[0];

        $downtime_duration = $diff_in_hour . ' hr/s '.$diff_in_min.' min/s ';
        return $downtime_duration;
    }
	
	
?>