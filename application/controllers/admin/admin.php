<?php

class Admin extends CI_Controller
{
    function index()
    {
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');

    	$this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);        
        $this->load->view('admin/v_admin_top_navbar');         
        $this->load->view('admin/v_admin_dashboard');
    }

//untuk tampil table seluruh divisi
    function list_data_comment()
    {
    	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');        
        
        // print_r($ambil_data_divisi['data_divisi']);die();
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);                 
        $this->load->view('admin/v_admin_top_navbar');    
    	$this->load->view('admin/v_admin_dashboard');

        $ambil_data['data'] = $this->model_data->ambil_data_all();

    	$this->load->view('admin/v_admin_alldata_comment' ,$ambil_data);
    }

    function list_data_case()
    {
   		$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);            
        $this->load->view('admin/v_admin_top_navbar');   
    	$this->load->view('admin/v_admin_dashboard');

    	
    	$ambil_data['data'] = $this->model_data->ambil_data_join_case();        
    	// print_r($ambil_data['data']);die();

    	$this->load->view('admin/v_admin_alldata_case',$ambil_data);
    }

    function list_data_employee()
    {
   		$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
        $this->load->view('admin/v_admin_top_navbar');   
    	$this->load->view('admin/v_admin_dashboard');

    	$ambil_data['data'] = $this->model_data->data_employee_divisi_join();
        //menampilkan divisi di combo box modal
        $ambil_data['divisi'] = $this->model_data->tampil_data('divisi_sisi');            	

    	$this->load->view('admin/v_admin_alldata_employee' ,$ambil_data);
    }


    function list_data_category()
    {
   		$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);            
        $this->load->view('admin/v_admin_top_navbar');  
    	$this->load->view('admin/v_admin_dashboard');

    	$ambil_data['data'] = $this->model_data->data_categories_divisi_join();    	
        // print_r($ambil_data['data']);die();
        $ambil_data['divisi'] = $this->model_data->tampil_data('divisi_sisi');
    	$this->load->view('admin/v_admin_alldata_category' ,$ambil_data);
    }


     function list_data_divisi()
    {
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
        $this->load->view('admin/v_admin_top_navbar');   
        $this->load->view('admin/v_admin_dashboard');

        $ambil_data['data'] = $this->model_data->tampil_data('divisi_sisi');
        

        $this->load->view('admin/v_admin_data_divisi' ,$ambil_data);
    }


    function list_data_log()
    {
  	 	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);              
        $this->load->view('admin/v_admin_top_navbar');  
    	$this->load->view('admin/v_admin_dashboard');

    	$ambil_data['data'] = $this->model_data->tampil_data('log_activity');     	

    	$this->load->view('admin/v_admin_alldata_log' ,$ambil_data);
    }

//tampil edit

    function tampil_edit_employee()
    {                
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $id_login = $this->input->get('id_login');

        $where = array(
        // 'id_case' =>  $this->input->get('id_case')
        'id_login' =>  $id_login
        );

        $ambil_data['data'] = $this->model_data->data_employee_divisi_join_kondisi( $where);   
        $ambil_data['divisi'] = $this->model_data->tampil_data('divisi_sisi');   


        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);              
        $this->load->view('admin/v_admin_top_navbar' );  
        $this->load->view('admin/v_admin_editemployee' ,$ambil_data);        

        
    }

     

     function tampil_edit_category()
    {
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $id_categories_case = $this->input->get('id_categories_case');
        
        $where = array(
        // 'id_case' =>  $this->input->get('id_case')
        'id_categories_case' =>  $id_categories_case
        );

        $ambil_data['data'] = $this->model_data->data_categories_divisi_join_kondisi( $where);           
        $ambil_data['divisi'] = $this->model_data->tampil_data('divisi_sisi');  
        
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);              
        $this->load->view('admin/v_admin_top_navbar' );  
        $this->load->view('admin/v_admin_editcategory' ,$ambil_data);

            

       }

     function tampil_edit_comment()
    {
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);              
        $this->load->view('admin/v_admin_top_navbar');  
        $this->load->view('admin/v_admin_editcomment');

        $ambil_data['data'] = $this->model_data->tampil_data('log_activity');       


    }

     function tampil_edit_divisi()
    {
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $id_divisi = $this->input->get('id_divisi');

        $where = array(
        // 'id_case' =>  $this->input->get('id_case')
        'id_divisi' =>  $id_divisi
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('divisi_sisi',$where);   
        
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);              
        $this->load->view('admin/v_admin_top_navbar');  
        $this->load->view('admin/v_admin_editdivisi' , $ambil_data);

         


    }

}

?>