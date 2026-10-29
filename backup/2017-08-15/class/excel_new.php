<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $parent_class = "../../media/PHPExcel.php";
$parent_class = "../../media/PHPExcel-1.8/Classes/PHPExcel.php";
if(file_exists($parent_class)){
	include($parent_class); //call the parent class
}else{
	echo 'file '.$parent_class.' does not exist!';
	exit;
}
	
class EXCEL extends PHPExcel{
	public $title = '';
	public $objSheet = '';
	/* 
		create new phpexcel page
	*/
	public function add_page(){
		$this->objSheet = $this->getActiveSheet();
		$this->objSheet->setTitle($this->title); //set title cont.
	}
	/* 
		Set default font style
	*/
	public function set_default_font_style(){
		$this->getDefaultStyle()->getFont()->setName('Lucida Fax');
	}
	/* 
		Set active sheet
	*/
	public function set_active_sheet($sheet_number){
		$this->setActiveSheetIndex($sheet_number);
	}
	/* 
		Create new sheet
	*/
	public function add_sheet($index){
		$this->createSheet($index);
		$this->set_active_sheet($index);
		$this->objSheet = $this->getActiveSheet();
		$this->objSheet->setTitle($this->title); //set title cont.
	}
	/* 
		Set cell width
	*/
	public function set_width($cell,$width){
		$this->objSheet->getColumnDimension($cell)->setWidth($width);
	}
	/* 
		Set height
	*/
	public function set_height($array_row,$array_height){
		for($x=0;$x<count($array_row);$x++){
			$this->objSheet->getRowDimension($array_row[$x])->setRowHeight($array_height[$x]);
		}
	}
	/* 
		Set borders
	*/
	public function set_borders($cell,$left,$right,$top,$bottom){
		$default_border = PHPExcel_Style_Border::BORDER_THIN;
		if($left == '1' && $right == '1' && $top == '1' && $bottom == '1'){
			$styleArray = array(
			  'borders' => array(
				'allborders' => array(
				  'style' => $default_border,
				)
			  )
			);
			$this->objSheet->getStyle($cell)->applyFromArray($styleArray);
		}else{
			if($left == '1'){
				$left_border = array(
				  'borders' => array(
					'left' => array(
						  'style' => $default_border,
						)
					)
				);
				$this->objSheet->getStyle($cell)->applyFromArray($left_border);
			}
			if($right == '1'){
				$right_border = array(
				  'borders' => array(
					'right' => array(
						  'style' => $default_border,
						)
					)
				);
				$this->objSheet->getStyle($cell)->applyFromArray($right_border);
			}
			if($top == '1'){
				$top_border = array(
				  'borders' => array(
					'top' => array(
						  'style' => $default_border,
						)
					)
				);
				$this->objSheet->getStyle($cell)->applyFromArray($top_border);
			}
			if($bottom == '1'){
				$bottom_border = array(
				  'borders' => array(
					'bottom' => array(
						  'style' => $default_border,
						)
					)
				);
				$this->objSheet->getStyle($cell)->applyFromArray($bottom_border);
			}
		}
	}
	/* 
		merge cells
	*/
	public function merge_cells($cell){
		$this->objSheet->mergeCells($cell); 
	}
	/* 
		set font 
	*/
	public function set_font($cell,$bold,$color,$background_color,$size,$font){
		if(!$bold){
			$bold = false;
		}
		if($color == ''){
			$color = '000000';
		}
		if($background_color != ''){
			$background_type = PHPExcel_Style_Fill::FILL_SOLID;
		}else{
			$background_color 	= '';
			$background_type	= '';
		}
		if($size == ''){
			$size = '12';
		}
		if($font == ''){
			$font = 'Arial';
		}
		$styleArray = array(
			'font'  => array(
				'bold'  => $bold,
				'color' => array('rgb' => $color),
				'size'  => $size,
				'name'  => $font
			)
			,'fill' => array(
					'type' => $background_type,
					'color' => array('rgb' => $background_color)
			)
		);
		$this->objSheet->getStyle($cell)->applyFromArray($styleArray);
	}
	/* 
		place values
	*/
	public function place_value($cell,$value,$data_type){
		if(!isset($data_type)){
			$data_type = '';
		}
		if(isset($data_type) && $data_type == 'string'){
			$this->objSheet->setCellValueExplicit($cell, $value, PHPExcel_Cell_DataType::TYPE_STRING);
		}else if($data_type == 'number_2_decimal'){
			$this->objSheet->getCell($cell)->setValue($value);
			$this->objSheet->getStyle($cell)->getNumberFormat()->setFormatCode('0.00');
		}else if($data_type == 'number_0_decimal'){
			$this->objSheet->getCell($cell)->setValue($value);
			$this->objSheet->getStyle($cell)->getNumberFormat()->setFormatCode('0');
		}else if($data_type == 'percentage_0_decimal'){
			$this->objSheet->getCell($cell)->setValue($value);
			$this->objSheet->getStyle($cell)->getNumberFormat()->setFormatCode('0');
			$style_array_percentage = array( 
												'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
											);
			$this->objSheet->getStyle($cell)->getNumberFormat()->applyFromArray( $style_array_percentage );
		}else if($data_type == 'percentage_2_decimal'){
			$this->objSheet->getCell($cell)->setValue($value);
			$this->objSheet->getStyle($cell)->getNumberFormat()->setFormatCode('0');
			$style_array_percentage = array( 
												'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00
											);
			$this->objSheet->getStyle($cell)->getNumberFormat()->applyFromArray( $style_array_percentage );
		}
		else{
			$this->objSheet->getCell($cell)->setValue($value);
		}
	}
	
	public function set_format($cell,$array_format){
		$array_font = array();
		$array_fill = array();
		$array_alignment = array();
		$array_format_code = array();
		/********************
		* 		FONT 		*
		********************/
		/* font style */
		if(isset($array_format['name']) && $array_format['name'] != ''){
			$name = $array_format['name'];
		}else{
			$name = "Arial";
		}
		$array_font['name'] = $name;
		/* font size */
		if(isset($array_format['size']) && $array_format['size'] != ''){
			$size = $array_format['size'];
		}else{
			$size = 10;
		}
		$array_font['size'] = $size;
		/* bold */
		if(isset($array_format['bold']) && $array_format['bold'] != '' && $array_format['bold'] != false){
			$bold = $array_format['bold'];
		}else{
			$bold = false;
		}
		$array_font['bold'] = $bold;
		/* color */
		if(isset($array_format['color']) && $array_format['color'] != ''){
			$color = $array_format['color'];
		}else{
			$color = '000000';
		}
		$array_font['color'] = array('rgb' => $color);
		/********************
		* 		FILL 		*
		********************/
		/* fill_color */
		if(isset($array_format['fill_color']) && $array_format['fill_color'] != ''){
			$color = $array_format['fill_color'];
			$type = PHPExcel_Style_Fill::FILL_SOLID;
		}else{
			$color = '000000';
			$type = '';
		}
		$array_fill['type'] = $type;
		$array_fill['color'] = array('rgb' => $color);
		/********************
		* 	  ALIGNMENT	   	*
		********************/
		/* alignment */
		if(isset($array_format['h_alignment']) && $array_format['h_alignment'] != ''){
			switch($array_format['h_alignment']){
				case "left" 	: $horizontal = PHPExcel_Style_Alignment::HORIZONTAL_LEFT; break;
				case "right"	: $horizontal = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT; break;
				case "center"	: $horizontal = PHPExcel_Style_Alignment::HORIZONTAL_CENTER; break;
			}
		}else{
			// $horizontal = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
			$horizontal = '';
		}
		if(isset($array_format['wordwrap']) && $array_format['wordwrap'] != '' && $array_format['wordwrap'] != false){
			$wordwrap = true;
		}else{
			$wordwrap = false;
		}
		$array_alignment['horizontal'] 	= $horizontal;
		$array_alignment['vertical'] 	= PHPExcel_Style_Alignment::VERTICAL_CENTER;
		$array_alignment['wrap'] 		= $wordwrap;
		
		/********************
		* 	ARRAY STYLE	*
		********************/
		$styleArray = array(
			 'font'  => $array_font
			,'fill' => $array_fill
			,'alignment' => $array_alignment
		);
		$this->objSheet->getStyle($cell)->applyFromArray($styleArray);
	}
	/* 
		Generate Excel Output 
	*/
	public function output($filename, $file_type){
		if($file_type == "2007"){
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename='.$filename.'.xlsx'); //used for excel 2007 format
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this, 'Excel2007'); //used for excel 2007 format
			$objWriter->setIncludeCharts(true);
		}else if($file_type == "2003"){
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename='.$filename.'.xls'); // used for excel 2003 format
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this, 'Excel5'); // used for excel 2003 format
		}else{
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename='.$filename.'.xlsx'); //used for excel 2007 format
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this, 'Excel2007'); //used for excel 2007 format
			$objWriter->setIncludeCharts(true);
		}
        if (ob_get_contents()) ob_end_clean();
		$objWriter->save('php://output');
	}
}
?>