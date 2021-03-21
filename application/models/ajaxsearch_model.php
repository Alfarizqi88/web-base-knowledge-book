<?php
class Ajaxsearch_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("case_sisi");
  if($query != '')
  {
   $this->db->like('title_case', $query);
   $this->db->or_like('description', $query);


  }
  $this->db->order_by('id_case', 'DESC');
  return $this->db->get();
 }
}
?>