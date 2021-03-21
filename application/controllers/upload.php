<?php

class Upload extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {

        if($this->session->userdata('status') == 'login')
        {
            $this->load->view('v_navbar');
            $divisi = $this->session->userdata('divisi');

            // $data['categories'] = $this->model_data->data_categories();     
            $data['categories'] = $this->model_data->data_categories_divisi($divisi);     
            $this->load->view('v_upload' , $data);
             // $nama = $this->session->userdata('username');
             
             //    $id_login = $this->model_data->cari_id_login($nama);
             //    var_dump($id_login);
        }
        else
        {
            redirect('login');
        }
         
            
    }

    function do_upload() {


        $id_categories = $this->input->post('list_id_categories');
        $divisi = $this->session->userdata('divisi');
        // print_r($divisi);die();

        if($id_categories!=0)
        {
            // setting konfigurasi upload
           
            $config['upload_path'] = "./uploads/$divisi";  
            // print_r($config['upload_path']);die();
                    
            
            // $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'doc|docx|pdf|txt|mp4';
            $config['max_size']=0;
            //setting max size php.ini (apache xampp) cari yang mb
            

            //proses upload
            $this->upload->initialize($config);

            // print_r($this->upload->initialize($config));die();
            
            if (!$this->upload->do_upload('file')) {
                $error = array('error' =>  $this->upload->display_errors());
                // menampilkan pesan error
                $this->session->set_flashdata('error', 'file tidak sesuai ketentuan');
                redirect('upload');
                // $this->load->view('v_upload',$error);
                //  print_r($error);
            } else {
                $result = $this->upload->data();
                $title = $this->input->post('title');
                $description = $this->input->post('description');            
                $nama = $this->session->userdata('username');
             
                $id_login = $this->model_data->cari_id_login($nama);
                var_dump($id_categories);


                    $data = array(
                    'title_case' => $title,
                    'description' =>$description,
                    'id_login' => $id_login[0]['id_login'],
                    'file' => $result['file_name'],
                    'id_categories_case' => $id_categories,

                     );    
              

                    //proses insert log tambah data
                $name_categories = $this->model_data->cek_nama_categories($id_categories);
                
                $data_log = array(
                    'username' => $this->session->userdata('username'),
                    'aksi' => 'menambahkan file',
                    'item' => $result['file_name'],
                    'title_case' => $title,     
                    'name_categories' => $name_categories[0]['name_categories'],

                );
                  
                    

                $this->model_data->insert($data,'case_sisi');
                $this->model_data->insert($data_log,'log_activity');
                redirect('dashboard');

                
                // $data_log_tambah = array(
                //     'username' => $this->session->userdata('username'),                    
                //     'item' => $result['file_name'],
                //     'title_case' => $title,     
                //     'name_categories' => $name_categories[0]['name_categories'],
                //     'divisi' => $divisi
                // );
                  
                    

                // $this->model_data->insert($data,'case_sisi');
                // $this->model_data->insert($data_log_tambah,'log_tambah_activity');
                // redirect('dashboard');
                
            }
        }

        else
        {
            $this->session->set_flashdata('error', 'anda belum memasukkan categories');
            redirect('upload');
        }
        
    }




}

?>