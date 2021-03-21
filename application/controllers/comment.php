<?php

class Comment extends CI_Controller
{

    function tambah_comment()
    {
        if($this->session->userdata('status') == "login")
        {
        	$id_case = $this->input->get('id_case');            
        	$comment = $this->input->post('comment');
        	$nama = $this->session->userdata('username');            

        	$id_login = $this->model_data->cari_id_login($nama);

        	$data = array(                                
                    'id_login' => $id_login[0]['id_login'],
                    'id_case' => $id_case,
                    'comment' => $comment                                        
                );

        	
        	$this->model_data->insert($data,'comment');

        	// redirect('home/pilih_case_comment($id_case)');
            // redirect('dashboard');
            $this->session->set_flashdata('id_case',$id_case);
            redirect('home/pilih_case_comment');
        }
        else
        {
            redirect('login');
        }
    }

}

?>