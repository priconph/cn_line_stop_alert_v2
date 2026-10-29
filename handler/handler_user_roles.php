<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(is_ajax()) {
	if(isset($_POST["action"]) && !empty($_POST["action"])) {
		$action = $_POST["action"];
		/* start - user roles */
		switch($action) {
			case "get_user_roles"								: get_user_roles(); break;
			case "update_role"									: update_role(); break;
		/* end - user roles */ 
		}
	}
}

function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/* start - user roles */

function get_user_roles(){
	require_once('../class/oop.php');
	$return = array();
	$html = '';
	$user = $_POST['user'];
	$modules = get_modules();
	foreach ($modules['pkid'] as $key => $value) {
		$fk_module = $modules['pkid'][$key];
		$html .= '<tr>';
		$html .= '	<td><input type="hidden" value="'.$modules['pkid'][$key].'" name="txt_fk_module[]">'.$modules['module'][$key].'</td>';
		$role  = get_assigned_roles($user,$fk_module);
		$html .= '	<td><input type="hidden" value="'.$role['pkid'].'" name="role_id[]">'.($role['create'] == 0 ? '<input type="checkbox" name="chk_role_create[]">' : '<input type="checkbox" name="chk_role_create[]" checked>' ).'</td>';
		$html .= '	<td>'.($role['read'] 	== 0 ? '<input type="checkbox" name="chk_role_read[]">' : '<input type="checkbox" name="chk_role_read[]" checked>' ).'</td>';
		$html .= '	<td>'.($role['update'] 	== 0 ? '<input type="checkbox" name="chk_role_update[]">' : '<input type="checkbox" name="chk_role_update[]" checked>' ).'</td>';
		$html .= '	<td>'.($role['delete'] 	== 0 ? '<input type="checkbox" name="chk_role_delete[]">' : '<input type="checkbox" name="chk_role_delete[]" checked>' ).'</td>';
		$html .= '</tr>';
	}
	$return['html'] = $html;
	echo json_encode($return);
}

function get_modules(){
	require_once('../class/oop.php'); 
	$module = array();
	$result = "";
	$array_fields = array('*');
	$table 	   	= 'tbl_modules';
	$joins 	   	= '';
	$sql_where 	= '';
	$sql_order 	= 'ORDER BY pkid';
	$sql_limit 	= '';
	$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	$ctr = 0;
	while($row = mysqli_fetch_array($result)){
		$module['pkid'][$ctr] 		= $row['pkid'];
		$module['module'][$ctr] 	= $row['module'];
		$ctr++;
	}
	$module['ctr']	  = $ctr;
	return $module;
}

function get_assigned_roles($user,$fk_module){
	require_once('../class/oop.php'); 
	$role = array();
	$result = "";
	$array_fields = array('*');
	$table 	   	= 'tbl_user_roles';
	$joins 	   	= '';
	$sql_where 	= "WHERE `user` = '$user' AND `fk_module` = '$fk_module' AND `logdel` = '0' ";
	$sql_order 	= '';
	$sql_limit 	= '';
	$result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	$ctr = 0;
	if( $result->num_rows == 0 ){
		$role['pkid'] 	    = 0;
		$role['create'] 	= 0;
		$role['read'] 		= 0;
		$role['update'] 	= 0;
		$role['delete'] 	= 0;
	}
	while($row = mysqli_fetch_array($result)){
		$role['pkid'] 		= $row['pkid'];
		$role['create'] 	= $row['create'];
		$role['read'] 		= $row['read'];
		$role['update'] 	= $row['update'];
		$role['delete'] 	= $row['delete'];
		$ctr++;
	}
	return $role;
}

function update_role(){
	$return = array();
	$username = $_POST['username'];
	$role = $_POST['role'];
	$return['update_role_result'] = update_role_data($role);
	echo json_encode($return);
}

function update_role_data($data){
	require_once('../class/oop.php'); 
	$script = array();
	foreach ($data['role_id'] as $key => $pkid) {
		if($pkid == 0){
			$result = "";
			$table        = "tbl_user_roles";
			$array_fields = array('`user`','`fk_module`','`create`','`read`','`update`','`delete`');
			$array_values = array($data['user'][$key],$data['fk_module'][$key],$data['create'][$key],$data['read'][$key],$data['update'][$key],$data['delete'][$key]);
			$result 	  = ALERT::getInstance()->insert_query_id($table,$array_fields,$array_values);
			$script[] 	  = ALERT::getInstance()->insert_query_script($table,$array_fields,$array_values);
		}else{
			$result = "";
			$table        = "tbl_user_roles";
			$array_fields = array('create','read','update','delete');
			$array_values = array($data['create'][$key],$data['read'][$key],$data['update'][$key],$data['delete'][$key]);
			$where 		  = "WHERE `pkid` = '$pkid' AND `fk_module` = '".$data['fk_module'][$key]."'";
			$result 	  = ALERT::getInstance()->update_query_detailed($table,$array_fields,$array_values,$where);
			$script[] 	  = ALERT::getInstance()->update_query_detailed_script($table,$array_fields,$array_values,$where);
		}
		
	}
	return $script;
}