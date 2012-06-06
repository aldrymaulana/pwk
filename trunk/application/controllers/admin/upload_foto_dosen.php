<?php

class upload_foto_dosen extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {

    }

    function do_upload() {
        $config['upload_path'] = './gallery/dosen';
        $config['allowed_types'] = 'jpg|png';
        $config['allowed_sizes'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload_foto_dosen->do_upload()) {
            $error = array('error' => $this->upload_foto_dosen->display_errors());
            //upload viewnya belum
        } else {
            $data = array('upload_data' => $this->upload_foto_dosen->data());
            $this->load->view('upload_success', $data);
        }
    }

    function form() {
        $data['status'] = 'new';
        $data['failed'] = false;
        $data['aa'] = '';
        $data['content'] = $this->load->view('admin/foto_dosen', $data, true);
        $this->load->view('admin/main',$data);
    }

}