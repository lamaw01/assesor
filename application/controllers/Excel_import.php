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

	function pagination_sheet2()
	{
		$this->load->model("excel_import_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "sheet/sheet2";
		$config["total_rows"] = $this->excel_import_model->count_sheet2();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link'  => $this->pagination->create_links(),
			'sheet2_table'   => $this->excel_import_model->fetch_sheet2($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	function pagination_sheet1()
	{
		$this->load->model("excel_import_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "sheet/sheet1";
		$config["total_rows"] = $this->excel_import_model->count_sheet1();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link'  => $this->pagination->create_links(),
			'sheet1_table'   => $this->excel_import_model->fetch_sheet1($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	function pagination_report()
	{
		$sort_val = '01';
		#$sort_val = $this->input->post('sort_val');
		$this->load->model("excel_import_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "sheet/report";
		$config["total_rows"] = $this->excel_import_model->count_report($sort_val);
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link'  => $this->pagination->create_links(),
			'report_table'   => $this->excel_import_model->fetch_report($config["per_page"], $start, $sort_val)
		);
		echo json_encode($output);
	}
	
}

?>