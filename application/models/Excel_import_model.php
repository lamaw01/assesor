<?php
class Excel_import_model extends CI_Model
{
	function select_sheet1()
	{
		$this->db->order_by('sheet1_id', 'ASC');
		$query = $this->db->get('sheet1');
		return $query;
	}

	function insert_sheet1($data)
	{
		$this->db->insert_batch('sheet1', $data);
	}

	function select_sheet2()
	{
		$this->db->order_by('sheet2_id', 'ASC');
		$query = $this->db->get('sheet2');
		return $query;
	}

	function insert_sheet2($data)
	{
		$this->db->insert_batch('sheet2', $data);
	}
}
