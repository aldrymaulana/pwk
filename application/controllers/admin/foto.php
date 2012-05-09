<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->library('flexigrid');	
		$this->load->helper('flexigrid');
		$this->load->library('form_validation');
		$this->load->model('foto_model');
	}
	
	function index()
	{
		$this->grid_daftar();
	}
	
	function form(){
		$data['status'] = 'new';
		$data['failed'] = false;			
		$data['aa']='';
		$data['content'] = $this->load->view('admin/form_foto',$data,true);
		$this->load->view('admin/main',$data);
	}
	
	function upload()
	{	
		$field_name = 'foto';
		
		$config['upload_path'] = "file";
		$config['allowed_types'] ='*';
		//$config['allowed_types'] ='jpg';
		
		$this->load->library('upload', $config);
		
		$files = $this->upload->do_upload($field_name);	
				
		$out = '';		
		if (  ! $files ){
			$out .= array('error' => $this->upload->display_errors());
			$print = $this->upload->display_errors();
			echo $print;
			//echo $error;
			//return "";
			
		}	
		else{
			$data = $this->upload->data($field_name);//get file_name
			$file_name = $data['file_name'];
			$path[0] = 'file/'.$file_name;
			$path[1] = $file_name;
			//return $path;
		}
	}

	
	
}
