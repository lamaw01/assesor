<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheet extends CI_Controller {

	public function sheet1()
	{
		$this->load->view('sheet1');
	}

	public function sheet2()
	{
		$this->load->view('sheet2');
	}

	public function report()
	{
		$this->load->view('report');
	}
}
