<?php
class Ajaxsearch_model extends CI_Model
{
 function fetch_data($query)
 {
  #$this->db->select("*");
  #$this->db->from("sheet2");

  $this->db->select('SUBSTRING(sheet1.old_pin,12,7) AS old_pin, sheet1.ext AS ext,
    SUBSTRING(sheet2.pin_new,13,6) AS pin_new, sheet1.owner AS owner, 
	sheet1.owner_address AS owner_address, sheet1.td AS td, sheet1.title AS title, 
	sheet1.cad_lot AS cad_lot, sheet1.area1 AS area1, sheet1.area2 AS area2, sheet1.kind1 AS kind1, 
	sheet1.kind2 AS kind2, sheet1.actual_use AS actual_use');
  $this->db->from('sheet1');
  $this->db->join('sheet2','sheet1.old_pin = sheet2.old_pin');		
  #$this->db->order_by("old_pin", "ASC");
  $this->db->group_by('sheet1_id');
  $this->db->limit(200);

  if($query != '')
  {
   $this->db->like('sheet1.old_pin', $query);
   $this->db->or_like('sheet1.ext', $query);
   $this->db->or_like('sheet2.pin_new', $query);
   $this->db->or_like('sheet1.owner', $query);
   $this->db->or_like('sheet1.owner_address', $query);
   $this->db->or_like('sheet1.td', $query);
   $this->db->or_like('sheet1.title', $query);
   $this->db->or_like('sheet1.cad_lot', $query);
   $this->db->or_like('sheet1.area1', $query);
   $this->db->or_like('sheet1.area2', $query);
   $this->db->or_like('sheet1.kind1', $query);
   $this->db->or_like('sheet1.kind2', $query);
   $this->db->or_like('sheet1.actual_use', $query);
  }
  $this->db->order_by('old_pin', 'ASC');
  return $this->db->get();
 }
}
?>