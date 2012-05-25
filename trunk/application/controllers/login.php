<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
    }

    function index() {
//        $data['title'] = 'Admin Home';
//        $this->template->write_view('header', 'template/header', $data);
//        $this->template->write_view('content', 'home_admin', $data);
//        $this->template->write_view('footer', 'template/footer', $data);
//        $this->template->render();
        $this->load->view('admin/form_login');
    }

    function auth() {
        $this->session->sess_destroy();
        $valid = false;
        $users = $this->user_model->get_user();

        $name = $this->input->post('username');
        $password = $this->input->post('password');

        //kondisi pengecekan apakah username dan password yang dimasukkan telah sesuai dengan benar atau tidak
        foreach ($users->result() as $row) {
            if ($name == $row->username && md5($password) == $row->password) {
                $valid = true;

                //setting session terhadap data user
                $newdata = array(
                    'username' => $name,
                    'password' => $password,
                    'id_user' => $row->id_user
                    
                );
                $this->session->set_userdata($newdata);
                break;
            }
        }//end foreach
        //apabila login telah sesuai dengan username dan password maka user akan masuk halaman utama
        if ($valid) {
                redirect('admin/home');
        }
        //apabila login tidak sesuai dengan username dan password maka user akan masuk halaman login
        else {
            redirect('login');
        }
    }

//end if

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file deabakery.php */
/* Location: ./application/controllers/deabakery.php */