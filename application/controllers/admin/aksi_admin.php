<?php

class Aksi_Admin extends CI_Controller
{
    function index()
    {
    	redirect('admin/admin');
    }

    function tampil_employee()
    {
    	$name_divisi = $this->input->get('name_divisi');
        if(empty($name_divisi))
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');                        
        }

    	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
	    $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
	    $this->load->view('admin/v_admin_top_navbar');   
	    

	    $where = array(
        // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );

	    $ambil_data['data'] = $this->model_data->data_employee_divisi_join_kondisi($where);
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where);    
	    	

	    $this->load->view('admin/v_admin_data_employee' ,$ambil_data ); 	
    }

    function tampil_category()
    {
    	$name_divisi = $this->input->get('name_divisi');
        if($name_divisi == '')
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');                            
        }

    	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
	    $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
	    $this->load->view('admin/v_admin_top_navbar');   

	    $where = array(
            // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );

	    $ambil_data['data'] = $this->model_data->data_categories_divisi_join_kondisi($where);
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where);  
	    	

	    $this->load->view('admin/v_admin_data_category' ,$ambil_data); 	
    }

    function tampil_case()
    {
    	$name_divisi = $this->input->get('name_divisi');
        if($name_divisi == '')
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');            
        }

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );

    	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where); 
        
	    $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
	    $this->load->view('admin/v_admin_top_navbar');   

	   

	    $ambil_data['data'] = $this->model_data->data_case_join_categories_join_divisi_join_login_kondisi($name_divisi);        
	    	

	    $this->load->view('admin/v_admin_data_case' ,$ambil_data); 	
    }

    function tampil_comment()
    {
    	$name_divisi = $this->input->get('name_divisi');
        if($name_divisi == '')
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');            
        }

          $where = array(
            // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );

    	$ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        
	    $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
	    $this->load->view('admin/v_admin_top_navbar');   

	    

	    $ambil_data['data'] = $this->model_data->ambil_data_join_comment_kondisi($name_divisi);
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where); 
	    	

	    $this->load->view('admin/v_admin_data_comment' ,$ambil_data); 	
    }

    function tampil_log()
    {
        $name_divisi = $this->input->get('name_divisi');
        if($name_divisi == '')
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');            
        }

         $where = array(
            // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );
        
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where); 
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
        $this->load->view('admin/v_admin_top_navbar');   

        

        $ambil_data['data'] = $this->model_data->ambil_data_log_kondisi($name_divisi);
            

        $this->load->view('admin/v_admin_data_log' ,$ambil_data);   
    }

    function tampil_log_admin_activity()
    {
        $name_divisi = $this->input->get('name_divisi');
        if($name_divisi == '')
        {            
            //agar stay on current page
                $name_divisi = $this->session->flashdata('name_divisi');            
        }

         $where = array(
            // 'id_case' =>  $this->input->get('id_case')
        'name_divisi' =>  $name_divisi
        );
        
        $ambil_data_divisi['data_divisi'] = $this->model_data->tampil_data('divisi_sisi');
        $ambil_data['divisi'] = $this->model_data->tampil_data_kondisi('divisi_sisi' , $where); 
        
        $this->load->view('admin/v_admin_side_navbar' ,$ambil_data_divisi);             
        $this->load->view('admin/v_admin_top_navbar');   

        

        $ambil_data['data'] = $this->model_data->ambil_data_log_admin_activity();
            

        $this->load->view('admin/v_admin_data_log_admin_activity' ,$ambil_data);   
    }


    //tambah divisi baru
    function tambah_divisi()
    {
    	$name_divisi = $this->input->post('txt_divisi');

    	 $data_insert = array(
                    'name_divisi' => $name_divisi
                );

    	$this->model_data->insert($data_insert,'divisi_sisi');

        $data_insert_log_admin_activity = array(
                    'aksi' => 'tambah divisi',                    
                    'divisi' => $name_divisi,
                    'item' => $name_divisi
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');

    	redirect('admin/admin/list_data_divisi');
    }

    //tampil data employee
    function do_tambah_employee()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $divisi = $this->input->post('list_id_divisi');
        $name_divisi = $this->input->get('name_divisi');


        // print_r($id_divisi);die();
        $data_insert = array(
                    'username' => $username,
                    'password' => $password,
                    'id_divisi' => $divisi
                );
        $this->model_data->insert($data_insert,'login');

        $data_insert_log_admin_activity = array(
                    'aksi' => 'tambah employee',                    
                    'divisi' => $name_divisi,
                    'item' => $username
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_employee');

    }
    //tamabh categories agar stay on page sesuai divisi
     function do_tambah_categories()
    {
        $name_categories = $this->input->post('name_categories');        
        $divisi = $this->input->post('list_id_divisi');
        $name_divisi = $this->input->get('name_divisi');


        // print_r($id_divisi);die();
        $data_insert = array(
                    'name_categories' => $name_categories,                    
                    'id_divisi' => $divisi
                );
        $this->model_data->insert($data_insert,'categories_case_sisi');

         $data_insert_log_admin_activity = array(
                    'aksi' => 'tambah categories',                    
                    'divisi' => $name_divisi,
                    'item' => $name_categories
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_category');

    }

    function do_tambah_categories_all()
    {
        $name_categories = $this->input->post('name_categories');        
        $divisi = $this->input->post('list_id_divisi');
        // $name_divisi = $this->input->get('name_divisi');


        // print_r($id_divisi);die();
        $data_insert = array(
                    'name_categories' => $name_categories,                    
                    'id_divisi' => $divisi
                );
        $this->model_data->insert($data_insert,'categories_case_sisi');

        $data_insert_log_admin_activity = array(
                    'aksi' => 'tambah categories',                    
                    'divisi' => $divisi,
                    'item' => $name_categories
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');
        // $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/admin/list_data_category');

    }

//function hapus data
    function hapus_data_divisi()
    {
        $id_divisi  = $this->input->get('id_divisi');        

        $where = array(            
            'divisi_sisi.id_divisi' =>  $id_divisi
        );

         $where_divisi = array(            
            'id_divisi' =>  $id_divisi
        );

         $this->model_data->delete_upload($where_divisi,'comment');

        $ambil_data['data'] = $this->model_data->data_categories_divisi_join_kondisi($where);        
        // print_r($ambil_data['data']);die();
        foreach($ambil_data['data'] as $a)
        {
                
                
                $this->model_data->delete_case_categories($a['id_categories_case']);                
                $this->model_data->delete_categories($a['id_categories_case']);
        }        

        // print_r($ambil_data['data_login']);die();
        
        $this->model_data->delete_upload($where_divisi,'login');
        $this->model_data->delete_upload($where,'divisi_sisi');

        redirect('admin/admin/list_data_divisi');
    }

    function hapus_data_case()
    {
        $id_case = $this->input->get('id_case');
        $name_divisi = $this->input->get('name_divisi');  

        $where = array(            
            'id_case' =>  $id_case
        );

        $this->model_data->delete_upload($where,'comment');
        $this->model_data->delete_upload($where,'case_sisi');

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_case');
    }

    function hapus_data_comment()
    {
        $id_comment = $this->input->get('id_comment');
        $name_divisi = $this->input->get('name_divisi');  

        $where = array(            
            'id_comment' =>  $id_comment
        );

        $this->model_data->delete_upload($where,'comment');        

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_comment');
    }

    function hapus_data_categories()
    {
        $id_categories_case = $this->input->get('id_categories_case');
        $name_divisi = $this->input->get('name_divisi');   

        $where = array(            
            'categories_case_sisi.id_categories_case' =>  $id_categories_case
        );

         $where_case = array(            
            'id_categories_case' =>  $id_categories_case
        );

        $ambil_data['data'] = $this->model_data->data_categories_join_case_kondisi($where);
        // print_r($ambil_data['data']);die();

        if($ambil_data['data'] == null)
        {
            $this->model_data->delete_upload($where,'categories_case_sisi');
            // echo "string";die();
        }
        else
        {
             foreach($ambil_data['data'] as $a)
        {
     
                $this->model_data->delete_comment_ikut_case($a['id_case']);                                
        }     
            
            $this->model_data->delete_upload($where_case,'case_sisi');
            $this->model_data->delete_upload($where,'categories_case_sisi');
        }


        

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_category  ');
    }

     function hapus_data_employee()
    {
        $id_login = $this->input->get('id_login');
        $name_divisi = $this->input->get('name_divisi');        

        $where = array(            
            'id_login' =>  $id_login
        );

        $this->model_data->delete_upload($where,'comment');
        $this->model_data->delete_upload($where,'case_sisi');
        $this->model_data->delete_upload($where,'login');

        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_employee');
    }

    function hapus_data_log()
    {
        $id_log = $this->input->get('id_log');
        $name_divisi = $this->input->get('name_divisi');

        $where = array(            
            'id_log' =>  $id_log
        );        
        $this->model_data->delete_upload($where,'log_activity');
        
        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_log');
    }

    function hapus_data_log_admin_activity()
    {
        $id_log_admin = $this->input->get('id_log_admin');
        $name_divisi = $this->input->get('name_divisi');

        $where = array(            
            'id_log_admin' =>  $id_log_admin
        );        
        $this->model_data->delete_upload($where,'log_admin_activity');
        
        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_log_admin_activity');
    }

     function hapus_data_log_all()
    {
        $id_log = $this->input->get('id_log');
        

        $where = array(            
            'id_log' =>  $id_log
        );        
        $this->model_data->delete_upload($where,'log_activity');
        
        $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_log');
    }

//function  edit data
    function do_edit_data_employee()
    {
         $id_login = $this->input->get('id_login');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id_divisi = $this->input->post('list_id_divisi');

        
        $name_divisi = $this->input->get('name_divisi');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_login' =>  $id_login,            
        );

        $data = array(
                    'username' => $username,
                    'password' => $password,   
                    'id_divisi' => $id_divisi                    
                );
           
            $this->model_data->edit_data($where,$data,'login'); 

        $data_insert_log_admin_activity = array(
                    'aksi' => 'edit employee',                    
                    'divisi' => $name_divisi,
                    'item' => $username
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');
       
            $this->session->set_flashdata('name_divisi',$name_divisi);
            redirect('admin/Aksi_Admin/tampil_employee');
    }

    function do_edit_data_divisi()
    {
         $id_divisi = $this->input->get('id_divisi');
        $name_divisi = $this->input->post('name_divisi');        

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_divisi' =>  $id_divisi,            
        );

        $data = array(
                    'name_divisi' => $name_divisi               
                );
           
            $this->model_data->edit_data($where,$data,'divisi_sisi'); 


        $data_insert_log_admin_activity = array(
                    'aksi' => 'edit divisi',                    
                    'divisi' => $name_divisi,
                    'item' => $name_divisi
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');
       
       
            redirect('admin/admin/list_data_divisi');
    }

     function do_edit_data_categories()
    {
        $id_categories_case = $this->input->get('id_categories_case');
        $name_categories = $this->input->post('name_categories');        
        $id_divisi = $this->input->post('list_id_divisi');

        $name_divisi = $this->input->get('name_divisi');
        
        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_categories_case' =>  $id_categories_case,            
        );

        $data = array(
                    'id_categories_case' => $id_categories_case,
                    'name_categories' => $name_categories,   
                    'id_divisi' => $id_divisi                    
                );
           
            $this->model_data->edit_data($where,$data,'categories_case_sisi '); 

         $data_insert_log_admin_activity = array(
                    'aksi' => 'edit categories',                    
                    'divisi' => $name_divisi,
                    'item' => $name_categories
                );

         $this->model_data->insert($data_insert_log_admin_activity,'log_admin_activity');
       
       
       $this->session->set_flashdata('name_divisi',$name_divisi);
        redirect('admin/Aksi_Admin/tampil_category  ');
    }

//function bacukp file delete
    // function move_upload_file()
    // {
    //     $uploads_dir = '/uploads';
    //     foreach ($_FILES["pictures"]["error"] as $key => $error)
    //      {
    //         if ($error == UPLOAD_ERR_OK)
    //          {
    //             $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
    //             $name = $_FILES["pictures"]["name"][$key];
    //             move_uploaded_file($tmp_name, "$uploads_dir/$name");
    //          }
    //      }
    // }

}

?>