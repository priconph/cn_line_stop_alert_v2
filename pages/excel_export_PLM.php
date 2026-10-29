<?php
$oop 		= "../class/oop.php";
$handler 	= "../handler/handler.php";
if(file_exists($oop)){
	require_once($oop);
}else{
	echo 'oop not found!';
	exit;
}
if(file_exists($handler)){
	require_once($handler);
}else{
	echo 'handler not found!';
	exit;
}
session_start();
date_default_timezone_set('Asia/Manila');
$datetoday      = date("F j, Y");
$startDate 		= $_GET['startDate'];
$startDate 		= strtotime($startDate);
$endDate 		= $startDate + 86400;
$startDate 		= date('Y-m-d',$startDate);
$endDate 		= date('Y-m-d',$endDate);

// $parent_class = "../../media/PHPExcel-1.8/Classes/PHPExcel.php";
// if(file_exists($parent_class)){
// 	include($parent_class); //call the parent class
// }else{
// 	echo 'file '.$parent_class.' does not exist!';
// 	exit;
// }


// $query_list_of_lines =" SELECT * FROM tbl_alert
// 		RIGHT JOIN tbl_product_line ON tbl_product_line.product_name = tbl_alert.line_affected 
//    		WHERE tbl_alert.pkid IN (SELECT MAX(pkid) FROM tbl_alert GROUP BY line_affected) AND tbl_alert.logdel = 0 ORDER BY person_in_charge DESC";

/* Do excel here  */

$excel_class = '../class/excel_new.php';
if(file_exists($excel_class)){
	include($excel_class);
}else{
	echo 'File '.$excel_class.' does not exist';
	exit;
}
// comment to enable echo

$excel = new EXCEL;
/* set title */
$excel->title = 'PLM';
/* add a new page */
$excel->add_page();
/* use the default font style */
$excel->set_default_font_style();
/* select an active page */
$excel->set_active_sheet(0);

/* set format */
$array_format_super_header = array(
	"bold"	=> true,
	"size"	=> 22,
	"h_alignment"	=> "center"
);

$array_format_header = array(
	"bold"	=> true,
	"size"	=> 14,
	"h_alignment"	=> "center"
);

$array_format_sub_header = array(
	"name" 			=> "Lucida Fax",
	"size"	=> 11,
	"h_alignment"	=> "center"
);

$array_format_sub_header_right = array(
	"name" 			=> "Lucida Fax",
	"size"	=> 11,
	"h_alignment"	=> "left"
);

$array_format_sub_header_right_bold = array(
	"bold"	=> true,
	"name" 			=> "Lucida Fax",
	"size"	=> 11,
	"h_alignment"	=> "left"
);

$array_format_legends_p_green = array(
	"size"	=> 10,
	'fill_color'  => "00b050",
	"h_alignment"	=> "center"
);
$array_format_legends_m = array(
	"size"	=> 10,
	'fill_color'  => "ff0000",
	"h_alignment"	=> "center"
);
$array_format_legends_s = array(
	"size"	=> 10,
	'fill_color'  => "ffff00",
	"h_alignment"	=> "center"
);
$array_format_legends_q = array(
	"size"	=> 10,
	'fill_color'  => "ffbf00",
	"h_alignment"	=> "center"
);
$array_format_legends_p_violet = array(
	"size"	=> 10,
	'fill_color'  => "cc00ff",
	"h_alignment"	=> "center"
);
$array_format_legends_r = array(
	"size"	=> 10,
	'fill_color'  => "00b0f0",
	"h_alignment"	=> "center"
);
$array_format_legends_9 = array(
	"size"	=> 10,
	'fill_color'  => "aeaaaa",
	"h_alignment"	=> "center"
);
$array_format_legends_10 = array(
	"size"	=> 10,
	'fill_color'  => "e7e6e6",
	"h_alignment"	=> "center"
);
$array_format_legends_11 = array(
	"size"	=> 10,
	'fill_color'  => "99ccff",
	"h_alignment"	=> "center"
);

$array_format_1 = array(
	"name" 			=> "Lucida Fax",
	"size"			=> 14,
	"h_alignment"	=> "center"
);

$content_format = array(
	"name" 			=> "Lucida Fax",
	"size"			=> 12,
	"h_alignment"	=> "center"
);

$cell_range = 'A16:A16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'B1:R1'; $excel->set_format($cell_range,$array_format_super_header);
$cell_range = 'B3:B3'; $excel->set_format($cell_range,$array_format_legends_p_green);
$cell_range = 'B4:B4'; $excel->set_format($cell_range,$array_format_legends_m);
$cell_range = 'B5:B5'; $excel->set_format($cell_range,$array_format_legends_s);
$cell_range = 'B6:B6'; $excel->set_format($cell_range,$array_format_legends_q);
$cell_range = 'B7:B7'; $excel->set_format($cell_range,$array_format_legends_p_violet);
$cell_range = 'B8:B8'; $excel->set_format($cell_range,$array_format_legends_r);
$cell_range = 'B9:B9'; $excel->set_format($cell_range,$array_format_legends_9);
$cell_range = 'B10:B10'; $excel->set_format($cell_range,$array_format_legends_10);
$cell_range = 'B11:B11'; $excel->set_format($cell_range,$array_format_legends_11);
$cell_range = 'I14:BG15'; $excel->set_format($cell_range,$array_format_header);
$cell_range = 'BH14:CZ15'; $excel->set_format($cell_range,$array_format_header);
$cell_range = 'A16:A16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'B16:D16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'E16:F16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'G16:G16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'H16:H16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'U4:U4'; $excel->set_format($cell_range,$array_format_sub_header_right_bold);
$cell_range = 'U5:U8'; $excel->set_format($cell_range,$array_format_sub_header_right);

/* set width */
$width_allowance = .75;

$excel->set_width('A',$width_allowance+12);
$excel->set_width('B',$width_allowance+1.75);
$excel->set_width('C',$width_allowance+1.75);
$excel->set_width('D',$width_allowance+1.75);
$excel->set_width('G',$width_allowance+65);

/* set height */
$excel->set_height('14',25);
$excel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

/* Merge Cells */
// $merge_cells = array('B1:R1','A14:H15','I14:BG15','BH14:CZ15','B16:D16','E16:F16');
// for($i=0; $i<count($merge_cells); $i++) {
// 	$excel->merge_cells($merge_cells[$i]);
// }

$column_to_inc='I'; 								//column
$row ='16';											//row
$set_column_merge = array();						//array for merged columns
$set_column = array();								//array for columns
$set_column_inc = array();							//array for column increment
array_push($set_column,$column_to_inc);				//push $column_to_inc to $set_column
array_push($set_column_inc,$column_to_inc);			//push $column_to_inc to $set_column_inc
for($i=0; $i < 24; $i++) {							//loop 24 times for repetition
	$step = 3;
	$column_1 = $set_column_inc[$i];

	$columnNumber = PHPExcel_Cell::columnIndexFromString($set_column[$i]) + $step;
	$column = PHPExcel_Cell::stringFromColumnIndex($columnNumber - 1);

	$merge_column = $column_1.$row.':'.$column.$row;
	
	$columnNumber_1 = PHPExcel_Cell::columnIndexFromString($set_column[$i]) + 4;
	$column_1 = PHPExcel_Cell::stringFromColumnIndex($columnNumber_1 - 1);
	
	array_push($set_column,$column_1);
	array_push($set_column_inc,$column_1);
	array_push($set_column_merge,$merge_column);
}

for($i=0; $i<count($set_column_merge); $i++) {
	$excel->merge_cells($set_column_merge[$i]);
}

/* 
	Set borders ( $excel->set_borders($cell,$left,$right,$top,$bottom,$border_style); )
*/
$set_cell_border = array('B3:B3','B4:B4','B5:B5','B6:B6','B7:B7','B8:B8','B9:B9','B10:B10','B11:B11','I14:BG15','BH14:CZ15','A16:A16','B16:D16','E16:F16','G16:G16', 'H16:H16');
for($i=0; $i<count($set_cell_border); $i++) {
	$excel->set_borders($set_cell_border[$i],1,1,1,1, "medium");
}

$set_cell_border_1 = array('A14:A15','B14:H15');
for($i=0; $i<count($set_cell_border_1); $i++) {
	$excel->set_borders($set_cell_border_1[$i],1,1,1,1, "thick");
}

// $cell = 'B2:R52'; $excel->set_borders($cell,1,1,1,0, "medium");	
// $cell = 'B2:R52'; $excel->set_borders($cell,0,0,0,1, "medium");	

/* Place value */
$col = 'B'; $row = '1';   $excel->place_value($col.$row,'CN PRODUCTION LINE MONITORING','string');
$col = 'B'; $row = '2';   $excel->place_value($col.$row,'LEGEND:','string');
$col = 'B'; $row = '3';   $excel->place_value($col.$row,'P','string');
$col = 'B'; $row = '4';   $excel->place_value($col.$row,'M','string');
$col = 'B'; $row = '5';   $excel->place_value($col.$row,'S','string');
$col = 'B'; $row = '6';   $excel->place_value($col.$row,'Q','string');
$col = 'B'; $row = '7';   $excel->place_value($col.$row,'P','string');
$col = 'B'; $row = '8';   $excel->place_value($col.$row,'R','string');
$col = 'B'; $row = '9';   $excel->place_value($col.$row,'','string');
$col = 'B'; $row = '10';   $excel->place_value($col.$row,'','string');
$col = 'B'; $row = '11';   $excel->place_value($col.$row,'O','string');

$col = 'D'; $row = '3';   $excel->place_value($col.$row,'MASS PRODUCTION','string');
$col = 'D'; $row = '4';   $excel->place_value($col.$row,'M/C OR EQUIPMENT DOWNTIME (Parts replacement, equipment breakdown, die damage or broken, M/C repair, M/C test run, verification, no spare parts)','string');
$col = 'D'; $row = '5';   $excel->place_value($col.$row,'CHANGEOVER  (Pre-Produciton/Set up, Production Qualification, Change Material, Conversion, change output reel, line transfer)','string');
$col = 'D'; $row = '6';   $excel->place_value($col.$row,'QC QUALIFICATION including waiting for QC','string');
$col = 'D'; $row = '7';   $excel->place_value($col.$row,'Parameter Adjustment (Setting adjustment Ex. Distance, angle, pressure, die adjustmet)','string');
$col = 'D'; $row = '8';   $excel->place_value($col.$row,'MATERIAL ISSUE (Material Verification, Material issue)','string');
$col = 'D'; $row = '9';   $excel->place_value($col.$row,'NO SCHEDULE / BREAKTIME','string');
$col = 'D'; $row = '10';   $excel->place_value($col.$row,'WAITING (Waiting for Engineering, Technician or operator)','string');
$col = 'D'; $row = '11';   $excel->place_value($col.$row,'OTHERS (POWER FAILURE / AIR SUPPLY FAILURE/ Others)','string');
$col = 'A'; $row = '16';   $excel->place_value($col.$row,'IN-CHARGE','string');
$col = 'B'; $row = '16';   $excel->place_value($col.$row,'AREA','string');
$col = 'E'; $row = '16';   $excel->place_value($col.$row,'PRODUCT LINE','string');
$col = 'G'; $row = '16';   $excel->place_value($col.$row,'MACHINE AFFECTED','string');
$col = 'H'; $row = '16';   $excel->place_value($col.$row,'LINE','string');

$col = 'U'; $row = '4';   $excel->place_value($col.$row,'Place a comment if downtime is encountered','string');
$col = 'U'; $row = '5';   $excel->place_value($col.$row,'WHAT: Name of Downtime','string');
$col = 'U'; $row = '6';   $excel->place_value($col.$row,'WHEN: Exact time','string');
$col = 'U'; $row = '7';   $excel->place_value($col.$row,'WHO: Technicians/Engineers','string');
$col = 'U'; $row = '8';   $excel->place_value($col.$row,'WHY: Why Downtime occurs','string');




// /* set column name */
$X='I';
$set_column = array();
for($i=1; $i <= 96; $i++) {
	array_push($set_column,$X++);
}

$column='I';
$set_column_hours = array();
array_push($set_column_hours,$column);
for($i=0; $i < 24; $i++) {
	$step = 4;
	$columnNumber = PHPExcel_Cell::columnIndexFromString($column) + $step;
	$column = PHPExcel_Cell::stringFromColumnIndex($columnNumber - 1);
	array_push($set_column_hours,$column);
}

	// echo $column;
	$column = 'I';
	$column='I';
	$set_column_hours = array();
	array_push($set_column_hours,$column);
	for($i=0; $i < 24; $i++) {
		$column = $set_column_hours[$i];
		// $tt = $excel->set_custom_column($column);
		$step = 4; // number of columns to step by
		
		$columnNumber = PHPExcel_Cell::columnIndexFromString($column) + $step;
		$column = PHPExcel_Cell::stringFromColumnIndex($columnNumber - 1);
		array_push($set_column_hours,$column);

		// echo $set_column_hours[$i];
		
	}
	// echo $column;
	
/* set column name end */

/* set cell value */
$set_cell_value = array();
$time = strtotime('07:45');
$time_a = date('H:i',$time);
array_push($set_cell_value,$time_a);
for($i=0; $i < 96; $i++) {
	$time = strtotime($set_cell_value[$i]);
	$time = $time+900;
	$time = date('H:i',$time);
	array_push($set_cell_value,$time);
}

$set_cell_value_hours = array();
$time = strtotime('8:30');
$time_1 = '8:30';
$time_a = date('H:i',$time);
array_push($set_cell_value_hours,$time_a);
for($i=1; $i <= 24; $i++) {
	$time_1 = strtotime($time_1);
	$time_1 = $time_1+3600;
	$time_1 = date('H:i',$time_1);
	array_push($set_cell_value_hours,$time_1);
}
/* set cell value end*/

$col = 'I'; $row = '13';   $excel->place_value($col.$row,$set_cell_value[0],'string');
$col = 'J'; $row = '13';   $excel->place_value($col.$row,$set_cell_value[1],'string');
$col = 'K'; $row = '13';   $excel->place_value($col.$row,$set_cell_value[2],'string');
for($i=0; $i < 96; $i++) {
	$col = $set_column[$i]; $row = '13';   $excel->place_value($col.$row,$set_cell_value[$i],'string');
	$col = $set_column[$i]; $row = '13'; 	$excel->set_format($col.$row,$array_format_sub_header);
	$col = $set_column[$i]; $row = '13';	$excel->set_borders($col.$row,1,1,1,1, "medium");
}

for($i=0; $i < 24; $i++) {
	$col = $set_column_hours[$i]; $row = '16';   $excel->place_value($col.$row,$set_cell_value_hours[$i],'string');
	$cell_range = $set_column_merge[$i]; 		 $excel->set_format($cell_range,$array_format_sub_header);
	$cell_range = $set_column_merge[$i];		 $excel->set_borders($cell_range,1,1,1,1, "medium");
}

date_default_timezone_set('Asia/Manila');
$op_startDate 		= $_GET['startDate'];
$op_startDate 		= strtotime($op_startDate);
$op_endDate 		= $op_startDate + 86400;
$op_startDate 		= date('F d, Y',$op_startDate);
$op_endDate 		= date('F d, Y',$op_endDate);

$col = 'I'; $row = '14';   $excel->place_value($col.$row,$op_startDate.' DAY SHIFT','string');
$col = 'BH'; $row = '14';   $excel->place_value($col.$row,$op_endDate.' NIGHT SHIFT','string');


/* Main data */
// $array_fields 	= array('`tbl_alert`.`status`',
// 						'`tbl_alert`.`error_category`',
// 						'`tbl_product_line`.`product_name`',
// 						'`tbl_product_line`.`line_number`',
// 						'`tbl_product_line`.`area`',
// 						'`tbl_product_line`.`person_in_charge`');

// $table 	   		= '`tbl_alert`';
// $joins 	   		= 'INNER JOIN `tbl_product_line` ON `tbl_product_line`.`product_name` = `tbl_alert`.`line_affected`';
// $sql_where 		= '`tbl_product_line`.`logdel` = 0';
// $sql_order 		= '';
// $sql_limit 		= '';
// $result = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
// $script	= ALERT::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
// $return = array();
// $sql_data = array();
// while($row = mysqli_fetch_assoc($result)){
// 	$sql_data[] = $row;
// }

$array_fields 	= array('tbl_alert.status',
						'tbl_alert.error_category',
						'tbl_alert.machine_affected',
						'tbl_product_line.product_name',
						'tbl_product_line.line_number',
						'tbl_product_line.area',
						'tbl_product_line.person_in_charge');

$table 	   		= 'tbl_alert';
$joins 	   		= 'RIGHT JOIN tbl_product_line ON tbl_product_line.product_name = tbl_alert.line_affected';
// $sql_where 		= 'WHERE tbl_alert.pkid IN (SELECT MAX(pkid) FROM tbl_alert GROUP BY line_affected and machine_affected ) AND tbl_alert.logdel = 0';
$sql_where 		= 'WHERE tbl_alert.pkid IN (SELECT MAX(pkid) FROM tbl_alert GROUP BY machine_affected ) AND tbl_alert.red_alert != "RED-ALERT" AND tbl_alert.logdel = 0';
$sql_order 		= 'ORDER BY person_in_charge DESC';
$sql_limit 		= '';

$sql_list_of_lines = array();

$result_query = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

$ctrRow_in_charge = '16';
$ctrRow = '17';	

	while ($row = mysqli_fetch_assoc($result_query))
	{
		$sql_list_of_lines = $row;


		$var = $sql_list_of_lines['person_in_charge'];
		$product_name = $sql_list_of_lines['product_name'];
		$machine_affected = $sql_list_of_lines['machine_affected'];
		$data_w = array();

		$col_inc2 = 'I';
		for($i= 0;$i < 96;$i++){
			$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
			$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_green);
			$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
			$col_inc2++;
		}

		$result_query_q = ALERT::getInstance()->select_query_PLM($var,$product_name,$machine_affected,$startDate,$endDate);
		while ($row_g = mysqli_fetch_assoc($result_query_q))
		{
			$data_w = $row_g;
		
			date_default_timezone_set('Asia/Manila');
			$time = strtotime("07:45");
			$startDate 		= $_GET['startDate'];
			$startDate 		= strtotime($startDate);
			$endDate 		= $startDate + 86400;
			$startDate 		= date('Y-m-d',$startDate);
			$endDate 		= date('Y-m-d',$endDate);
			// $startDate 		= strtotime($startDate);
			// $endDate 		= strtotime($endDate);
			
			// $date = '2022-08-14';

			$col_inc2 = 'I';
			for($i= 0;$i < 96;$i++){
				
				// if($data_w['date_started'] = $startDate)
				// {
					if(($data_w['date_started'] >= $startDate && strtotime($data_w['time_started']) >= $time && strtotime($data_w['time_started']) < $time +900)
						|| ($data_w['date_started'] >= $startDate && strtotime($data_w['time_started']) <= $time && $data_w['date_finished'] <= $endDate && strtotime($data_w['time_finished']) >= $time)
						|| ($data_w['date_started'] >= $startDate && strtotime($data_w['time_started']) <= $time && $data_w['date_finished'] >= $endDate)
						|| ($data_w['date_started'] < $startDate && $data_w['date_finished'] <= $endDate && strtotime($data_w['time_finished']) >= $time)
						// || (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) >= $time && strtotime($data_w['time_finished']) > $time +900)
						|| ($data_w['date_started'] >= $startDate && strtotime($data_w['time_started']) <= $time && $data_w['date_finished'] == null && strtotime($data_w['time_finished']) == null)
						|| ($data_w['date_started'] < $startDate && $data_w['date_finished'] >= $endDate))
						{
							if($data_w['error_category'] == 'MACHINE'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'M','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_m);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'QUALITY'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'Q','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_q);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'CHANGEOVER'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'S','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_s);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'PARAMETER'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_violet);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'MATERIAL'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'R','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_r);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'NO-SCHED'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_9);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'WAITING'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_10);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == 'OTHERS'){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'O','string');
								$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_11);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}
							elseif($data_w['error_category'] == null){
								$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'---','string');
								// $col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_r);
								$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
							}

							if($data_w['person_in_charge'] == null){
								$person_in_charge = 'N/A';
							}else{
								$person_in_charge = $data_w['person_in_charge'];
							}

							if($data_w['error_category'] == null){
								$error_category = 'N/A';
							}else{
								$error_category = $data_w['error_category'];
							}

							if($data_w['date_started'] == null || $data_w['time_started'] == null){
								$date_started = 'N/A';
								$time_started = 'N/A';
							}else{
								$date_started = $data_w['date_started'];
								$time_started = $data_w['time_started'];
							}

							if($data_w['who'] == null){
								$who = 'N/A';
							}else{
								$who = $data_w['who'];
							}

							if($data_w['alert_remarks'] == null){
								$alert_remarks = 'N/A';
							}else{
								$alert_remarks = $data_w['alert_remarks'];
							}

							//comment start
								//height
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)->setHeight("100px");
								//width
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)->setWidth("200px");
								//author
								$excel->getActiveSheet()
									->getComment($col_inc2.$ctrRow)
									->setAuthor($person_in_charge);
								//title
								$commentRichText = $excel->getActiveSheet()
									->getComment($col_inc2.$ctrRow)
									->getText()->createTextRun('WHAT: ');
								$commentRichText->getFont()->setBold(true);

								//content
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun($error_category);

								//spacer
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun("\r\n");

								$commentRichText = $excel->getActiveSheet()
									->getComment($col_inc2.$ctrRow)
									->getText()->createTextRun('WHEN: ');
								$commentRichText->getFont()->setBold(true);

								//content
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun($date_started.' '.$time_started);

								//spacer
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun("\r\n");

								$commentRichText = $excel->getActiveSheet()
									->getComment($col_inc2.$ctrRow)
									->getText()->createTextRun('WHO: ');
								$commentRichText->getFont()->setBold(true);

								//content
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun($who);

								//spacer
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun("\r\n");

								$commentRichText = $excel->getActiveSheet()
									->getComment($col_inc2.$ctrRow)
									->getText()->createTextRun('WHY: ');
								$commentRichText->getFont()->setBold(true);
								
								//content
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun($alert_remarks);

								//spacer
								$excel->getActiveSheet()
								->getComment($col_inc2.$ctrRow)
								->getText()->createTextRun("\r\n");
							//comment end
						}
				// }
				// elseif($data_w['date_started'] <= $startDate && $data_w['date_finished'] >= $endDate)
				// {
					// if(($data_w['date_started'] <= $startDate && $data_w['date_finished'] >= $endDate)
					// || (strtotime($data_w['time_started']) >= $time && strtotime($data_w['time_started']) < $time +900)
				 	// || (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) >= $time)
				 	// // || (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) >= $time && strtotime($data_w['time_finished']) > $time +900)
					// || (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) == null))
					// {
						// if($data_w['error_category'] == 'MACHINE'){
						// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'M','string');
						// 	// $col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,$time,'string');
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_m);
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
						// }
						// elseif($data_w['error_category'] == 'QUALITY'){
						// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'Q','string');
						// 	// $col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,$time,'string');
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_q);
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
						// }
						// elseif($data_w['error_category'] == null){
						// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'NO','string');
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_r);
						// 	$col = $col_inc2; $row = $ctrRow; $excel->set_borders($col.$row,1,1,1,1, "medium");
						// }
					// }	
				// }
				

				$col_inc2++;
				$time = $time+900;
			}
		}

		$merge_cells = array('B1:R1','A14:A15','B14:H15','I14:BG15','BH14:CZ15','B16:D16','E16:F16');
		for($i=0; $i<count($merge_cells); $i++) {
			$excel->merge_cells($merge_cells[$i]);
		}

		
		$excel->getActiveSheet()->getRowDimension($ctrRow)->setRowHeight(20);
		$excel->merge_cells('B'.$ctrRow.':D'.$ctrRow);
		$excel->merge_cells('E'.$ctrRow.':F'.$ctrRow);
		$cell_range = 'A'.$ctrRow.':A'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'B'.$ctrRow.':D'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'E'.$ctrRow.':G'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'H'.$ctrRow.':H'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$set_cell_border = 'A'.$ctrRow.':A'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'B'.$ctrRow.':D'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'E'.$ctrRow.':F'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'G'.$ctrRow.':G'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'H'.$ctrRow.':H'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");

		// orig code
		$col = 'A'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['person_in_charge'],'string');
		$col = 'B'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['area'],'string');
		$col = 'E'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['product_name'],'string');
		$col = 'G'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['machine_affected'],'string');
		$col = 'H'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['line_number'],'string');
		
		$ctrRow++;
		
	}
	// echo json_encode($sql_list_of_lines);

// comment to enable echo
/* set file name */
$filename = "Line - PLM";
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');
