<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class labkomputasiprofil extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->load->library('session');

        $this->load->helper(array('text','url'));


    }
    function  index(){
        $this->load->view('labkomputasiprofil');

    }
}
