<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen_c extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dosen_model');

        $this->load->helper(array('text','url'));


    }
    function  index(){
        
        $data['data_dosen']= $this->dosen_model->get_dosen();
        $this->load->view('dosen',$data);

    }
}
