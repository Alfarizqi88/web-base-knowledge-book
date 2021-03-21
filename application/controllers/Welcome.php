<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$data['title'] = $this->model_data->data_case();
		
		$this->load->view('v_navbar');
        $this->load->view('v_dashboard',$data);


		
	}
}
