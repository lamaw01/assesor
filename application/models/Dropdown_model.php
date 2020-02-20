<?php
class Dropdown_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	function getdata()
	{
        $query = $this->db->query('SELECT DISTINCT SUBSTRING(sheet1.old_pin,12,2) AS old_pin
        FROM sheet1
        INNER JOIN sheet2
        ON sheet1.old_pin = sheet2.old_pin
        GROUP BY sheet1_id;');
        
        return $query->result();
    }
}
