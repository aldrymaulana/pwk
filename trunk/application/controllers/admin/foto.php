<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('flexigrid');
		$this->load->library('flexigrid');
		$this->load->model('foto_model');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		//$this->load->helper(array('form', 'url', 'html'));
		/*$config['upload_path'] = "./file/";
		//$config['upload_path2'] = "./file/thumb";
		$config['allowed_types'] ='jpg|png|jpeg|doc|docx|pdf';
		$config['max_size']	= '10000';
		$config['max_width']  = '1500';
		$config['max_height']  = '1500';
		
		// create directory if doesn't exist
		if(!is_dir($config['upload_path'])){
			mkdir($config['upload_path'], 0777);
			mkdir($config['upload_path2'], 0777);
		}
		
		$this->load->library('upload', $config);
		*/
	}
	

	
	
	 function upload_file()
	 {
		  $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/' . base_url().'file/'; //direktori tempat gambar
		  $config['allowed_types'] = 'gif|jpg|png'; // jenis file yg boleh di upload
		  $config['max_size'] = '100'; // max ukuran file
		  $config['max_width'] = '1024';
		  $config['max_height'] = '768';
		  
		  //$this->upload->initialize($config);

		  $this->load->library('upload', $config); // perintah konfigurasi pada library upload
		  if ( ! $this->upload->do_upload('fupload')) // perintah upload
		  {
		   $error = array('error' => $this->upload->display_errors());
		   $this->load->view('admin/eror', $error);
		   //echo $error;
		  }
		  else
		  {
		   $data = array('upload_data' => $this->upload->data());
		   $this->load->view('hal_ sukses', $data);
		  }
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
	
	
	 function do_upload() {
		$error['status'] = 'new';
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $name = $_FILES['foto']['name']; // get file name from form
        $fileNameParts = explode('.', $name); // explode file name to two part
        $default_name = $fileNameParts[0]; // get raw name from client
        $config['file_name'] = $default_name . "_desired_name"; //constructing a new name


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/form_foto', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('success_view', $data);
        }
    }
	
	function add(){
		/*$data = array(
		'JUDUL' => $this->input->post('judul'),
		'ISI' => $this->input->post('isi')
		);
		$this->artikel_model->insert($data);
		redirect ('admin/artikel');*/
		
		
		//upload
		$nama_file_gambar = $this->upload->data();//upload
		$nama_gambar0 = explode(".", $nama_file_gambar['file_name']);//get file name
		$nama_gambar1 = $nama_gambar0[0];
		$nama_gambar2 = $nama_gambar0[1];
		$data = array(
					'nama_foto' => $this->input->post('nama_foto'),
					//'lokasi' => $nama_gambar0[0]
					'lokasi' => $nama_gambar0[0].'_thumb.'.$nama_gambar0[1]
					//'gambar_produk' => $nama_gambar0[0].'_thumb.'.$nama_gambar0[1],
					//'status_produk' => 1
				);
		$this->foto_model->insert($data);
		//redirect('administrator/produk');
		echo 'Sukses Bro!';
	}
	
	
	
	
	//melhat daftar produk yang telah dibuat
	function grid_daftar()
	{
		$colModel['no'] = array('No',50,TRUE,'center',0);
		$colModel['nama_produk'] = array('Judul',200,TRUE,'center',1);
		$colModel['gambar_produk'] = array('Gambar Produk',100,TRUE,'center',1);
		$colModel['edit'] = array('Edit',50,TRUE,'center',1);
		$colModel['hapus'] = array('Hapus',50,TRUE,'center',1);
		
		//setting konfigurasi pada bottom tool bar flexigrid
		$gridParams = array(
							'width' => 'auto',
							'height' => 330,
							'rp' => 15,
							'rpOptions' => '[15,30,50,100]',
							'pagestat' => 'Menampilkan : {from} ke {to} dari {total} data.',
							'blockOpacity' => 0,
							'title' => 'MANAJEMEN PRODUK',
							'showTableToggleBtn' => false
							);
							
		//menambah tombol pada flexigrid top toolbar
		$buttons[] = array('Tambah','add','spt_js');
		$buttons[] = array('separator');
		
		// mengambil data dari file controler ajax pada method grid_user		
		$url = site_url()."/administrator/produk/grid_user";
		$grid_js = build_grid_js('user',$url,$colModel,'ID','asc',$gridParams,$buttons);
		$data['js_grid'] = $grid_js;
		$data['added_js'] = 
		"<script type='text/javascript'>
		function spt_js(com,grid){	
			if (com=='Tambah'){
				location.href= '".base_url()."index.php/administrator/produk/tambah_produk';    
			}
			if (com=='Hapus'){
				if($('.trSelected',grid).length>0){
					if(confirm('Anda yakin ingin menghapus ' + $('.trSelected',grid).length + ' buah data?')){
						var items = $('.trSelected',grid);
						var itemlist ='';
						for(i=0;i<items.length;i++){
							itemlist+= items[i].id.substr(3)+',';
						}
						$.ajax({
						   type: 'POST',
						   url: '".base_url()."index.php/manajemen_user/hapus_user', 
						   data: 'items='+itemlist,
						   success: function(data){
							$('#user').flexReload();
							alert(data);
						   }
						});
					}
				} else {
					return false;
				} 
			} 			
		} </script>";
			
		//$data['added_js'] variabel untuk membungkus javascript yang dipakai pada tombol yang ada di toolbar atas
		$data['content'] = $this->load->view('administrator/grid',$data,true);
		$this->load->view('administrator/main',$data);
	}
	
	function grid_user() 
	{
		$valid_fields = array('produk_ID','nama_produk','gambar_produk','status_produk');
		$this->flexigrid->validate_post('produk_ID','asc',$valid_fields);
		$records = $this->produk_model->get_data_flexigrid();
		$this->output->set_header($this->config->item('json_header'));
			
		$no = 0;
		foreach ($records['records']->result() as $row){	
				$no = $no+1;
				$gambar_produk = explode('_thumb', $row->gambar_produk);
				$record_items[] = array(
										$row->produk_ID,
										$no,
										$row->nama_produk,
										'<a href='.base_url().'/file/'.$gambar_produk[0] . $gambar_produk[1].' target=\'_blank\'>lihat</a>',
										'<a href='.base_url().'index.php/administrator/produk/edit/'.$row->produk_ID.'><img border=\'0\' src=\''.base_url().'images/flexigrid/magnifier.png\'></a>',
										'<a href='.base_url().'index.php/administrator/produk/hapus/'.$row->produk_ID.' onclick="return confirm(\'Anda yakin ingin menghapus data ini ?\')"><img border=\'0\' src=\''.base_url().'images/flexigrid/hapus.png\'></a>'
								);
		}
		
		if(isset($record_items))
			$this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_items));
		else
			$this->output->set_output('{"page":"1","total":"0","rows":[]}');
	}
	
	function tambah_produk()
	{
		$data['content'] = $this->load->view('administrator/tambah_produk',null,true);
		$this->load->view('administrator/main',$data);
	}
	
	function tambah_produk_proses()
	{
		if($this->cek_validasi(false)){
			//$nama_file_gambar = $this->do_uploads();
			$nama_file_gambar = $this->upload->data();//upload
			$nama_gambar0 = explode(".", $nama_file_gambar['file_name']);//get file name
			$nama_gambar1 = $nama_gambar0[0];
			$nama_gambar2 = $nama_gambar0[1];
			$data = array(
						'nama_produk' => $this->input->post('nama_produk'),
						'deskripsi_produk' => $this->input->post('deskripsi_produk'),
						'gambar_produk' => $nama_gambar0[0].'_thumb.'.$nama_gambar0[1],
						'status_produk' => 1
					);
			$this->produk_model->add($data);
			redirect('administrator/produk');
		}else{
			$this->tambah_produk();
		}
	}
	
	function cek_validasi($edit)
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
		if($edit == false) $this->form_validation->set_rules('userfile', 'Gambar Produk', 'callback_cek_userfile');		
		$this->form_validation->set_message('required', 'Kolom %s harus diisi !!');

		return $this->form_validation->run();
	}
	
		
	function do_uploads()
	{			
		$files = $this->upload->do_upload();	
		if (!$files){
			//$this->session->set_userdata('failed_form',$this->upload->display_errors());	
			$this->session->set_flashdata('failed_form',$this->upload->display_errors());
			//redirect('pengusulan');
			//print_r(array('error' => $this->upload->display_errors()));
		}
		else{
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image']	= './file/'.$data['file_name'];
			//$config['new_image'] = realpath(dirname(__FILE__)). '/file/thumb'.$data['file_name'].'_resize';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 418;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();
			return $data['file_name'];
		}
	}
	
	function cek_userfile(){
        if (!$this->upload->do_upload())
        {
            $this->form_validation->set_message('Gambar Produk',$this->upload->display_errors());
            return false;
        } else {
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image']	= './file/'.$data['file_name'];
			//$config['new_image'] = realpath(dirname(__FILE__)). '/file/thumb'.$data['file_name'].'_resize';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 418;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();
            return true;
        }
    }
    
    function detail_produk($produk_ID)
    {
		$result = $this->produk_model->view_by_id($produk_ID)->row();
		$data['nama_produk'] = $result->nama_produk;
		$data['deskripsi_produk'] = $result->deskripsi_produk;
		$data['gambar_produk'] = $result->gambar_produk;
		$data['content'] = $this->load->view('administrator/detail_produk',$data,true);
		$this->load->view('administrator/main',$data);
	}
	
	function edit($produk_ID)
	{
		$result = $this->produk_model->view_by_id($produk_ID)->row();
		$data['produk_ID'] = $result->produk_ID;
		$data['nama_produk'] = $result->nama_produk;
		$data['deskripsi_produk'] = $result->deskripsi_produk;
		$data['content'] = $this->load->view('administrator/edit_produk', $data, true);
		$this->load->view('administrator/main', $data);
	}
	
	function edit_process($produk_ID)
	{
		$nama_file_gambar = $this->do_uploads();
		$nama_gambar0 = explode(".", $nama_file_gambar);
		$nama_gambar1 = $nama_gambar0[0];
		$nama_gambar2 = $nama_gambar0[1];
		if($nama_file_gambar['filename'] != null) 
			$data = array(
						'nama_produk' => $this->input->post('nama_produk'),
						'deskripsi_produk' => $this->input->post('deskripsi_produk'),
						'gambar_produk' => $nama_gambar0[0].'_thumb.'.$nama_gambar0[1]
			);
		else
			$data = array(
						'nama_produk' => $this->input->post('nama_produk'),
						'deskripsi_produk' => $this->input->post('deskripsi_produk'),
			);
		if($this->cek_validasi(true) == true){
			$this->produk_model->update($produk_ID, $data);
			redirect('administrator/produk');
		}else{
			
		}
	}
	
	function hapus($produk_ID)
	{
		$this->produk_model->update($produk_ID, array('status_produk' => 0));
		redirect('administrator/produk');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
