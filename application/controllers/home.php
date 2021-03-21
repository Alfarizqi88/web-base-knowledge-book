<?php

class Home extends CI_Controller
{
    function index()
    {
        redirect('dashboard');
        
     
    }

    function cari_case()
    {
           $cari = $this->input->post('search');        

           $data_menu['title'] = $this->model_data->search_data_case($cari);  

           $this->load->view('v_navbar');
           $this->load->view('v_menu',$data_menu);

           
    }

    function pilih_case()
    {
//    	 $this->load->view('v_navbar');
        $id_case = $this->input->get('id_case');
        //untuk search
        $cari = $this->input->post('search');

         $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_case' =>  $id_case
        );


        $data['case'] = $this->model_data->pilih_case_join($where);

        $data['case'] = array(
                'data' => $data['case'] = $this->model_data->pilih_case_join($where)
            );
        // $data['case'] = $this->model_data->pilih_case($where);

        // print_r($id_case);
         //print_r($data['case']);
        $divisi = $this->session->userdata('divisi');//mengambil nilai session

        if($cari=="")
        {
             
            $data_menu['title'] = $this->model_data->data_case();    
            $data_menu['categories'] = $this->model_data->data_categories_divisi($divisi);   
        }
        else
        {
           $data_menu['title'] = $this->model_data->search_data_case($cari);     
            if($data_menu['title']!=null)
            {
                $cari = $data_menu['title'][0]['id_categories_case'];

                $data_menu['categories'] = $this->model_data->search_data_categories($cari,$divisi);     
            }
                  
        }
       


        //PENGAMBILAN ARRAY JIKA MENGGUNAKAN INNERJOIN
        $data_comment['comment'] = array(
                'data_comment' => $data['comment'] = $this->model_data->tampil_comment($where)
            ); 
        // print_r($data['commend']);
		$this->load->view('v_navbar');
        $this->load->view('v_menu',$data_menu);

        $this->load->view('v_isi',$data,$data_comment);
    }

//function untuk ketika commend stay on current page
    function pilih_case_comment()
    {
//       $this->load->view('v_navbar');
        $id_case = $this->session->flashdata('id_case');
         $cari = $this->input->post('search');
        //$id_case = $this->input->get('id_case');

         $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_case' =>  $id_case
        );


        $data['case'] = $this->model_data->pilih_case_join($where);

        $data['case'] = array(
                'data' => $data['case'] = $this->model_data->pilih_case_join($where)
            );
        // $data['case'] = $this->model_data->pilih_case($where);

        // print_r($id_case);
         //print_r($data['case']);
        $divisi = $this->session->userdata('divisi');
         if($cari=="")
        {
             
            $data_menu['title'] = $this->model_data->data_case();    
            $data_menu['categories'] = $this->model_data->data_categories_divisi($divisi);   
        }
        else
        {
           $data_menu['title'] = $this->model_data->search_data_case($cari);     
            if($data_menu['title']!=null)
            {
                $cari = $data_menu['title'][0]['id_categories_case'];

                $data_menu['categories'] = $this->model_data->search_data_categories($cari,$divisi);     
            }
                  
        }
        


        $data_comment['comment'] = array(
                'data_comment' => $data['comment'] = $this->model_data->tampil_comment($where)
            ); 
        // print_r($data['commend']);
        $this->load->view('v_navbar');
        $this->load->view('v_menu',$data_menu);

        $this->load->view('v_isi',$data,$data_comment);
    }

    function ambil_list()
    {
         if($this->session->userdata('status') == 'login')
            {
                 $nama = $this->session->userdata('username');
                 $cari = $this->input->post('search');
                
            
                 
                $id_login = $this->model_data->cari_id_login($nama);

                $where = array(
                    // 'id_case' =>  $this->input->get('id_case')
                    'id_login' =>  $id_login[0]['id_login']
                );

                

                 if($cari == "")
                 {
                    echo "1";
                    $cari="";
                    $data['ambil_list'] = $this->model_data->tampil_list_upload($where);    

                 }
                 else
                 {
                    echo "2";
                    $data['ambil_list'] = $this->model_data->search_list_upload($where,$cari);   
                    
                 }
              
                $this->load->view('v_navbar');
                $this->load->view('v_menu_list');
                $this->load->view('v_list_upload' ,$data);
            }
        else
            {
                redirect('login');
            }
        
    }


    function delete_upload()
    {
        $id_case = $this->input->get('id_case');
        $divisi = $this->session->userdata('divisi');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_case' =>  $id_case
        );

        $ambil_case = $this->model_data->pilih_case($where);


        $id_categories = $ambil_case[0]['id_categories_case'];
        
        $path_hapus = $ambil_case[0]['file'];
        // print_r($path_hapus);
        // setting konfigurasi delete file

        $path = "./uploads/$divisi/$path_hapus";        
   
        unlink($path); 

         //proses insert edit log
        $name_categories = $this->model_data->cek_nama_categories($id_categories);
                
        $data_log = array(
                    'username' => $this->session->userdata('username'),
                    'aksi' => 'hapus file ',   
                    'item' => $ambil_case[0]['file'],
                    'title_case' => $ambil_case[0]['title_case'],                   
                    'name_categories' => $name_categories[0]['name_categories'],
                    'divisi' => $this->session->userdata('divisi'),
                );

       $this->model_data->insert($data_log,'log_activity');


        $this->model_data->delete_upload($where,'comment');
        $this->model_data->delete_upload($where,'case_sisi');
        redirect('home/ambil_list');

    }

//tampil form edit_upload
    function edit_upload()
    {

        if($this->session->userdata('status') == 'login')
        {
            $id_case = $this->input->get('id_case');
            $divisi = $this->session->userdata('divisi');

            $data['case'] = $this->model_data->cari_id_case($id_case);
            $data['categories'] = $this->model_data->data_categories_divisi($divisi);

            // print_r( $data['case']);

           $this->load->view('v_navbar');
            $this->load->view('v_menu_list');
            $this->load->view('v_upload_edit' ,$data);   
        }
        else
        {
            redirect('login');
        }
    }


//proses edit upload
    function do_edit_upload()
    {
        $id_case = $this->input->get('id_case');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $id_categories = $this->input->post('list_id_categories');

        $data = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_case' =>  $id_case,
            'title_case' =>  $title,
            'description' =>  $description,
            'id_categories_case' => $id_categories
        );


        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_case' =>  $id_case,            
        );

            //proses insert edit log
        $name_categories = $this->model_data->cek_nama_categories($id_categories);

        $ambil_case = $this->model_data->pilih_case($where);
        

        $title_lama = $ambil_case[0]['title_case'];
        $description_lama = $ambil_case[0]['description'];
        $id_categories_lama = $ambil_case[0]['id_categories_case'];

        $aksi="edit";
        if($title_lama != $title)
        {
                $aksi .= " title";
        }
        if($description_lama != $description)
        {
                 $aksi .=  " description";                    
        }
        if($id_categories_lama != $id_categories )
        {
                $aksi .= " categories";                    
        }
                
        // print_r($aksi); die();

        $data_log = array(
                    'username' => $this->session->userdata('username'),
                    'aksi' => $aksi,   
                    'item' => $ambil_case[0]['file'],
                    'title_case' => $title,                   
                    'name_categories' => $name_categories[0]['name_categories'],
                    'divisi' => $this->session->userdata('divisi')
                );

       

            // print_r($data);die();
       if($title_lama == $title && $description_lama == $description && $id_categories_lama == $id_categories)
       {

       }
       else
       {
            $this->model_data->insert($data_log,'log_activity');
            $this->model_data->edit_data($where,$data,'case_sisi'); 
       }
       
      
        redirect('home/ambil_list');
    }

//function tambah category
    function tambah_categories()
    {
        $name_categories = $this->input->post('name_categories');
     
            $data = array(
            'name_categories' => $name_categories,
            'id_divisi' => $this->session->userdata('id_divisi')
            );    

            
        $this->model_data->insert($data,'categories_case_sisi');
        
        redirect('upload');
    }
    



}

?>