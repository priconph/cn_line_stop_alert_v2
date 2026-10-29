<?php
//Set Class name here, it's a good practice to Capitalize the first letter, I've just read it somewhere on the internet... so its up to you if will follow...
class ALERT extends mysqli 
{
	private static $instance = null;
	
	public static function getInstance() {
		if(!self::$instance instanceof self) 
		{
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function __clone()
	{
		trigger_error('Clone is not allowed.',E_USER_ERROR);
	}
	
	public function __wakeup()
	{
		trigger_error('Deserializing is not allowed.',E_USER_ERROR);
	}
	
	private function __construct() {
		$path = '../db_config/';
		if(file_exists($path.'config.php')){
			include($path.'config.php');
		}else{
			$path = 'db_config/';
			include($path.'config.php');
		}		
		parent::__construct($server, $username, $password, $db_name);
		
		if(mysqli_connect_error())
		{
			exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		parent::set_charset('utf-8');
	}

	////////////////////////////////////UP TO HERE////////////////////////////////////////
	
	////////////////////////////////////PUBLIC FUNCTIONS STARTS HERE//////////////////////////////////////////////
	public function select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return $this->query($query);
	}

	public function select_query_PER($startDate,$endDate){
		$query = "SELECT `t1`.`time_started`,`t1`.`time_finished`,`t1`.`error_category` FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t1.logdel = 0 AND `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` BETWEEN '$startDate' AND '$endDate' AND `time_started` >= '07:30') OR (`date_finished` BETWEEN '$startDate' AND '$endDate' AND `time_finished` <= '07:30'))";
		return $this->query($query);
	}

	public function select_query_PER1($start,$end){
		$query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end' AND `time_started` >= '07:30' AND `red_alert` != 'RED-ALERT')) ORDER BY `t1`.`date_started` ASC ";
		// $query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE `t1`.`pkid` IN (SELECT MAX(`pkid`) FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end')) ORDER BY `t1`.`date_started` ASC ";
		return $this->query($query);
	}

	public function select_query_PER1_test($product_name,$start,$end){
		$query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE `t1`.`pkid` IN (SELECT MAX(`pkid`) FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end' AND `time_started` >= '07:30' AND `red_alert` != 'RED-ALERT')) ORDER BY `t1`.`date_started` ASC ";
		// $query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE `t1`.`pkid` IN (SELECT MAX(`pkid`) FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end')) ORDER BY `t1`.`date_started` ASC ";
		return $this->query($query);
	}

	public function select_query_PER2($product_name_for_PER2,$start,$end){
		$query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t2.product_name = '$product_name_for_PER2' AND t1.logdel = 0 AND `t1`.`pkid` IN (SELECT MAX(`pkid`) FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end' AND `time_started` >= '07:30' AND `red_alert` != 'RED-ALERT')) ORDER BY `t1`.`date_started` ASC ";
		// $query = "SELECT * FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE `t1`.`pkid` IN (SELECT MAX(`pkid`) FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end')) ORDER BY `t1`.`date_started` ASC ";
		return $this->query($query);
	}

	public function select_query_mp_count($product_name,$start,$end){
		$query = "SELECT SUM(`t1`.`manpower_affected`) as mp_count FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t2.product_name = '$product_name' AND t1.logdel = 0 AND `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end' AND `time_started` >= '07:30' AND `red_alert` != 'RED-ALERT')) ORDER BY `t1`.`date_started` ASC ";
		return $this->query($query);
	}

	public function select_query_downtime($product_name,$start,$end){
		$query = "SELECT `t1`.`date_started` as s_date, `t1`.`time_started` as s_time, `t1`.`date_finished` as e_date, `t1`.`time_finished` as e_time FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t2.product_name = '$product_name' AND t1.logdel = 0 AND `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` >= '$start' AND `date_started` < '$end' AND `time_started` >= '07:30' AND `red_alert` != 'RED-ALERT')) ORDER BY `t1`.`date_started` ASC ";
		return $this->query($query);
	}

	public function select_query_PLM($var,$product_name,$machine_affected,$startDate,$endDate){
		// $query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		// $query = "SELECT `t1`.`date_started`,`t1`.`date_finished`,`t1`.`time_started`,`t1`.`time_finished`,`t1`.`error_category` FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t2.person_in_charge = '$var' AND t2.product_name = '$product_name' AND t1.logdel = 0 AND `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` BETWEEN '$startDate' AND '$endDate' AND `time_started` >= '07:30') OR (`date_finished` BETWEEN '$startDate' AND '$endDate' AND `time_finished` <= '07:30') OR (`date_started` <= '$startDate' AND `date_finished` IS NULL) OR (`date_started` <= '$startDate' AND `date_finished` >= '$endDate') AND `red_alert` != 'RED-ALERT')";
		$query = "SELECT `t1`.`date_started`,`t1`.`date_finished`,`t1`.`time_started`,`t1`.`time_finished`,`t1`.`error_category`,`t2`.`person_in_charge`,`t1`.`who`,`t1`.`alert_remarks` FROM `tbl_alert` as t1 INNER JOIN `tbl_product_line` as t2 ON `t2`.`product_name` = `t1`.`line_affected` WHERE t2.person_in_charge = '$var' AND t2.product_name = '$product_name' AND t1.machine_affected = '$machine_affected' AND t1.logdel = 0 AND `t1`.`pkid` IN (SELECT `pkid` FROM `tbl_alert` WHERE (`date_started` BETWEEN '$startDate' AND '$endDate') OR (`date_finished` BETWEEN '$startDate' AND '$endDate') OR (`date_started` <= '$startDate' AND `date_finished` IS NULL) OR (`date_started` <= '$startDate' AND `date_finished` >= '$endDate') AND `red_alert` != 'RED-ALERT')";
		return $this->query($query);
	}

	public function select_query_by_count($table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT count(*) as 'shit' FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return $this->query($query);
	}
    
    public function select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "<br>SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};<br>";
		return $query;
	}
    
	public function insert_query($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		// $this->save_logs('1',$query);
		return "New record has been saved";
	}
    
	/* insert a query and get the pkid */
	public function insert_query_id($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$result = $this->query($query);
		$new_pkid = $this->insert_id;
		// $this->save_logs('1',$query);
		return $new_pkid;
	}
	
	public function insert_query_script($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");<br>";
       	return $query;
	}

	public function update_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE pkid='{$pkid}';";
		$this->query($query);
		// $this->save_logs('2',$query);
		return "Record has been updated";
	}
	
	public function update_query_script($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE pkid='{$pkid}'; <br>";
		return $query;
	}

	public function update_query_detailed($table,$array_fields,$array_values,$where){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) .$where;
		$this->query($query);
		// $this->save_logs('2',$query);
		return "Record has been updated";
	}

	public function update_query_detailed_script($table,$array_fields,$array_values,$where){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) .$where.' <br>';
		$this->query($query);
		return $query;
	}

	public function delete_query($table,$pkid){
		$query = "DELETE FROM {$table} WHERE `pkid` = '{$pkid}';";
		$this->query($query);
		// $this->save_logs('3',$query);
		return "Record has been deleted";
	}

	public function delete_query_details($table,$pkid){
		$query = "DELETE FROM {$table} WHERE `fkid_ot_main` = '{$pkid}';";
		$this->query($query);
		// $this->save_logs('3',$query);
		return "Record has been deleted";
	}
	
	public function add_quotations($array_values){
		$array_values_r = array();
		for($i=0;$i<count($array_values);$i++){
			if(isset($array_values[$i]) || $array_values[$i] != ''){
				$array_values[$i] = $this->real_escape_string($array_values[$i]);
				$array_values_r[$i] = "'".$array_values[$i]."'";
			}else{
				$array_values_r[$i] = '';
			}
		}
		return $array_values_r;
	}

	public function create_update_param($array_fields,$array_values){
		$array_update = array();
		for($i=0;$i<count($array_fields);$i++){
			$array_values[$i] = $this->real_escape_string($array_values[$i]);
			$array_update[$i] = "`".$array_fields[$i]."` = "."'".$array_values[$i]."' ";
		}
		return $array_update;
	}
	
	public function save_logs($type,$query){
		$date_today = date('Y-m-d H:i:s');
		$new_query = str_replace("'",'"',$query);
		$logs = "INSERT INTO `tbl_logs` (`type_of_query`,`query`,`date`) VALUES('".$type."','".$new_query."','".$date_today."');";
		$this->query($logs);
	}
	
		public function check_unset($variable){
		if(!isset($variable)){
			$new_variable = '';
		}else{
			$new_variable = $variable;
		}
		return $new_variable;
	}
	
	public function check_if_array($array){
		if(!is_array($array)){
			$new_array = array($array);
		}else{
			$new_array = $array;
		}
		return $new_array;
	}
	
}

//THIS CLASS CONNECTS INTO SYSTEMONE SERVER
class SYS1 extends mysqli
{
	private static $instance = null;
	
	//db connection config variables
	private $user = "rapid";
	private $pass = "newd3v";
	private $dbName = "db_hris";
	private $dbHost = "192.168.3.240";

	public static function getInstance() {
		if(!self::$instance instanceof self) 
		{
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function __clone()
	{
		trigger_error('Clone is not allowed.',E_USER_ERROR);
	}
	
	public function __wakeup()
	{
		trigger_error('Deserializing is not allowed.',E_USER_ERROR);
	}
	
	private function __construct() {
		parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
		if(mysqli_connect_error())
		{
			exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		parent::set_charset('utf-8');
	}

	////////////////////////////////////PUBLIC FUNCTIONS STARTS HERE//////////////////////////////////////////////
	public function select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return $this->query($query);
	}
	public function select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return $query;
	}
}
?>


