<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

//end Main

    function index() {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $data['failed'] = false;
            $data['aa'] = '';
            $data['content'] = $this->load->view('admin/home', $data, true);
            $this->load->view('admin/main', $data);
        }
    }

//end index
}

//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */