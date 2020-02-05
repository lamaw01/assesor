<?php
class Excel_import_model extends CI_Model
{
	function insert_sheet1($data)
	{
		$this->db->insert_batch('sheet1', $data);
	}

	function insert_sheet2($data)
	{
		$this->db->insert_batch('sheet2', $data);
	}

	function count_sheet2()
	{
		$query = $this->db->get("sheet2");
		return $query->num_rows();
	}

	function fetch_sheet2($limit, $start)
	{
		$output = '';
		$this->db->select("*");
		$this->db->from("sheet2");
		$this->db->order_by("sheet2_id", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered">
		<tr>
			<th><p>ID</p></th>
			<th><p>Old_pin</p></th>
			<th><p>Cad_no</p></th>
			<th><p>Parcel_no</p></th>
			<th><p>Barangay</p></th>
			<th><p>Section</p></th>
			<th><p>Pin_new</p></th>
			<th><p>Section_new</p></th>
		</tr>
		';
		foreach($query->result() as $row)
		{
		$output .= '
		<tr>
			<td><p>'.$row->sheet2_id.'</p></td>
			<td><p>'.$row->old_pin.'</p></td>
			<td><p>'.$row->cad_no.'</p></td>
			<td><p>'.$row->parcel_no.'</p></td>
			<td><p>'.$row->barangay.'</p></td>
			<td><p>'.$row->section.'</p></td>
			<td><p>'.$row->pin_new.'</p></td>
			<td><p>'.$row->section_new.'</p></td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}

	function count_sheet1()
	{
		$query = $this->db->get("sheet1");
		return $query->num_rows();
	}

	function fetch_sheet1($limit, $start)
	{
		$output = '';
		$this->db->select("*");
		$this->db->from("sheet1");
		$this->db->order_by("sheet1_id", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered">
		<tr>
			<th><p>ID</p></th>
			<th><p>Td</p></th>
			<th><p>Old_pin</p></th>
			<th><p>Ext</p></th>
			<th><p>Owner</p></th>
			<th><p>Owner_address</p></th>
			<th><p>Location</p></th>
			<th><p>Title</p></th>
			<th><p>Barangay</p></th>
			<th><p>Lot_description</p></th>
			<th><p>Cad_lot</p></th>
			<th><p>Class</p></th>
			<th><p>Assessment_date</p></th>
			<th><p>Area1</p></th>
			<th><p>Kind1</p></th>
			<th><p>Area2</p></th>
			<th><p>Kind2</p></th>
			<th><p>Bldg_desc</p></th>
			<th><p>Floor_area</p></th>
			<th><p>Mach_desc</p></th>
			<th><p>Actual_use</p></th>
			<th><p>Spec</p></th>
			<th><p>Taxable</p></th>
			<th><p>Av</p></th>
			<th><p>Mv</p></th>
		</tr>
		';
		foreach($query->result() as $row)
		{
		$output .= '
		<tr>
			<td><p>'.$row->sheet1_id.'</p></td>
			<td><p>'.$row->td.'</p></td>
			<td><p>'.$row->old_pin.'</p></td>
			<td><p>'.$row->ext.'</p></td>
			<td><p>'.$row->owner.'</p></td>
			<td><p>'.$row->owner_address.'</p></td>
			<td><p>'.$row->location.'</p></td>
			<td><p>'.$row->title.'</p></td>
			<td><p>'.$row->barangay.'</p></td>
			<td><p>'.$row->lot_description.'</p></td>
			<td><p>'.$row->cad_lot.'</p></td>
			<td><p>'.$row->class.'</p></td>
			<td><p>'.$row->assessment_date.'</p></td>
			<td><p>'.$row->area1.'</p></td>
			<td><p>'.$row->kind1.'</p></td>
			<td><p>'.$row->area2.'</p></td>
			<td><p>'.$row->kind2.'</p></td>
			<td><p>'.$row->bldg_desc.'</p></td>
			<td><p>'.$row->floor_area.'</p></td>
			<td><p>'.$row->mach_desc.'</p></td>
			<td><p>'.$row->actual_use.'</p></td>
			<td><p>'.$row->spec.'</p></td>
			<td><p>'.$row->taxable.'</p></td>
			<td><p>'.$row->av.'</p></td>
			<td><p>'.$row->mv.'</p></td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}

	function count_report()
	{
		$this->db->select('SUBSTRING(sheet2.pin_new,17,3) AS pin_new, sheet1.old_pin AS old_pin, sheet1.owner AS owner, 
		sheet1.owner_address AS owner_address, sheet1.td AS td, sheet1.title AS title, 
		sheet1.cad_lot AS cad_lot, sheet1.area1 AS area1, sheet1.area2 AS area2, sheet1.kind1 AS kind1, 
		sheet1.kind2 AS kind2, sheet1.actual_use AS actual_use');
		$this->db->from('sheet1');
		$this->db->join('sheet2','sheet1.old_pin = sheet2.old_pin');
		$this->db->group_by('sheet1_id');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_report($limit, $start)
	{
		$output = '';
		$this->db->select('SUBSTRING(sheet2.pin_new,17,3) AS pin_new, sheet1.old_pin AS old_pin, sheet1.owner AS owner, 
		sheet1.owner_address AS owner_address, sheet1.td AS td, sheet1.title AS title, 
		sheet1.cad_lot AS cad_lot, sheet1.area1 AS area1, sheet1.area2 AS area2, sheet1.kind1 AS kind1, 
		sheet1.kind2 AS kind2, sheet1.actual_use AS actual_use');
		$this->db->from('sheet1');
		$this->db->join('sheet2','sheet1.old_pin = sheet2.old_pin');
		$this->db->group_by('sheet1_id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered">
		<tr>
			<th><p>Pin_New</p></th>
			<th><p>Old_pin</p></th>
			<th><p>Owner</p></th>
			<th><p>Owner_Address</p></th>
			<th><p>Td</p></th>
			<th><p>Title</p></th>
			<th><p>Cad_lot</p></th>
			<th><p>Area1</p></th>
			<th><p>Area2</p></th>
			<th><p>Kind1</p></th>
			<th><p>Kind2</p></th>
			<th><p>Actual_use</p></th>
		</tr>
		';
		foreach($query->result() as $row)
		{
		$output .= '
		<tr>
			<td><p>'.$row->pin_new.'</p></td>
			<td><p>'.$row->old_pin.'</p></td>
			<td><p>'.$row->owner.'</p></td>
			<td><p>'.$row->owner_address.'</p></td>
			<td><p>'.$row->td.'</p></td>
			<td><p>'.$row->title.'</p></td>
			<td><p>'.$row->cad_lot.'</p></td>
			<td><p>'.$row->area1.'</p></td>
			<td><p>'.$row->area2.'</p></td>
			<td><p>'.$row->kind1.'</p></td>
			<td><p>'.$row->kind2.'</p></td>
			<td><p>'.$row->actual_use.'</p></td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}
}
