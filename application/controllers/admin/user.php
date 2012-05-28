<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('flexigrid');
        $this->load->library('flexigrid');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

//end Main
    //load Grid
    function index() {
        $colModel['no'] = array('No', 30, TRUE, 'center', 0);
        $colModel['Username'] = array('Username', 150, TRUE, 'center', 1);
        $colModel['Edit'] = array('Edit', 30, TRUE, 'center', 0);

        $gridParams = array(
            'width' => 'auto',
            'height' => 300,
            'rp' => 10,
            'rpOptions' => '[5,10,15,20,25,40]',
            'pagestat' => 'Menampilkan: {from} hingga {to} dari {total} data.',
            'blockOpacity' => 0.5,
            'title' => 'Daftar User',
            'showTableToggleBtn' => true
        );

        $buttons[] = array('tambah', 'add', 'spt_js');
        $buttons[] = array('separator');
        $buttons[] = array('hapus', 'delete', 'spt_js');


        // mengambil data dari file controler ajax pada method grid_berkas
        $grid_js = build_grid_js('flex1', site_url("admin/user/grid_user"), $colModel, 'Username', 'asc', $gridParams, $buttons);

        $data['added_js'] =
                "<script type='text/javascript'>
		function spt_js(com,grid)
		{
			if (com=='tambah')
			{
				location.href='" . base_url() . "index.php/admin/user/form'; 
			}
			
			if (com=='hapus')
				{
				   if($('.trSelected',grid).length>0){
					   if(confirm('Anda yakin menghapus ' + $('.trSelected',grid).length + ' artikel?')){
							var items = $('.trSelected',grid);
							var itemlist ='';
							for(i=0;i<items.length;i++){
								itemlist+= items[i].id.substr(3)+',';
							}
							$.ajax({
							   type: 'POST',
							   url: '" . base_url() . "index.php/admin/artikel/delete" . "',
							   data: 'items='+itemlist,
							   success: function(data){
								$('#flex1').flexReload();
							   }
							});
						}
					} else {
						return false;
					} 
				}
				
		} 
		</script>
		";


        $data['js_grid'] = $grid_js;
        $data['content'] = $this->load->view('admin/grid', $data, true);
        $this->load->view('admin/main', $data);
    }

    function grid_user() {
        $valid_fields = array('Username');
        $this->flexigrid->validate_post('Username', 'asc', $valid_fields);
        $records = $this->user_model->get_data_user();
        $this->output->set_header($this->config->item('json_header'));
        //$new_tab = 'target="_blank"';

        $no = 0;
        foreach ($records['records']->result() as $row) {
            $record_items[] = array(
                $row->id_user,
                $no = $no + 1,
                $row->username,
                '<a href=\'' . base_url() . 'index.php/admin/artikel/edit/' . $row->id_user . '\'><img border=\'0\' src=\'' . base_url() . 'images/grid/edit.png\'></a> '
            );
        }

        if (isset($record_items))
            $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
        else
            $this->output->set_output('{"page":"1","total":"0","rows":[]}');
    }

    function form() {
        $data['status'] = 'new';
        $data['failed'] = false;
        $data['aa'] = '';
        $data['content'] = $this->load->view('admin/form_user', $data, true);
        $this->load->view('admin/main', $data);
    }

    function add() {
        if ($this->cek_validasi() == FALSE) {
            $this->form();
        } else {
            $data = array(
                'USERNAME' => $this->input->post('username'),
                'PASSWORD' => md5($this->input->post('password')),
                'STATUS' => 1
            );
            $this->user_model->insert($data);
            redirect('admin/user');
        }
    }

    public function edit($id) {
        $data['status'] = 'edit';
        $record_artikel = $this->artikel_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            $data['id_artikel'] = $artikel->id_artikel;
            $data['judul'] = $artikel->judul;
            $data['isi'] = $artikel->isi;
        }
        //$data['status'] = 'new';
        $data['failed'] = false;
        $data['aa'] = '';
        $data['content'] = $this->load->view('admin/form_artikel', $data, true);
        $this->load->view('admin/main', $data);
    }

    function update($id) {
        $data = array(
            'JUDUL' => $this->input->post('judul'),
            'ISI' => $this->input->post('isi')
        );
        $this->artikel_model->update($id, $data);
        redirect('admin/artikel');
    }

    function update_status_aktif($id) {
        $record_artikel = $this->artikel_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            if ($artikel->status == 0) {
                $data = array(
                    'STATUS' => 1
                );
                $this->artikel_model->update($id, $data);
                redirect('admin/artikel');
            } else {
                $data = array(
                    'STATUS' => 0
                );
                $this->artikel_model->update($id, $data);
                redirect('admin/artikel');
            }
        }
    }

    function update_status_high($id) {
        $record_artikel = $this->artikel_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            if ($artikel->status == 1) {
                $data = array(
                    'STATUS' => 2
                );
                $this->artikel_model->update($id, $data);
                redirect('admin/artikel');
            } else if ($artikel->status == 2) {
                $data = array(
                    'STATUS' => 1
                );
                $this->artikel_model->update($id, $data);
                redirect('admin/artikel');
            }
        }
    }

    function delete() {
        $spt_ids_post_array = split(",", $this->input->post('items'));
        //$this->load->model('pengolahan/data_model');
        //$msg='akun berhasil dihapus';
        foreach ($spt_ids_post_array as $index => $id) {
            if (isset($id) && $id != '') {
                $this->artikel_model->delete($id);
            }//end if
        }//end foreach
    }

    function test($id) {
        $record_artikel = $this->artikel_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            //$data['id_artikel'] = $artikel->id_artikel;
            $data['judul'] = $artikel->judul;
            $data['isi'] = $artikel->isi;
        }
        $this->load->view('artikel', $data);
    }

    function cek_validasi() {
        // Setting Rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_cek_password');
        $this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required');

        //Setting Error Message
        $this->form_validation->set_message('required', 'Field %s harus diisi.');

        // Setting Delimiter
        $this->form_validation->set_error_delimiters('<li class="error">', '</li>');
        return $this->form_validation->run();
    }

    function cek_password($value) {
        if ($value != $this->input->post('password_konfirm')) {
            $this->form_validation->set_message('cek_password', 'Password tidak sesuai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

//end cek_dropdown
}

//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */