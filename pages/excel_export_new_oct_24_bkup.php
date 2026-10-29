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
$excel->title = 'Expired Materials';
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
$cell_range = 'E16:G16'; $excel->set_format($cell_range,$array_format_1);
$cell_range = 'H16:H16'; $excel->set_format($cell_range,$array_format_1);

/* set width */
$width_allowance = .75;

$excel->set_width('A',$width_allowance+12);
$excel->set_width('B',$width_allowance+1.75);
$excel->set_width('C',$width_allowance+1.75);
$excel->set_width('D',$width_allowance+1.75);

/* set height */
$excel->set_height('14',25);
$excel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);

/* Merge Cells */
// $merge_cells = array('B1:R1','A14:H15','I14:BG15','BH14:CZ15','B16:D16','E16:G16');
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
$set_cell_border = array('B3:B3','B4:B4','B5:B5','B6:B6','B7:B7','B8:B8','B9:B9','B10:B10','B11:B11','I14:BG15','BH14:CZ15','A16:A16','B16:D16','E16:G16','H16:H16');
for($i=0; $i<count($set_cell_border); $i++) {
	$excel->set_borders($set_cell_border[$i],1,1,1,1, "medium");
}

$set_cell_border_1 = array('B1:R1','A14:A15','B14:H15');
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
$col = 'B'; $row = '11';   $excel->place_value($col.$row,'','string');

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
$col = 'E'; $row = '16';   $excel->place_value($col.$row,'PRODUCT NAME','string');
$col = 'H'; $row = '16';   $excel->place_value($col.$row,'LINE','string');

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

$col = 'I'; $row = '14';   $excel->place_value($col.$row,date("F d, Y").' DAY SHIFT','string');
$col = 'BH'; $row = '14';   $excel->place_value($col.$row,date("F d, Y").' NIGHT SHIFT','string');


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
						'tbl_product_line.product_name',
						'tbl_product_line.line_number',
						'tbl_product_line.area',
						'tbl_product_line.person_in_charge');

$table 	   		= 'tbl_alert';
$joins 	   		= 'RIGHT JOIN tbl_product_line ON tbl_product_line.product_name = tbl_alert.line_affected';
$sql_where 		= 'WHERE tbl_alert.pkid IN (SELECT MAX(pkid) FROM tbl_alert GROUP BY line_affected) AND tbl_alert.logdel = 0';
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
		
		// $col_inc = 'I';
		$data_w = array();
		$col_inc2 = 'I';
		// $col_inc2 = array();
		// $col_inc2[] = 'I';
		// array_push($col_inc2, 'I');
		// $result_query_q = ALERT::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$result_query_q = ALERT::getInstance()->select_query_test($var,$product_name,$startDate,$endDate);

		while ($row_g = mysqli_fetch_assoc($result_query_q))
		{
			$data_w = $row_g;
			// echo json_encode($data_w);
		 	// $excel->merge_cells($col_inc.$ctrRow.':'.$col_inc.$ctrRow);

			// $time = strtotime("07:30");
			// $time = array();
			date_default_timezone_set('UTC');
			$time = strtotime("07:45");
			
			// array_push($time, $time_start);
			$date = '2022-08-14';
			
			for($i= 0;$i < 96;$i++){
				
				if((strtotime($data_w['time_started']) >= $time && strtotime($data_w['time_started']) < $time +900)
				 	|| (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) >= $time)
				 	// || (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) >= $time && strtotime($data_w['time_finished']) > $time +900)
					|| (strtotime($data_w['time_started']) <= $time && strtotime($data_w['time_finished']) == null)){

					if($data_w['error_category'] == 'MACHINE'){
						$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'M','string');
						// $col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,$time,'string');
						$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_m);
					}
					elseif($data_w['error_category'] == 'QUALITY'){
						$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'Q','string');
						// $col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,$time,'string');
						$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_q);
					}
					elseif($data_w['error_category'] == null){
						$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'NO','string');
					}
					// elseif(strtotime($data_w['time_started']) == NULL && strtotime($data_w['time_finished']) == NULL)
					// {
					// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
					// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_green);
					// }
				}
				// elseif(($time >= strtotime("07:30") && $time <= strtotime($data_w['time_started'])) || ($time >= strtotime("13:50") && $time <= strtotime("18:50")))
				// elseif(($time >= strtotime("07:30") && $time <= strtotime($data_w['time_started'])) || ($time >= strtotime($data_w['time_finished']) && $time <= strtotime("01:45") + strtotime("24:00")))
				// {
				// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
				// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_green);
				// }

				else {
					$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
					$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_green);
				}

				// if(strtotime($data_w['time_started']) == NULL && strtotime($data_w['time_finished']) == NULL)
				// {

				// 	$col = $col_inc2; $row = $ctrRow; $excel->place_value($col.$row,'P','string');
				// 	$col = $col_inc2; $row = $ctrRow; $excel->set_format($col.$row,$array_format_legends_p_green);
				// }
				
				$col_inc2++;
				$time = $time+900;
				// array_push($time, $time_inc);
				// $date+1;
				// $col_inc2[] = $col_inc2[$i];
				// array_push($col_inc2, $col_inc2[$i]);
			}
			$col_inc++;
		}
		
		$merge_cells = array('B1:R1','A14:A15','B14:H15','I14:BG15','BH14:CZ15','B16:D16','E16:G16');
		for($i=0; $i<count($merge_cells); $i++) {
			$excel->merge_cells($merge_cells[$i]);
		}
		$excel->getActiveSheet()->getRowDimension($ctrRow)->setRowHeight(20);
		$excel->merge_cells('B'.$ctrRow.':D'.$ctrRow);
		$excel->merge_cells('E'.$ctrRow.':G'.$ctrRow);
		$cell_range = 'A'.$ctrRow.':A'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'B'.$ctrRow.':D'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'E'.$ctrRow.':G'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$cell_range = 'H'.$ctrRow.':H'.$ctrRow; $excel->set_format($cell_range,$content_format);
		$set_cell_border = 'A'.$ctrRow.':A'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'B'.$ctrRow.':D'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'E'.$ctrRow.':G'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");
		$set_cell_border = 'H'.$ctrRow.':H'.$ctrRow; $excel->set_borders($set_cell_border,1,1,1,1, "medium");

		$col = 'A'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['person_in_charge'],'string');
		$col = 'B'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['area'],'string');
		$col = 'E'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['product_name'],'string');
		$col = 'H'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['line_number'],'string');
		$ctrRow++;
	}
	// echo json_encode($sql_list_of_lines);

	
// 			//Border
// 			// $objWorkSheet->getStyle('A'.$ctrRow_in_charge.':A'.count($row['person_in_charge']))->applyFromArray($array_format_1);
			
//         //    //Wrap Text
//         //     // $objWorkSheet->getStyle('A'.$ctrRow.':F'.$ctrRow)->getAlignment()->setWrapText(true);

//         //     //Set font size
//         //     $objWorkSheet->getStyle('A'.$ctrRow.':J'.$ctrRow)->getFont()->setSize(11);
		
//         //     // Set value
//         //     if ($row['machine_status'] == 'Available'){
//         //         $machine_status = $row['machine_status'];
//         //         $objWorkSheet->getStyle('J'.$ctrRow)->applyFromArray($A_fontColor);
//         //     }else if ($row['machine_status'] == 'Not Available'){
//         //         $machine_status = $row['machine_status'];
//         //         $objWorkSheet->getStyle('J'.$ctrRow)->applyFromArray($NA_fontColor);
//         //     }else{
//         //         $machine_status = $row['machine_status'];
//         //     }

//         //     if ($row['machine_type'] == 'No Asset Tag'){
//         //         $objWorkSheet->getStyle('C'.$ctrRow)->applyFromArray($NA_fontColor);
//         //     }

//         //     // if ($row['pm_due'] == '0000-00-00'){
//         //     if ($row['pm_date'] == '0000-00-00'){
//         //         $pm_due = 'No PM';
//         //     }else{
//         //         // $pm_due = date("F j, Y", strtotime($row['pm_due']));
//         //         $pm_due = date("F j, Y", strtotime($row['pm_date']));
//         //     }

//         //     // if ($row['cal_due'] == '0000-00-00'){
//         //     if ($row['cal_date'] == '0000-00-00'){
//         //         $cal_due = 'No Calibration';
//         //     }else{
//         //         // $cal_due = date("F j, Y", strtotime($row['cal_due']));
//         //         $cal_due = date("F j, Y", strtotime($row['cal_date']));
//         //     }

//         //     if ($row['pm_frequency'] == '0'){
//         //         $pm_freq = '---';
//         //     }else if ($row['pm_frequency'] == '1'){
//         //         $pm_freq = 'Monthly';
//         //     }else if ($row['pm_frequency'] == '4'){
//         //         $pm_freq = 'Quarterly';
//         //     }else if ($row['pm_frequency'] == '6'){
//         //         $pm_freq = 'Semi-annually';
//         //     }else if ($row['pm_frequency'] == '12'){ 
//         //         $pm_freq = 'Anually';
//         //     }else if ($row['pm_frequency'] == '24'){
//         //         $pm_freq = 'Bi-yearly';
//         //     }

//         //     if ($row['cal_frequency'] == '0'){
//         //         $cal_freq = '---';
//         //     }else if ($row['cal_frequency'] == '1'){
//         //         $cal_freq = 'Monthly';
//         //     }else if ($row['cal_frequency'] == '4'){
//         //         $cal_freq = 'Quarterly';
//         //     }else if ($row['cal_frequency'] == '6'){
//         //         $cal_freq = 'Semi-annually';
//         //     }else if ($row['cal_frequency'] == '12'){
//         //         $cal_freq = 'Anually';
//         //     }else if ($row['cal_frequency'] == '24'){
//         //         $cal_freq = 'Bi-yearly';
//         //     }

//         //     $objWorkSheet->setCellValue('A'.$ctrRow, $row['machine_code_number']);
//         //     $objWorkSheet->setCellValue('B'.$ctrRow, $row['machine_name']);
//         //     $objWorkSheet->setCellValue('C'.$ctrRow, $row['machine_type']);
//         //     $objWorkSheet->setCellValue('D'.$ctrRow, $row['machine_category']);
//         //     $objWorkSheet->setCellValue('E'.$ctrRow, $row['machine_location']);
//         //     $objWorkSheet->setCellValue('F'.$ctrRow, $pm_due);
//         //     $objWorkSheet->setCellValue('G'.$ctrRow, $pm_freq);
//         //     $objWorkSheet->setCellValue('H'.$ctrRow, $cal_due);
//         //     $objWorkSheet->setCellValue('I'.$ctrRow, $cal_freq);
//             // $objWorkSheet->setCellValue('A'.$ctrRow,$row['person_in_charge']);
// 			$col = 'A'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['person_in_charge'],'string');
// 			$ctrRow++;
			
// //         // } 

// comment to enable echo
/* set file name */
$filename = "sample";
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');
