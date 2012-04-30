<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen_c extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dosen_model');

        $this->load->helper(array('text','url'));


    }
    function  index(){
        $test_foto = $this->dosen_model->get_dosen()->result();
        $data['path_foto']=$test_foto;
        $this->load->view('dosen',$data);

    }
}
