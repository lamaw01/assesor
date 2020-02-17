<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

 function index()
 {
  $this->load->view('search');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->ajaxsearch_model->fetch_data($query);
  $output .= '
  <table class="table table-bordered table-hover">
  <tr>
    <th><p>Old_pin</p></th>
    <th><p>Ext</p></th>
    <th><p>Pin_New</p></th>	
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
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
        <td><p>'.$row->old_pin.'</p></td>
        <td><p>'.$row->ext.'</p></td>
        <td><p>'.$row->pin_new.'</p></td>
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
  }
  else
  {
   $output .= '<tr>
       <td colspan="13">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
 
}