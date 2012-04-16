<?php

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
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
	
	function test(){
		$this->load->view('');
	}
	
}//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */