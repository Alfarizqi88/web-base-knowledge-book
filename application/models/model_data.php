<?php

class Model_data extends CI_Model
{
	function insert($data,$table)
		{
			return $this->db->insert($table,$data);
		}

	function data_case(){

			$this->db->from('case_sisi');
			$this->db->order_by("title_case", "asc");
			$query = $this->db->get(); 

			return $query->result_array();
		}

	function data_categories(){

			$this->db->from('categories_case_sisi');
			$this->db->order_by("name_categories", "asc");
			$query = $this->db->get(); 

			return $query->result_array();
		}

	function data_categories_divisi($divisi){

			$this->db->from('categories_case_sisi');
			$this->db->order_by("name_categories", "asc");
			$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');
			$this->db->where('divisi_sisi.name_divisi', $divisi);
			$query = $this->db->get(); 

			return $query->result_array();
		}

	function search_data_categories($cari , $divisi)
	{
		$this->db->select('*');
		$this->db->from('categories_case_sisi');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');
		$this->db->where('id_categories_case', $cari);
		$this->db->where('divisi_sisi.name_divisi', $divisi);

		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function search_data_case($cari)
	{
		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->like('title_case', $cari);
		$this->db->order_by("title_case", "asc");

		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function pilih_case($where){
			$query = $this->db->get_where('case_sisi',$where);
			return $query->result_array();
		}
//coba terkahir
	function pilih_case_search($where){
			$this->db->limit(1);
			$query = $this->db->get_where('case_sisi',$where);
			return $query->result_array();
		}

	function pilih_case_join($where){
		
		

		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('login','login.id_login=case_sisi.id_login');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
		}

	function cari_id_login($where){

		$this->db->select('id_login');
		$this->db->from('login');
		$this->db->where('username',$where);
		$query=$this->db->get();
		return $query->result_array();
		}

	function cek_username($where){

		$this->db->select('id_login');
		$this->db->from('login');
		$this->db->where('username',$where);
		$query=$this->db->get()->row();
		return $query;
		}

	function cek_nama_categories($where){

		$this->db->select('name_categories');
		$this->db->from('categories_case_sisi');		
		$this->db->where('id_categories_case',$where);
		$query=$this->db->get();
		return $query->result_array();
		
		}

	function cari_id_case($where){

		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');
		$this->db->where('id_case',$where);
		$query=$this->db->get();
		return $query->result_array();

		}	


	function tampil_comment($where)
	{
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('login','login.id_login=comment.id_login');
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function cek($where,$table)
		{
			$query = $this->db->get_where($table,$where);
			return $query->row_array();
		}
	function ambil_user($where,$table)
		{
			$query = $this->db->get_where($table,$where);
			return $query->result_array();
		}
		//join user dan divisi menggunakan kondisi
	function ambil_user_join_divisi($where)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}


	function tampil_list_upload($where)
	{
		$this->db->select('*');
		$this->db->from('case_sisi');	
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');	
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function tampil_data($table)
	{
		$this->db->select('*');
		$this->db->from($table);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_categories_divisi_join()
	{
		$this->db->select('*');
		$this->db->from('categories_case_sisi');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');		
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_employee_divisi_join()
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');		
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_employee_divisi_join_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');		
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_categories_divisi_join_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('categories_case_sisi');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');		
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_categories_join_case_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('categories_case_sisi');
		$this->db->join('case_sisi','case_sisi.id_categories_case=categories_case_sisi.id_categories_case');		
		$this->db->where($where);
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function tampil_data_kondisi($table , $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function search_list_upload($where ,$cari)
	{
		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');
		$this->db->like('title_case', $cari);
//		$this->db->or_like('description', $cari);
  //   	$this->db->or_like('description', $cari);    	
		$this->db->where($where);

		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function delete_upload($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function delete_case_categories($where)
	{
		$this->db->where('id_categories_case' , $where);
		$this->db->delete('case_sisi');
	}

	function delete_categories($where)
	{
		$this->db->where('id_categories_case' , $where);
		$this->db->delete('categories_case_sisi');
	}

	function delete_comment_ikut_case($where)
	{
		$this->db->where('id_case' , $where);
		$this->db->delete('comment');
	}


	function edit_data($where,$data,$table)
	{		
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function ambil_data_join_case()
	{
		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('login','login.id_login = case_sisi.id_login');		
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');	
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function data_case_join_categories_join_divisi_join_login_kondisi($where)
			
	{
		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('login','login.id_login = case_sisi.id_login');		
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');	
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=categories_case_sisi.id_divisi');		
		$this->db->where('divisi_sisi.name_divisi' , $where);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_join_comment()
	{
		$this->db->select('*');
		$this->db->from('case_sisi');
		$this->db->join('login','login.id_login = case_sisi.id_login');		
		$this->db->join('comment','case_sisi.id_case = comment.id_case');	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_all()
	{
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('login','login.id_login = comment.id_login');		
		$this->db->join('case_sisi','case_sisi.id_case = comment.id_case');
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');			
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_all_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('login','login.id_login = comment.id_login');		
		$this->db->join('case_sisi','case_sisi.id_case = comment.id_case');
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');			
		$this->db->where($where);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_join_comment_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('login','login.id_login = comment.id_login');		
		$this->db->join('case_sisi','case_sisi.id_case = comment.id_case');
		$this->db->join('categories_case_sisi','categories_case_sisi.id_categories_case = case_sisi.id_categories_case');
		$this->db->join('divisi_sisi','divisi_sisi.id_divisi=login.id_divisi');	
		$this->db->where('divisi_sisi.name_divisi' , $where);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_log_kondisi($where)
	{
		$this->db->select('*');
		$this->db->from('log_activity');		
		$this->db->where('log_activity.divisi' , $where);	
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

	function ambil_data_log_admin_activity()
	{
		$this->db->select('*');
		$this->db->from('log_admin_activity');				
		$query=$this->db->get();
		$data= $query->result_array();
		return $data;
	}

		

}
?>