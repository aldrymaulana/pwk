<?php

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
	}//end Main
	
	
	function index(){
		
		//if(!$this->session->userdata('id_user') == null){
			//$data['id_user'] = $this->session->userdata('id_user');
			$data['failed'] = false;			
			$data['aa']='';
			$data['content'] = $this->load->view('admin/home',$data,true);
			$this->load->view('admin/main',$data);
			
		/*}
		else{
			redirect('pengolahan/main_login');
		}*/
		
	}//end index
	
	function form(){
		$data['failed'] = false;			
		$data['aa']='';
		$data['content'] = $this->load->view('admin/add_artikel',$data,true);
		$this->load->view('admin/main',$data);
	}
	
	function add(){
		$data = array(
		'JUDUL' => $this->input->post('judul'),
		'ISI' => $this->input->post('isi')
		);
		$this->artikel_model->insert($data);
	}
	
	
}//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */