<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen_c extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->load->library('session');
        //model masih dalam pengerjaan

        $this->load->helper(array('text','url'));


    }
    function  index(){
        $this->load->view('dosen');

    }
}
