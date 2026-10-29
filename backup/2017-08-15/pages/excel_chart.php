<?php
/*
PHP Excel Charts 
Charts will only work on the latest version of PHPExcel 1.8
If you have any questions. Ask MJ..
I will send reply if I am not busy :D
*/

$excel_class = '../class/excel_new.php';

if(file_exists($excel_class)){
	include($excel_class);
}else{
	echo 'File '.$excel_class.' does not exist';
	exit;
}

$excel = new EXCEL;
/* set title */
$sheetTitle = 'Chat Example';
$excel->title = $sheetTitle;
/* add a new page */
$excel->add_page();
/* use the default font style */
$excel->set_default_font_style();
/* select an active page */
$excel->set_active_sheet(0);

$excel->place_value('A1','FiscalYear','');
$excel->place_value('B1','Score1','');
$excel->place_value('C1','Score2','');
$excel->place_value('D1','Score3','');

$max_row = '12';
$current_fiscal_year = '2017';

for($x=2;$x<=$max_row;$x++){
	$excel->place_value('A'.$x,'FY'.($current_fiscal_year-($x-2)),'');
}

for($x=2;$x<=$max_row;$x++){
	$excel->place_value('B'.$x,'=RANDBETWEEN(1,100)','');
}

for($x=2;$x<=$max_row;$x++){
	$excel->place_value('C'.$x,'=RANDBETWEEN(1,100)','');
}

for($x=2;$x<=$max_row;$x++){
	$excel->place_value('D'.$x,'=RANDBETWEEN(1,100)','');
}

/* Legend Entries */
$dsl=array(
	new \PHPExcel_Chart_DataSeriesValues('String', "'$sheetTitle'!\$B$1", NULL, 1),
	new \PHPExcel_Chart_DataSeriesValues('String', "'$sheetTitle'!\$C$1", NULL, 1),
	new \PHPExcel_Chart_DataSeriesValues('String', "'$sheetTitle'!\$D$1", NULL, 1),
);

/* Horizontal Category Axis Label (Example: FY2016, Months, etc.) */
$xal=array(
			new \PHPExcel_Chart_DataSeriesValues('String', "'$sheetTitle'!\$A$2:\$A\$".$max_row, NULL, 90),
		);
$dsv=array(
                new \PHPExcel_Chart_DataSeriesValues('Number', "'$sheetTitle'!\$B\$2:\$B\$".$max_row, NULL, 90),
                new \PHPExcel_Chart_DataSeriesValues('Number', "'$sheetTitle'!\$C\$2:\$C\$".$max_row, NULL, 90),
                new \PHPExcel_Chart_DataSeriesValues('Number', "'$sheetTitle'!\$D\$2:\$D\$".$max_row, NULL, 90)
            );

/* Chart Settings */
$ds=new \PHPExcel_Chart_DataSeries(
                    \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
                    \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                    range(0, count($dsv)-1),
                    $dsl,
                    $xal,
                    $dsv
                    );

$pa=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
$legend=new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$chart= new \PHPExcel_Chart(
                    'chart1',
                    $title,
                    $legend,
                    $pa,
                    true,
                    0,
                    NULL, 
                    NULL
                    );

$title=new \PHPExcel_Chart_Title('Sample Chart');
$ews = $excel->getSheet(0);
$chart->setTopLeftPosition('F2');
$chart->setBottomRightPosition('M16');
$ews->addChart($chart);
 
/* set file name */
$filename = "Line Chart - Example";
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');

?>
