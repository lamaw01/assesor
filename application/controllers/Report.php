<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dropdown_model');
	}

	public function index()
	{	
		$data['sorter'] = $this->dropdown_model->getdata('sorter');
		$this->load->view('report', $data);
	}

}
