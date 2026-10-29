<?php
/* you may use any file from pages as your homepage */
if( isset($_GET['page']) ){
	if( $_GET['page'] == 'alert'){
		include('pages/alert_page.php');
	}
}else{
	include('pages/index.php');
}
?>
