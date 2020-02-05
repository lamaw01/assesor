<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('excel_import');
	}

	function fetch_sheet1()
	{
		$data = $this->excel_import_model->select_sheet1();
		$output = '
		<br />
		<h3 align="center">Excel Sheet 1</h3>
		<p align="center">Total Data - '.$data->num_rows().'<p>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Td</th>
				<th>Old_pin</th>
				<th>Ext</th>
				<th>Owner</th>
				<th>Owner_address</th>
				<th>Location</th>
				<th>Title</th>
				<th>Barangay</th>
				<th>Lot_description</th>
				<th>Cad_lot</th>
				<th>Class</th>
				<th>Assessment_date</th>
				<th>Area1</th>
				<th>Kind1</th>
				<th>Area2</th>
				<th>Kind2</th>
				<th>Bldg_desc</th>
				<th>Floor_area</th>
				<th>Mach_desc</th>
				<th>Actual_use</th>
				<th>Spec</th>
				<th>Taxable</th>
				<th>Av</th>
				<th>Mv</th>
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->td.'</td>
				<td>'.$row->old_pin.'</td>
				<td>'.$row->ext.'</td>
				<td>'.$row->owner.'</td>
				<td>'.$row->owner_address.'</td>
				<td>'.$row->location.'</td>
				<td>'.$row->title.'</td>
				<td>'.$row->barangay.'</td>
				<td>'.$row->lot_description.'</td>
				<td>'.$row->cad_lot.'</td>
				<td>'.$row->class.'</td>
				<td>'.$row->assessment_date.'</td>
				<td>'.$row->area1.'</td>
				<td>'.$row->kind1.'</td>
				<td>'.$row->area2.'</td>
				<td>'.$row->kind2.'</td>
				<td>'.$row->bldg_desc.'</td>
				<td>'.$row->floor_area.'</td>
				<td>'.$row->mach_desc.'</td>
				<td>'.$row->actual_use.'</td>
				<td>'.$row->spec.'</td>
				<td>'.$row->taxable.'</td>
				<td>'.$row->av.'</td>
				<td>'.$row->mv.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}
	
	function fetch_sheet2()
	{
		$data = $this->excel_import_model->select_sheet2();
		$output = '
		<br />
		<h3 align="center">Excel Sheet 2</h3>
		<p align="center">Total Data - '.$data->num_rows().'<p>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Old_pin</th>
				<th>Cad_no</th>
				<th>Parcel_no</th>
				<th>Barangay</th>
				<th>Section</th>
				<th>Pin_new</th>
				<th>Section_new</th>
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->old_pin.'</td>
				<td>'.$row->cad_no.'</td>
				<td>'.$row->parcel_no.'</td>
				<td>'.$row->barangay.'</td>
				<td>'.$row->section.'</td>
				<td>'.$row->pin_new.'</td>
				<td>'.$row->section_new.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import_sheet1()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$td = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$old_pin = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$ext = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$owner = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$owner_address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$location = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$title = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$barangay = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$lot_description = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$cad_lot = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$class = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$assessment_date = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$area1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$kind1 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$area2 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$kind2 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$bldg_desc = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$floor_area = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$mach_desc = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
					$actual_use = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
					$spec = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
					$taxable = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
					$av = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
					$mv = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
					$data[] = array(
						'Td'		=>	$td,
						'Old_pin'			=>	$old_pin,
						'Ext'				=>	$ext,
						'Owner'		=>	$owner,
						'Owner_address'			=>	$owner_address,
						'Location'			=>	$location,
						'Title'			=>	$title,
						'Barangay'			=>	$barangay,
						'Lot_description'		=>	$lot_description,
						'Cad_lot'			=>	$cad_lot,
						'Class'				=>	$class,
						'Assessment_date'		=>	$assessment_date,
						'Area1'			=>	$area1,
						'Kind1'			=>	$kind1,
						'Area2'			=>	$area2,
						'Kind2'		=>	$kind2,
						'Bldg_desc'			=>	$bldg_desc,
						'Floor_area'				=>	$floor_area,
						'Mach_desc'		=>	$mach_desc,
						'Actual_use'			=>	$actual_use,
						'Spec'			=>	$spec,
						'Taxable'			=>	$taxable,
						'Av'			=>	$av,
						'Mv'			=>	$mv,
					);
				}
			}
			$this->excel_import_model->insert_sheet1($data);
			echo 'Data Imported successfully';
		}	
	}

	function import_sheet2()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$old_pin = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$cad_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$parcel_no = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$barangay = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$section = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$pin_new = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$section_new = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$data[] = array(
						'Old_pin'		=>	$old_pin,
						'Cad_no'			=>	$cad_no,
						'Parcel_no'				=>	$parcel_no,
						'Barangay'		=>	$barangay,
						'Section'			=>	$section,
						'Pin_new'			=>	$pin_new,
						'Section_new'			=>	$section_new,
					);
				}
			}
			$this->excel_import_model->insert_sheet2($data);
			echo 'Data Imported successfully';
		}	
	}

	function fetch_join()
	{
		$data = $this->excel_import_model->join();
		$output = '
		<br />
		<h3 align="center">Joined Data</h3>
		<p align="center">Total Data - '.$data->num_rows().'<p>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Pin_New</th>
				<th>Old_pin</th>
				<th>Owner</th>
				<th>Owner_Address</th>
				<th>Td</th>
				<th>Title</th>
				<th>Cad_lot</th>
				<th>Area1</th>
				<th>Area2</th>
				<th>Kind1</th>
				<th>Kind2</th>
				<th>Actual_use</th>
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->pin_new.'</td>
				<td>'.$row->old_pin.'</td>
				<td>'.$row->owner.'</td>
				<td>'.$row->owner_address.'</td>
				<td>'.$row->td.'</td>
				<td>'.$row->title.'</td>
				<td>'.$row->cad_lot.'</td>
				<td>'.$row->area1.'</td>
				<td>'.$row->area2.'</td>
				<td>'.$row->kind1.'</td>
				<td>'.$row->kind2.'</td>
				<td>'.$row->actual_use.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}
}

?>