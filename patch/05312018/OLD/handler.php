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
				case "update_line_alert" 							: update_line_alert(); break; 
				case "close_line_alert" 							: close_line_alert(); break; 
				
				case "get_recipient_lists" 							: get_recipient_lists(); break; 
				case "return_alert_details_by_id" 					: return_alert_details_by_id(); break; 
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
		$date_time_today	= date('Y-m-d H:i:s');
		$send_interval 		= $_POST['send_interval']; 
		$line_affected 		= $_POST['line_affected']; 
		$machine_affected 	= $_POST['machine_affected']; 
		$model 				= $_POST['model']; 
		$problem 			= $_POST['problem']; 
		$date_started 		= $_POST['date_started']; 
		$time_started 		= $_POST['time_started']; 
		$action_being_done 	= $_POST['action_being_done']; 
		$who 				= $_POST['who']; 
		$target_resumption 	= $_POST['target_resumption']; 
		$alert_remarks 		= $_POST['alert_remarks']; 
		// $recipient_to 		= json_decode($_POST['recipient_to2']); 
		// $recipient_cc 		= json_decode($_POST['recipient_cc2']); 
		$recipient_to 		= explode(",",$_POST['recipient_to2']); 
		$recipient_cc 		= explode(",",$_POST['recipient_cc2']); 
		$username 			= $_POST['username']; 
		$result 			= "";
		$table  			= "tbl_alert";		
		$array_fields 		= array('date_time_created','created_by','status',
									'send_interval','line_affected','machine_affected',
									'model','problem','date_started','time_started',
									'action_being_done','who','target_resumption',
									'date_time_last_sent','alert_remarks', 'no_times_sent',
									'lastupdate','username'); 
		$array_values 		= array($date_time_today,$username,'ON-GOING',
									$send_interval, $line_affected, $machine_affected, 
									$model, $problem, $date_started, $time_started,
									$action_being_done, $who,$target_resumption,
									$date_time_today,$alert_remarks,'1',
									$date_time_today,$username); 
		$fk_alert 			= ALERT::getInstance()->insert_query_id($table,$array_fields,$array_values);

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
		
		/* Record the recipients selected and send email notification after */
		$msg = add_alert_recipients_by_fkid($fk_alert,$to,$cc,$username);
		$return["msg"] 	= $msg;
		echo json_encode($return); 
	}
	
	function add_alert_recipients_by_fkid($fk_alert,$recipient_to,$recipient_cc,$username) {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$result 			= "";
		$table  			= "tbl_alert_recipients";
		$array_fields 		= array('date_time_created', 'created_by', 'fk_alert', 'recipient_to', 'recipient_cc', 'lastupdate', 'username'); 
		$array_values 		= array($date_time_today,$username,$fk_alert,$recipient_to, $recipient_cc, $date_time_today,$username); 
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
		$array_fields = array('recipient_to','recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to 		= $row['recipient_to'];
			$cc 		= $row['recipient_cc'];
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
		$msg = $mail->email_with_no_attachment($to,$from,$cc,$subject,$body);
		/* NEW END */
		
		return $msg;
	}
	
	function update_line_alert() {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$pkid 				= $_POST['pkid']; 
		$send_interval 		= $_POST['send_interval']; 
		$line_affected 		= $_POST['line_affected']; 
		$machine_affected 	= $_POST['machine_affected']; 
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
		$recipient_to 		= json_decode($_POST['recipient_to2']); 
		$recipient_cc 		= json_decode($_POST['recipient_cc2']); 
		$username 			= $_POST['username']; 
		$result 			= "";
		$table  			= "tbl_alert";
		if($date_finished == '' && $time_finished == '' && $disposition == '') {
			$status = 'ON-GOING';
		} else {
			$status = 'CLOSED';
		}		
		$array_fields 		= array('status','send_interval','line_affected','machine_affected','model','problem','date_started','time_started','action_being_done','who','target_resumption','date_finished', 'time_finished','disposition','finish_remarks','lastupdate','username'); 
		$array_values 		= array($status,$send_interval, $line_affected, $machine_affected, $model, $problem, $date_started, $time_started, $action_being_done, $who, $target_resumption,$date_finished,$time_finished,$disposition,$finish_remarks,$date_time_today,$username); 
		$result 			= ALERT::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 			= ALERT::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
	
		
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
		
		$msg = update_line_alert_recipients($pkid,$to,$cc,$username,$status);
		
		$return["msg"] 		= $msg;
		$return["script"] 	= $script;
		echo json_encode($return); 
	}
	
	function update_line_alert_recipients($fk_alert,$recipient_to,$recipient_cc,$username,$status) {
		require_once('../class/oop.php'); 
		$date_time_today	= date('Y-m-d H:i:s');
		$table  			= "tbl_alert_recipients";
		$array_fields 		= array('recipient_to', 'recipient_cc', 'lastupdate', 'username'); 
		$array_values 		= array($recipient_to, $recipient_cc, $date_time_today,$username); 
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
		$array_fields = array('recipient_to','recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to 		= $row['recipient_to'];
			$cc 		= $row['recipient_cc'];
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
		$msg = $mail->email_with_no_attachment($to,$from,$cc,$subject,$body);
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
		$array_fields = array('recipient_to','recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert.' AND logdel=0';
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to 		= $row['recipient_to'];
			$cc 		= $row['recipient_cc'];
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
		$table 	  	='vw_ongoing_alert';
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
			$html .= '	<td>'.$row['send_interval'].'</td>';
			$html .= '	<td>'.$row['no_times_sent'].'</td>';
			$date_time_last_sent = strtotime($row['date_time_last_sent']);
			$date_time_today = strtotime(date('Y-m-d H:i:s'));
			$one_hour = 60*60; //60 seconds * 60
			$interval = $one_hour * $row['send_interval'];
			$send = 'not yet';
			if( ($date_time_today - $date_time_last_sent) > $interval ){
				$send = 'send';
				update_date_time_last_sent($row['pkid'],$row['no_times_sent']);
				send_hourly_line_alert($row['pkid']);			
			}
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
		$return['html_select']	 = $html_select;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function return_alert_details_by_id() {
		require_once('../class/oop.php'); 
		$fk_alert	= $_POST['pkid'];
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
			$return['status'] 				= $row['status'];
			$return['send_interval'] 		= $row['send_interval'];
			$return['line_affected'] 		= $row['line_affected'];
			$return['machine_affected'] 	= $row['machine_affected'];
			$return['model'] 				= $row['model'];
			$return['problem'] 				= $row['problem'];
			$return['date_started'] 		= $row['date_started'];
			$return['time_started'] 		= $row['time_started'];
			$return['action_being_done'] 	= $row['action_being_done'];
			$return['who'] 					= $row['who'];
			$return['target_resumption'] 	= $row['target_resumption'];
			$return['alert_remarks'] 		= $row['alert_remarks'];
			$return['date_finished'] 		= $row['date_finished'];
			$return['time_finished'] 		= $row['time_finished'];
			$return['disposition'] 			= $row['disposition'];
			$return['finish_remarks'] 		= $row['finish_remarks'];
			$return['downtime_duration'] 	= $row['status'] == 'ON-GOING' ? '-' : compute_downtime_duration(($row['date_finished'].' '.$row['time_finished']),($row['date_started'].' '.$row['time_started']));
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function return_alert_recipients_by_fkalert() {
		require_once('../class/oop.php'); 
		$fk_alert = $_POST['pkid'];
		/* Select email content */
		$result = "";
		$array_fields = array('recipient_to','recipient_cc');
		$table 	  	='tbl_alert_recipients';
		$joins 	  	='';
		$sql_where 	='WHERE fk_alert='.$fk_alert;
		$sql_order 	='';
		$sql_limit 	='LIMIT 0,1';
		$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)){
			$to_array = array();
			$recipient_to = explode(',',$row['recipient_to']);
			for($i=0;$i<count($recipient_to);$i++) {
				array_push($to_array, $recipient_to[$i]);
			}
			$cc_array = array();
			$recipient_cc = explode(',',$row['recipient_cc']);
			for($i=0;$i<count($recipient_cc);$i++) {
				array_push($cc_array, $recipient_cc[$i]);
			}
			$return['recipient_to'] 	= $to_array;
			$return['recipient_cc'] 	= $cc_array;
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