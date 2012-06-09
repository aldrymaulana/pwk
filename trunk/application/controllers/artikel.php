<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('flexigrid');
        $this->load->library('flexigrid');
        $this->load->model('artikel_model');
    }

//end Main

    function index($id) {
        $record_artikel = $this->artikel_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            //$data['id_artikel'] = $artikel->id_artikel;
            $data['judul'] = $artikel->judul;
            $data['isi'] = $artikel->isi;
        }
        $this->load->view('berita', $data);
    }


    function daftar_berita() {
        //$record_artikel = $this->artikel_model->selectone($id);
        $data['artikel'] = $this->artikel_model->get_all_artikel();
        $this->load->view('berita_daftar', $data);
    }
    
    function daftar_berita_high() {
        //$record_artikel = $this->artikel_model->selectone($id);
        $data['artikel'] = $this->artikel_model->get_all_artikel_high();
        $this->load->view('berita_high_daftar', $data);
    }

}

//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */