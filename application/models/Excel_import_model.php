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

	function join()
	{
		$this->db->select('SUBSTRING(sheet2.pin_new,17,3) AS pin_new, sheet1.old_pin AS old_pin, sheet1.owner AS owner, 
		sheet1.owner_address AS owner_address, sheet1.td AS td, sheet1.title AS title, 
		sheet1.cad_lot AS cad_lot, sheet1.area1 AS area1, sheet1.area2 AS area2, sheet1.kind1 AS kind1, 
		sheet1.kind2 AS kind2, sheet1.actual_use AS actual_use');
		$this->db->from('sheet1');
		$this->db->join('sheet2','sheet1.old_pin = sheet2.old_pin');
		//$this->db->order_by('sheet1_id', 'ASC');
		$this->db->group_by('sheet1_id');
		$query = $this->db->get();
		return $query;
	}
	
	function count_all()
	{
	$query = $this->db->get("sheet2");
	return $query->num_rows();
	}

	function fetch_details($limit, $start)
	{
		$output = '';
		$this->db->select("sheet2_id, old_pin");
		$this->db->from("sheet2");
		$this->db->order_by("sheet2_id", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered">
		<tr>
			<th>Sheet2_id</th>
			<th>Old_pin</th>
		</tr>
		';
		foreach($query->result() as $row)
		{
		$output .= '
		<tr>
			<td>'.$row->sheet2_id.'</td>
			<td>'.$row->old_pin.'</td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}
}
