<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('flexigrid');
		$this->load->library('flexigrid');
		$this->load->model('artikel_model');
	}//end Main
	
	function form(){
		$data['status'] = 'new';
		$data['failed'] = false;			
		$data['aa']='';
		$data['content'] = $this->load->view('admin/form_artikel',$data,true);
		$this->load->view('admin/main',$data);
	}
	
	function add(){
		$data = array(
		'JUDUL' => $this->input->post('judul'),
		'ISI' => $this->input->post('isi')
		);
		$this->artikel_model->insert($data);
		redirect ('admin/artikel');
	}
	
	public function edit($id)
	{
		$data['status'] = 'edit';
		$record_artikel = $this->artikel_model->selectone($id);
		foreach ($record_artikel->result() as $artikel){
			$data['id_artikel'] = $artikel->id_artikel;
			$data['judul'] = $artikel->judul;
			$data['isi'] = $artikel->isi;
		}
		//$data['status'] = 'new';
		$data['failed'] = false;			
		$data['aa']='';
		$data['content'] = $this->load->view('admin/form_artikel',$data,true);
		$this->load->view('admin/main',$data);
	}
	
	function update($id){
		$data = array(
		'JUDUL' => $this->input->post('judul'),
		'ISI' => $this->input->post('isi')
		);
		$this->artikel_model->update($id, $data);
		redirect ('admin/artikel');
	}
	
	function delete(){
		$spt_ids_post_array = split(",",$this->input->post('items'));
		//$this->load->model('pengolahan/data_model');
		
		//$msg='akun berhasil dihapus';
		foreach($spt_ids_post_array as $index => $id){
			if (isset($id)&&$id!=''){
				$this->artikel_model->delete($id);
			}//end if
		}//end foreach
	}
	
	function index($id){
		$record_artikel = $this->artikel_model->selectone($id);
			foreach ($record_artikel->result() as $artikel){
				//$data['id_artikel'] = $artikel->id_artikel;
				$data['judul'] = $artikel->judul;
				$data['isi'] = $artikel->isi;
			}
		$this->load->view('artikel',$data);
	}
	
}//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */