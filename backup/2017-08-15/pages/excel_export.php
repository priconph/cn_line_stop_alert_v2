<?php
$excel_class = '../class/excel_new.php';
if(file_exists($excel_class)){
	include($excel_class);
}else{
	echo 'File '.$excel_class.' does not exist';
	exit;
}

$excel = new EXCEL;
/* set title */
$excel->title = 'Expired Materials';
/* add a new page */
$excel->add_page();
/* use the default font style */
$excel->set_default_font_style();
/* select an active page */
$excel->set_active_sheet(0);



/* set file name */
$filename = "sample";
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');
