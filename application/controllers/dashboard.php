<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('status')!="login")
		{
			$this->load->view('v_login');
		}
		else if($this->session->userdata('divisi')=="admin")
		{
			redirect('admin/admin');
		}
		else
		{
			$this->load->view('v_navbar');
			$cari = $this->input->post('search');
			$divisi = $this->session->userdata('divisi');

			if($cari=="")
			{
				$data['title'] = $this->model_data->data_case();	
				// $data['categories'] = $this->model_data->data_categories();	
				
				$data['categories'] = $this->model_data->data_categories_divisi($divisi);     			
				
			}
			else
			{
				$data['title'] = $this->model_data->search_data_case($cari);		
				if($data['title']!=null)
				{
					$cari = $data['title'][0]['id_categories_case'];

					$data['categories'] = $this->model_data->search_data_categories($cari,$divisi);		
				}
				
				// print_r($data['categories']);
			}
			
				
	        $this->load->view('v_dashboard',$data );
	        // $this->load->view('v_menu',$data);
		}
		

	}
}
