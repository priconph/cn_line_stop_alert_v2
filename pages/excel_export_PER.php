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
	$excel->title = 'PER';
	/* add a new page */
	$excel->add_page();
	/* use the default font style */
	$excel->set_default_font_style();
	/* select an active page */
	$excel->set_active_sheet(0);

	date_default_timezone_set('Asia/Manila');

	/* set format */
	$array_format_super_header = array(
		"bold"	=> true,
		"size"	=> 22,
		"h_alignment"	=> "center"
	);

	$array_format_header_yellow = array(
		"bold"	=> true,
		"size"	=> 11,
		'fill_color'  => "FFF2CC",
		"h_alignment"	=> "center"
	);

	$array_format_header_black = array(
		"bold"	=> true,
		"size"	=> 11,
		'fill_color'  => "808080",
		'color' => "FFFFFF",
		"h_alignment"	=> "center"
	);

	$array_format_sub_header_yellow = array(
		"name" 			=> "Calibri",
		"size"	=> 11,
		'fill_color'  => "FFF2CC",
		"h_alignment"	=> "center"
	);

	$array_format_sub_header_black = array(
		"name" 			=> "Calibri",
		"size"	=> 11,
		'fill_color'  => "808080",
		'color' => "FFFFFF",
		"h_alignment"	=> "center"
	);

	$array_format_sub_header_gray = array(
		"name" 			=> "Calibri",
		"size"	=> 11,
		'fill_color'  => "D9D9D9",
		"h_alignment"	=> "center"
	);

	$array_format_sub_header_gray_red_font = array(
		"name" 			=> "Calibri",
		"size"	=> 11,
		'fill_color'  => "D9D9D9",
		'color' => "FF0000",
		"h_alignment"	=> "center"
	);

	$array_format_1 = array(
		"name" 			=> "Lucida Fax",
		"size"			=> 14,
		"h_alignment"	=> "center"
	);

	$content_format = array(
		"name" 			=> "Calibri",
		"size"			=> 11,
		"h_alignment"	=> "center"
	);

	$array_format_10 = array(
		"size"	=> 10,
		'fill_color'  => "FFF2CC",
		"h_alignment"	=> "center"
	);

	$array_conditional_format = array(
		// "size"	=> 10,
		'fill_color'  => "FFFFFF",
		"h_alignment"	=> "center"
	);
	
	$cell_range = 'AA2:AE2'; $excel->set_format($cell_range,$array_format_super_header);
	$cell_range = 'A3:S3'; $excel->set_format($cell_range,$array_format_header_yellow);
	$cell_range = 'T3:AE3'; $excel->set_format($cell_range,$array_format_header_black);
	$cell_range = 'A4:B4'; $excel->set_format($cell_range,$array_format_sub_header_yellow);
	$cell_range = 'C4:D4'; $excel->set_format($cell_range,$array_format_sub_header_black);
	$cell_range = 'E4:F4'; $excel->set_format($cell_range,$array_format_sub_header_yellow);
	$cell_range = 'G4:J4'; $excel->set_format($cell_range,$array_format_sub_header_black);
	$cell_range = 'K4:L4'; $excel->set_format($cell_range,$array_format_sub_header_yellow);
	$cell_range = 'M4:M4'; $excel->set_format($cell_range,$array_format_sub_header_black);
	$cell_range = 'N4:Q4'; $excel->set_format($cell_range,$array_format_sub_header_yellow);
	$cell_range = 'R4:R4'; $excel->set_format($cell_range,$array_format_sub_header_gray);
	$cell_range = 'S4:S4'; $excel->set_format($cell_range,$array_format_sub_header_yellow);
	$cell_range = 'T4:W4'; $excel->set_format($cell_range,$array_format_sub_header_black);
	$cell_range = 'X4:Y4'; $excel->set_format($cell_range,$array_format_sub_header_gray_red_font);
	$cell_range = 'Z4:AF4'; $excel->set_format($cell_range,$array_format_sub_header_black);

	/* set width */
	$width_allowance = .75;
	
	/* set height */
	$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(48);

	$excel->set_width('A',$width_allowance+32);
	$excel->set_width('B',$width_allowance+12);
	$excel->set_width('C',$width_allowance+27);
	$excel->set_width('D',$width_allowance+25);
	$excel->set_width('E',$width_allowance+11);
	$excel->set_width('F',$width_allowance+18);
	$excel->set_width('G',$width_allowance+10);
	$excel->set_width('H',$width_allowance+18);
	$excel->set_width('I',$width_allowance+13);
	$excel->set_width('J',$width_allowance+13);
	$excel->set_width('K',$width_allowance+13);
	$excel->set_width('L',$width_allowance+13);
	$excel->set_width('M',$width_allowance+13);
	$excel->set_width('N',$width_allowance+13);
	$excel->set_width('O',$width_allowance+13);
	$excel->set_width('P',$width_allowance+13);
	$excel->set_width('Q',$width_allowance+13);
	$excel->set_width('R',$width_allowance+13);
	$excel->set_width('S',$width_allowance+12);
	$excel->set_width('T',$width_allowance+12);
	$excel->set_width('U',$width_allowance+25);
	$excel->set_width('V',$width_allowance+12);
	$excel->set_width('W',$width_allowance+12);
	$excel->set_width('X',$width_allowance+15);
	$excel->set_width('Y',$width_allowance+15);
	$excel->set_width('Z',$width_allowance+15);
	$excel->set_width('AA',$width_allowance+15);
	$excel->set_width('AB',$width_allowance+15);
	$excel->set_width('AC',$width_allowance+15);
	$excel->set_width('AD',$width_allowance+15);
	$excel->set_width('AE',$width_allowance+10);

	$set_cell_border = 'A4:AE4'; $excel->set_borders($set_cell_border,1,1,1,1, "medium");

	$set_cell_border = array('AA2:AE2','A3:AE3');
	for($i=0; $i<count($set_cell_border); $i++) {
		$excel->getActiveSheet()->getStyle($set_cell_border[$i])->applyFromArray(
			array('borders' => array(
					'allborders'    => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
				)
			)
		);
	}
	
	//Wrap Text
	$excel->getActiveSheet()->getStyle('A4:AF4')->getAlignment()->setWrapText(true);

	/* Merge Cells */
	$merge_cells = array('A3:S3','T3:X3','Y3:Z3','AA2:AE2','AA3:AE3');
	for($i=0; $i<count($merge_cells); $i++) {
		$excel->merge_cells($merge_cells[$i]);
	}

	// $excel->getActiveSheet()->getStyle('A')
    // ->getNumberFormat()
    // ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);

	/* Place value */
	$col = 'A'; $row = '3'; $excel->place_value($col.$row,'PRODUCTION DATA','string');
	$col = 'AA'; $row = '2'; $excel->place_value($col.$row,'PRODUCTION EVALUATION REPORT','string');
	$col = 'T'; $row = '3'; $excel->place_value($col.$row,'TIME','string');
	$col = 'Y'; $row = '3'; $excel->place_value($col.$row,'QTY','string');
	$col = 'AA'; $row = '3'; $excel->place_value($col.$row,'KEY PERFORMANCE INDECES','string');
	$col = 'A'; $row = '4'; $excel->place_value($col.$row,'PRODUCTION DATE','string');
	$col = 'B'; $row = '4'; $excel->place_value($col.$row,'SHIFT','string');
	$col = 'C'; $row = '4'; $excel->place_value($col.$row,'LOCATION','string');
	$col = 'D'; $row = '4'; $excel->place_value($col.$row,'CATEGORY','string');
	$col = 'E'; $row = '4'; $excel->place_value($col.$row,'SERIES','string');
	$col = 'F'; $row = '4'; $excel->place_value($col.$row,'LINE','string');
	$col = 'G'; $row = '4'; $excel->place_value($col.$row,'Auto / Semi-Auto / Manual','string');
	$col = 'H'; $row = '4'; $excel->place_value($col.$row,'PIC','string');
	$col = 'I'; $row = '4'; $excel->place_value($col.$row,'QSAT(Sec)','string');
	$col = 'J'; $row = '4'; $excel->place_value($col.$row,'STANDARD MANPOWER BASE ON QSAT','string');
	$col = 'K'; $row = '4'; $excel->place_value($col.$row,'ACTUAL MANPOWER','string');
	$col = 'L'; $row = '4'; $excel->place_value($col.$row,'WORK HOURS(Hrs rendered per shift)','string');
	$col = 'M'; $row = '4'; $excel->place_value($col.$row,'CAPACITY BASE ON QSAT (Unit per shift)','string');
	$col = 'N'; $row = '4'; $excel->place_value($col.$row,'PRODUCTION TARGET','string');
	$col = 'O'; $row = '4'; $excel->place_value($col.$row,'PLANNED QTY (PPC PLAN)','string');
	$col = 'P'; $row = '4'; $excel->place_value($col.$row,'GOOD (qty)','string');
	$col = 'Q'; $row = '4'; $excel->place_value($col.$row,'NG (qty)','string');
	$col = 'R'; $row = '4'; $excel->place_value($col.$row,'INPUT QTY','string');
	$col = 'S'; $row = '4'; $excel->place_value($col.$row,'DOWNTIME (mins)','string');
	$col = 'T'; $row = '4'; $excel->place_value($col.$row,'DOWNTIME (hrs)','string');
	$col = 'U'; $row = '4'; $excel->place_value($col.$row,'PLAN RUNNING TIME','string');
	$col = 'V'; $row = '4'; $excel->place_value($col.$row,'RUN TIME','string');
	$col = 'W'; $row = '4'; $excel->place_value($col.$row,'RUN TIME BASE ON SAT','string');
	$col = 'X'; $row = '4'; $excel->place_value($col.$row,'MISSING TIME','string');
	$col = 'Y'; $row = '4'; $excel->place_value($col.$row,'EXPECTED OUTPUT(Units)','string');
	$col = 'Z'; $row = '4'; $excel->place_value($col.$row,'ACTUAL OUTPUT(Units)','string');
	$col = 'AA'; $row = '4'; $excel->place_value($col.$row,'LINE AVAILABILITY (A%)','string');
	$col = 'AB'; $row = '4'; $excel->place_value($col.$row,'LINE PERFORMANCE (P%)','string');
	$col = 'AC'; $row = '4'; $excel->place_value($col.$row,'LINE YIELD (Q%)','string');
	$col = 'AD'; $row = '4'; $excel->place_value($col.$row,'OEE%','string');
	$col = 'AE'; $row = '4'; $excel->place_value($col.$row,'OUTPUT ACHIEVEMENT %','string');
	$col = 'AF'; $row = '4'; $excel->place_value($col.$row,'DPPM','string');

// $array_fields 	= array('*');
// $table 	   		= 'tbl_alert';
// $joins 	   		= 'RIGHT JOIN tbl_product_line ON tbl_product_line.product_name = tbl_alert.line_affected';
// // $sql_where 		= 'WHERE tbl_alert.pkid IN (SELECT MAX(pkid) FROM tbl_alert WHERE date_started BETWEEN $startDate AND $endDate GROUP BY line_affected) AND tbl_alert.logdel = 0';
// $sql_order 		= 'ORDER BY date_started ASC';
// $sql_limit 		= '';

	$startDate 		= $_GET['startDate'];
	$endDate 		= $_GET['endDate'];
	$startDate 		= strtotime($startDate);
	$endDate 		= strtotime($endDate);
	$start 		= date('Y-m-d',$startDate);
	$end 		= date('Y-m-d',$endDate);

$ctrRow = '5';
$ctrRow_test = 5;
$sql_list_of_lines = array();


//test date loop
$date_array = array();
for($date = $startDate; $date <= $endDate; $date = $date + 86400){
	$date1 = date('Y-m-d',$date);
	$date_array[] = $date1;
}
			

for($i = 0; $i < count($date_array); $i++){

	$j = $i + 1;

	$start = $date_array[$i];
	$end = $date_array[$j];

			$result_query = ALERT::getInstance()->select_query_PER1($start,$end);

			while ($row = mysqli_fetch_assoc($result_query))
			{
				date_default_timezone_set('Asia/Manila');
				$sql_list_of_lines = $row;
			
				//date range of line stop
				$date_started = $sql_list_of_lines['date_started'];

				if($sql_list_of_lines['date_finished'] == null && $sql_list_of_lines['time_finished'] == null){
					
					$raw_date_finished = date("Y-m-d");
					$time_finished = date("h:i");
					
					if(strtotime($time_finished) < strtotime("07:30")){
						$date_finished = date("Y-m-d");
						$date_finished = date('Y-m-d', strtotime($date_finished) - 86400);
					}
					else{
						$date_finished = date("Y-m-d");
					}
					
				}elseif(strtotime($sql_list_of_lines['time_finished']) < strtotime("07:30")){

					$raw_date_finished = date('Y-m-d', strtotime($sql_list_of_lines['date_finished']));
					$date_finished = date('Y-m-d', strtotime($sql_list_of_lines['date_finished']) - 86400);

					$time_finished = $sql_list_of_lines['time_finished'];
				// }
				}else{
					$raw_date_finished = $sql_list_of_lines['date_finished'];
					$date_finished = $sql_list_of_lines['date_finished'];
					$time_finished = $sql_list_of_lines['time_finished'];
				}

				$date_started 	= strtotime($date_started);
				$date_finished 	= strtotime($date_finished);

				//test date loop
				// $sub_date_array = array();

				for($sub_date = $date_started; $sub_date <= $date_finished; $sub_date = $sub_date + 86400){
					$sub_date1 = date('Y-m-d',$sub_date);
					// $sub_date_array[] = $sub_date1;
				// }

				//SHIFT A - 07:30AM - 19:30PM
				//SHIFT B - 19:31PM - 07:29AM

				// for($i = 0; $i < count($sub_date_array); $i++)
				// {
						$j = $i + 1;
						$prod_date = date('m/d/Y, l',strtotime($sub_date1));

						//loop 2 shits for shift A & B
						for($current_shift = 0; $current_shift < 2; $current_shift++)
						{
							$shift = array("A","B");

							$excel->getActiveSheet()->getRowDimension($ctrRow)->setRowHeight(14);
							
							$cell_range = 'A'.$ctrRow.':AF'.$ctrRow; $excel->set_format($cell_range,$content_format);
							
							$excel->getActiveSheet()->getStyle('A'.$ctrRow.':AF'.$ctrRow)->applyFromArray(
								array('borders' => array(
										'allborders'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
									)
								)
							);

							// $cell_range_conditional = 'AA'.$ctrRow.':AE'.$ctrRow; $excel->set_format($cell_range_conditional,$array_conditional_format);

							$shift_a_downtime_mins_array = array();
							$shift_a_downtime_hours_array = array();
							$shift_b_downtime_mins_array = array();
							$shift_b_downtime_hours_array = array();

								$shift_a_start_time = "07:30";
								$shift_a_end_time = "19:30";
								$shift_b_start_time = "19:30";
								$shift_b_end_time = "07:30";

								$DS = date('Y-m-d',$date_started);
								$DF = date('Y-m-d',$date_finished);
								// $date_finished 	= $date_finished + 86400;

								if(strtotime($DS) == strtotime($sub_date1) && strtotime($DF) > strtotime($sub_date1)){
									$SAS = date('Y-m-d H:i',strtotime($sql_list_of_lines['date_started'].' '.$sql_list_of_lines['time_started']));
									$SAE = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_a_end_time));
									$SBS = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_b_start_time));
									$SBE = date('Y-m-d H:i',strtotime(date('Y-m-d',(strtotime($sub_date1) + 86400)).' '.$shift_b_end_time));
								}
								elseif(strtotime($DS) < strtotime($sub_date1) && strtotime($DF) > strtotime($sub_date1)){
									$SAS = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_a_start_time));
									$SAE = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_a_end_time));
									$SBS = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_b_start_time));
									$SBE = date('Y-m-d H:i',strtotime(date('Y-m-d',(strtotime($sub_date1) + 86400)).' '.$shift_b_end_time));
								}
								elseif(strtotime($DS) < strtotime($sub_date1) && strtotime($DF) == strtotime($sub_date1)){
									$SAS = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_a_start_time));
									$SAE = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_a_end_time));
									$SBS = date('Y-m-d H:i',strtotime($sub_date1.' '.$shift_b_start_time));
									$SBE = date('Y-m-d H:i',strtotime($raw_date_finished.' '.$time_finished));
								}

								$shift_a_downtime = strtotime($SAE) - strtotime($SAS);
								$shift_b_downtime = strtotime($SBE) - strtotime($SBS);

								//SHIFT A
									/* get the minute difference */
									$shift_a_downtime_mins = $shift_a_downtime / 60;
									// $shift_a_downtime_mins = explode(".",$shift_a_downtime_mins);

									//final diff in mins
									// $shift_a_downtime_mins = $shift_a_downtime_mins[0];

									/* get difference in hour */
									$shift_a_downtime_hrs = $shift_a_downtime_mins / 60;
									$shift_a_downtime_hrs_mins = $shift_a_downtime_mins % 60;

									// $shift_a_downtime_hrs = explode(".",$shift_a_downtime_hrs);
									// $shift_a_downtime_hrs = $shift_a_downtime_hrs[0];

									//final diff in hour
									// $shift_a_downtime_hrs = $shift_a_downtime_hrs.'.'.$shift_a_downtime_hrs_mins;

								//SHIFT B
									/* get the minute difference */
									$shift_b_downtime_mins = $shift_b_downtime / 60;
									// $shift_b_downtime_mins = explode(".",$shift_b_downtime_mins);

									//final diff in mins
									// $shift_b_downtime_mins = $shift_b_downtime_mins[0];

									/* get difference in hour */
									$shift_b_downtime_hrs = $shift_b_downtime_mins / 60;
									$shift_b_downtime_hrs_mins = $shift_b_downtime_mins % 60;

									// $shift_b_downtime_hrs = explode(".",$shift_b_downtime_hrs);
									// $shift_b_downtime_hrs = $shift_b_downtime_hrs[0];

									//final diff in hour
									// $shift_b_downtime_hrs = $shift_b_downtime_hrs.'.'.$shift_b_downtime_hrs_mins;

									$shift_a_downtime_mins_array[] = $shift_a_downtime_mins;
									$shift_a_downtime_hours_array[] = $shift_a_downtime_hrs;
									$shift_b_downtime_mins_array[] = $shift_b_downtime_mins;
									$shift_b_downtime_hours_array[] = $shift_b_downtime_hrs;
								

							// $prod_date = $sql_list_of_lines['date_started'];
							// $prod_date = date('l, d F, Y',strtotime($prod_date));
							
							$product_name = $sql_list_of_lines['product_name'];

							$manpower_affected_count = ALERT::getInstance()->select_query_mp_count($product_name,$start,$end);
							$manpower_affected = mysqli_fetch_assoc($manpower_affected_count);

							// Conditional Formatting -> line availability(R) Start
							$conditional_IN_QTY_lessthan = new PHPExcel_Style_Conditional();
							$conditional_IN_QTY_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_IN_QTY_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_IN_QTY_lessthan->addCondition('$N'.$ctrRow);
							$conditional_IN_QTY_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_IN_QTY_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');
							
							$conditionalStyles_IN_QTY = $excel->getActiveSheet()->getStyle('R'.$ctrRow.':R'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_IN_QTY[] = $conditional_IN_QTY_lessthan;

							$excel->getActiveSheet()->getStyle(('R'.$ctrRow.':R'.$ctrRow))->setConditionalStyles($conditionalStyles_IN_QTY);
							// Conditional Formatting -> line availability(R) End 

							// Conditional Formatting -> Missing Time(X) Start
							$conditional_MissingTime_lessthan = new PHPExcel_Style_Conditional();
							$conditional_MissingTime_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_MissingTime_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_MissingTime_lessthan->addCondition(0);
							$conditional_MissingTime_lessthan->getStyle()->getFont()->setBold(true)->getColor()->setARGB('9C0006');
							
							$conditionalStyles_MissingTime = $excel->getActiveSheet()->getStyle('X'.$ctrRow.':X'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_MissingTime[] = $conditional_MissingTime_lessthan;

							$excel->getActiveSheet()->getStyle(('X'.$ctrRow.':X'.$ctrRow))->setConditionalStyles($conditionalStyles_MissingTime);
							// Conditional Formatting -> Missing Time(X) End 

							// Conditional Formatting -> Expected Output(Y) Start
							$conditional_ExpectedOutput_lessthan = new PHPExcel_Style_Conditional();
							$conditional_ExpectedOutput_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_ExpectedOutput_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_ExpectedOutput_lessthan->addCondition(0);
							$conditional_ExpectedOutput_lessthan->getStyle()->getFont()->setBold(true)->getColor()->setARGB('9C0006');
							
							$conditionalStyles_ExpectedOutput = $excel->getActiveSheet()->getStyle('Y'.$ctrRow.':Y'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_ExpectedOutput[] = $conditional_ExpectedOutput_lessthan;

							$excel->getActiveSheet()->getStyle(('Y'.$ctrRow.':Y'.$ctrRow))->setConditionalStyles($conditionalStyles_ExpectedOutput);
							// Conditional Formatting -> Expected Output(Y) End
							
							// Conditional Formatting -> Actual Output(Z) Start
							$conditional_ActualOutput_lessthan_01 = new PHPExcel_Style_Conditional();
							$conditional_ActualOutput_lessthan_01->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_ActualOutput_lessthan_01->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_ActualOutput_lessthan_01->addCondition('$Y'.$ctrRow);
							$conditional_ActualOutput_lessthan_01->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_ActualOutput_lessthan_01->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_ActualOutput_lessthan_02 = new PHPExcel_Style_Conditional();
							$conditional_ActualOutput_lessthan_02->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_ActualOutput_lessthan_02->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_ActualOutput_lessthan_02->addCondition(0);
							$conditional_ActualOutput_lessthan_02->getStyle()->getFont()->setBold(true)->getColor()->setARGB('9C0006');
							
							$conditionalStyles_ActualOutput = $excel->getActiveSheet()->getStyle('Z'.$ctrRow.':Z'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_ActualOutput[] = $conditional_ActualOutput_lessthan_01;
							$conditionalStyles_ActualOutput[] = $conditional_ActualOutput_lessthan_02;

							$excel->getActiveSheet()->getStyle(('Z'.$ctrRow.':Z'.$ctrRow))->setConditionalStyles($conditionalStyles_ActualOutput);
							// Conditional Formatting -> Actual Output(Z) End

							// Conditional Formatting -> line availability(AA) Start
							$conditional_line_A_lessthan = new PHPExcel_Style_Conditional();
							$conditional_line_A_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_A_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_line_A_lessthan->addCondition(0.97);
							$conditional_line_A_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_line_A_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_line_A_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_line_A_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_A_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_line_A_greaterthan->addCondition(0.969999);
							$conditional_line_A_greaterthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_line_A_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');
							
							$conditionalStyles_lineA = $excel->getActiveSheet()->getStyle('AA'.$ctrRow.':AA'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_lineA[] = $conditional_line_A_lessthan;
							$conditionalStyles_lineA[] = $conditional_line_A_greaterthan;

							$excel->getActiveSheet()->getStyle(('AA'.$ctrRow.':AA'.$ctrRow))->setConditionalStyles($conditionalStyles_lineA);
							// Conditional Formatting -> line availability(AA) End 

							// Conditional Formatting -> line performance(AB) Start
							$conditional_line_P_lessthan = new PHPExcel_Style_Conditional();
							$conditional_line_P_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_P_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_line_P_lessthan->addCondition(0.95);
							$conditional_line_P_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_line_P_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_line_P_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_line_P_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_P_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_line_P_greaterthan->addCondition(0.95);
							$conditional_line_P_greaterthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_line_P_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');
							
							$conditionalStyles_lineP = $excel->getActiveSheet()->getStyle('AB'.$ctrRow.':AB'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_lineP[] = $conditional_line_P_lessthan;
							$conditionalStyles_lineP[] = $conditional_line_P_greaterthan;

							$excel->getActiveSheet()->getStyle(('AB'.$ctrRow.':AB'.$ctrRow))->setConditionalStyles($conditionalStyles_lineP);
							// Conditional Formatting -> line performance(AB) End 

							// Conditional Formatting -> line performance(AC) Start
							$conditional_line_Q_lessthan = new PHPExcel_Style_Conditional();
							$conditional_line_Q_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_Q_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_line_Q_lessthan->addCondition(99.7);
							$conditional_line_Q_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_line_Q_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_line_Q_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_line_Q_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_line_Q_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_line_Q_greaterthan->addCondition(99.7);
							$conditional_line_Q_greaterthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_line_Q_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');
							
							$conditionalStyles_lineQ = $excel->getActiveSheet()->getStyle('AC'.$ctrRow.':AC'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_lineQ[] = $conditional_line_Q_lessthan;
							$conditionalStyles_lineQ[] = $conditional_line_Q_greaterthan;

							$excel->getActiveSheet()->getStyle(('AC'.$ctrRow.':AC'.$ctrRow))->setConditionalStyles($conditionalStyles_lineQ);
							// Conditional Formatting -> line performance(AC) End 

							// Conditional Formatting -> line performance(AD) Start
							$conditional_OEE_red_lessthan = new PHPExcel_Style_Conditional();
							$conditional_OEE_red_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OEE_red_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_OEE_red_lessthan->addCondition(0.97);
							$conditional_OEE_red_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_OEE_red_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_OEE_red_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_OEE_red_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OEE_red_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_OEE_red_greaterthan->addCondition(1.03);
							$conditional_OEE_red_greaterthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_OEE_red_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_OEE_green_lessthan = new PHPExcel_Style_Conditional();
							$conditional_OEE_green_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OEE_green_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_OEE_green_lessthan->addCondition(1.03);
							$conditional_OEE_green_lessthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_OEE_green_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');

							$conditional_OEE_green_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_OEE_green_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OEE_green_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_OEE_green_greaterthan->addCondition(0.97);
							$conditional_OEE_green_greaterthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_OEE_green_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');
							
							$conditionalStyles_OEE = $excel->getActiveSheet()->getStyle('AD'.$ctrRow.':AD'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_OEE[] = $conditional_OEE_red_lessthan;
							$conditionalStyles_OEE[] = $conditional_OEE_red_greaterthan;
							$conditionalStyles_OEE[] = $conditional_OEE_green_lessthan;
							$conditionalStyles_OEE[] = $conditional_OEE_green_greaterthan;

							$excel->getActiveSheet()->getStyle(('AD'.$ctrRow.':AD'.$ctrRow))->setConditionalStyles($conditionalStyles_OEE);
							// Conditional Formatting -> line performance(AD) End

							// Conditional Formatting -> line performance(AE) Start
							$conditional_OA_red_lessthan = new PHPExcel_Style_Conditional();
							$conditional_OA_red_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OA_red_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_OA_red_lessthan->addCondition(0.97);
							$conditional_OA_red_lessthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_OA_red_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_OA_red_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_OA_red_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OA_red_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_OA_red_greaterthan->addCondition(1.03);
							$conditional_OA_red_greaterthan->getStyle()->getFont()->getColor()->setARGB('9C0006');
							$conditional_OA_red_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('FFC7CE');

							$conditional_OA_green_lessthan = new PHPExcel_Style_Conditional();
							$conditional_OA_green_lessthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OA_green_lessthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
							$conditional_OA_green_lessthan->addCondition(1.03);
							$conditional_OA_green_lessthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_OA_green_lessthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');

							$conditional_OA_green_greaterthan = new PHPExcel_Style_Conditional();
							$conditional_OA_green_greaterthan->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
							$conditional_OA_green_greaterthan->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN);
							$conditional_OA_green_greaterthan->addCondition(0.97);
							$conditional_OA_green_greaterthan->getStyle()->getFont()->getColor()->setARGB('006100');
							$conditional_OA_green_greaterthan->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getEndColor()->setARGB('C6EFCE');
							
							$conditionalStyles_OA = $excel->getActiveSheet()->getStyle('AE'.$ctrRow.':AE'.$ctrRow)->getConditionalStyles();
							$conditionalStyles_OA[] = $conditional_OA_red_lessthan;
							$conditionalStyles_OA[] = $conditional_OA_red_greaterthan;
							$conditionalStyles_OA[] = $conditional_OA_green_lessthan;
							$conditionalStyles_OA[] = $conditional_OA_green_greaterthan;

							$excel->getActiveSheet()->getStyle(('AE'.$ctrRow.':AE'.$ctrRow))->setConditionalStyles($conditionalStyles_OA);
							// Conditional Formatting -> line performance(AE) End

								$col = 'A'; $row = $ctrRow; $excel->place_value($col.$row,$prod_date,'string');
								$col = 'B'; $row = $ctrRow; $excel->place_value($col.$row,$shift[$current_shift],'string');
								$col = 'C'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['area'],'string');
								$col = 'D'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['category'],'string');
								$col = 'E'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['line_affected'],'string');
								$col = 'F'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['line_number'],'string');
								$col = 'G'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['production_type'],'string');
								$col = 'H'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['person_in_charge'],'string');
								$col = 'I'; $row = $ctrRow; $excel->place_value($col.$row,$sql_list_of_lines['sat'],'number_2_decimal');
								$col = 'J'; $row = $ctrRow; $excel->place_value($col.$row,'','number_2_decimal');
								$col = 'K'; $row = $ctrRow; $excel->place_value($col.$row,$manpower_affected['mp_count'],'int');
								$col = 'L'; $row = $ctrRow; $excel->place_value($col.$row,'','int');
								$col = 'M'; $row = $ctrRow; $excel->place_value($col.$row,'=IFERROR((3600/(I'.$ctrRow.'/J'.$ctrRow.'))*L'.$ctrRow.',"")','number_2_decimal');
								$col = 'N'; $row = $ctrRow; $excel->place_value($col.$row,'','number_0_decimal');
								$col = 'O'; $row = $ctrRow; $excel->place_value($col.$row,'','number_0_decimal');
								$col = 'P'; $row = $ctrRow; $excel->place_value($col.$row,'','number_0_decimal');
								$col = 'Q'; $row = $ctrRow; $excel->place_value($col.$row,'','number_0_decimal');
								$col = 'R'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",P'.$ctrRow.'+Q'.$ctrRow.')','number_0_decimal');

								if($current_shift == 0){
									$col = 'S'; $row = $ctrRow; $excel->place_value($col.$row,array_sum($shift_a_downtime_mins_array),'number_2_decimal');
									$col = 'T'; $row = $ctrRow; $excel->place_value($col.$row,array_sum($shift_a_downtime_hours_array),'number_2_decimal');
								}elseif($current_shift == 1){
									$col = 'S'; $row = $ctrRow; $excel->place_value($col.$row,array_sum($shift_b_downtime_mins_array),'number_2_decimal');
									$col = 'T'; $row = $ctrRow; $excel->place_value($col.$row,array_sum($shift_b_downtime_hours_array),'number_2_decimal');
								}
								
								$col = 'U'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR((M'.$ctrRow.'*(I'.$ctrRow.'/J'.$ctrRow.'))/3600,""))','number_2_decimal');
								$col = 'V'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(U'.$ctrRow.'-T'.$ctrRow.',""))','number_2_decimal');
								$col = 'W'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(R'.$ctrRow.'*(I'.$ctrRow.'/J'.$ctrRow.')/3600,""))','number_2_decimal');
								$col = 'X'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(W'.$ctrRow.'-V'.$ctrRow.',""))','number_2_decimal');
								$col = 'Y'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(3600/(I'.$ctrRow.'/J'.$ctrRow.')*V'.$ctrRow.',""))','number_2_decimal');
								$col = 'Z'; $row = $ctrRow; $excel->place_value($col.$row,'=R'.$ctrRow.'','number_2_decimal');
								$col = 'AA'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(V'.$ctrRow.'/U'.$ctrRow.',""))','percentage_2_decimal');
								$col = 'AB'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",Z'.$ctrRow.'/Y'.$ctrRow.')','percentage_2_decimal');
								$col = 'AC'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(P'.$ctrRow.'/(P'.$ctrRow.'+Q'.$ctrRow.'),""))','percentage_2_decimal');
								$col = 'AD'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(AA'.$ctrRow.'*AB'.$ctrRow.'*AC'.$ctrRow.',""))','percentage_2_decimal');
								$col = 'AE'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",IFERROR(P'.$ctrRow.'/O'.$ctrRow.',""))','percentage_2_decimal');
								$col = 'AF'; $row = $ctrRow; $excel->place_value($col.$row,'=IF(ISBLANK(P'.$ctrRow.'),"",Q'.$ctrRow.'/R'.$ctrRow.'*1000000)','number_0_decimal');

								$ctrRow++;
							// orig code
						}//shift loop end
				}//sub_date loop end
			}//while loop end
// }//test date loop end
}//forloop end


	/* set file name */
	$filename = "Line - PER";
	/* output excel - filename, excel version (2003,2007) */
	$excel->output($filename,'2007');
?>