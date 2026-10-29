<?php
if(session_id() == '') {
    session_start();
}
$username     = $_SESSION['username'];
$account_type = $_SESSION['rapidUserAccountType']; //1 = regular, 2 = admin
/* Get user roles */
if(!isset($call_on_handler)){
	$call_on_handler = 0;
}
if($call_on_handler == 1){
	require_once('../class/oop.php');
}else{
	require_once('class/oop.php');
}
$array_fields = array('*');
$table 		  = '`tbl_user_roles`';
$joins 		  = '';
$sql_where	  = 'WHERE `user` = "'.$username.'" and `logdel` = "0"';
$sql_order	  = '';
$sql_limit	  = '';
$result 	  = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
$script 	  = ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
$user_role = array(
	"fk_module" => array()
);
while( $row = mysqli_fetch_array($result) ){
	$user_role[ $row['fk_module'] ]['create']  	= $row['create'];
	$user_role[ $row['fk_module'] ]['read']   	= $row['read'];
	$user_role[ $row['fk_module'] ]['update']  	= $row['update'];
	$user_role[ $row['fk_module'] ]['delete'] 	= $row['delete'];
}

if($result->num_rows == 0){
	echo 'user '.$username.' does not have an access to this system!';
	exit;
}
?>