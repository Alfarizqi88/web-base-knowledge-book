<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
        $this->load->view('v_login');	
	}

	public function cek_login()
	{

		$username = $this->input->post('username');        
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            // 'password' => md5($password)
            'password' => $password
        );

        $cek = $this->model_data->cek($where,'login');
        $ambil_user['user'] = $this->model_data->ambil_user_join_divisi($where);
        //print_r($ambil_user['user'] );die();


        if($cek != null)
        {
            $data_session = array(
                'username' => $ambil_user['user'][0]['username'],  
                'divisi' => $ambil_user['user'][0]['name_divisi'],  
                'id_divisi' => $ambil_user['user'][0]['id_divisi'],  
                'status' => "login" 
            );
            
            
            $this->session->set_userdata($data_session);

            if($ambil_user['user'][0]['name_divisi'] == 'admin')
            {
                redirect('admin/admin');    
            }
            else
            {
                redirect('dashboard');    
            }
            
        }
        else
        {
            // $error = "username atau password salah";
            // $this->load->view('v_login',$error); 
            //  print_r($error); 

             $this->session->set_flashdata('error', 'username atau password salah');
            redirect('login');
        }

	}

	public function register_login()
	{
		$this->load->view('v_register');		
	}


	public function daftar() 
    {
    		
        $username = $this->input->post('username');                
        $password = $this->input->post('password');
        $type_login = $this->input->post('type_login');
        $confirmpassword = $this->input->post('confirmpassword');

        if($password!=$confirmpassword)
        {
            // $error = "password tidak sama";
            // $this->load->view('v_register',$error); 
            //  print_r($error);   


             $this->session->set_flashdata('error', 'password tidak sama');            
        	redirect('login/register_login');
        }
        else
        {   

            $datalog = array(
                'username' => $username,
                'password' => $password,
                'type_login' => $type_login
                );

            $cari_username = $this->model_data->cek_username($username);

            // print_r($cari_username);
            if($cari_username==null)
            {
                $this->model_data->insert($datalog,'login');
                redirect('login');
                
                
                
            }
            else
            {

                $this->session->set_flashdata('error', 'username sudah ada');            
                redirect('login/register_login');
                
                // $error = "username sudah ada";
                //  $this->load->view('v_register',$error); 
                //  print_r($error); 
                
                   
            }

            // $this->model_data->insert($datalog,'login');
            // redirect('login');
        }
    }

     function logout(){
        $this->session->sess_destroy();
        redirect('dashboard');
    }
	

}

?>