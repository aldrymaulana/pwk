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
    //load Grid
    function index() {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $colModel['no'] = array('No', 30, TRUE, 'center', 0);
            $colModel['Judul'] = array('Judul Artikel', 300, TRUE, 'center', 1);
            $colModel['Homepage'] = array('Highlights Artikel', 150, TRUE, 'center', 0);
            $colModel['Status'] = array('Status Artikel', 90, TRUE, 'center', 0);
            $colModel['Detail'] = array('Preview', 40, TRUE, 'center', 0);
            $colModel['Edit'] = array('Edit', 30, TRUE, 'center', 0);

            //$colModel['Delete'] = array('Delete',30,TRUE,'center',0);


            $gridParams = array(
                'width' => 'auto',
                'height' => 300,
                'rp' => 10,
                'rpOptions' => '[5,10,15,20,25,40]',
                'pagestat' => 'Menampilkan: {from} hingga {to} dari {total} data.',
                'blockOpacity' => 0.5,
                'title' => 'Daftar Artikel',
                'showTableToggleBtn' => true
            );

            $buttons[] = array('tambah', 'add', 'spt_js');
            $buttons[] = array('separator');
            $buttons[] = array('hapus', 'delete', 'spt_js');


            // mengambil data dari file controler ajax pada method grid_berkas
            $grid_js = build_grid_js('flex1', site_url("admin/artikel/grid_artikel"), $colModel, 'Judul', 'asc', $gridParams, $buttons);

            $data['added_js'] =
                    "<script type='text/javascript'>
		function spt_js(com,grid)
		{
			if (com=='tambah')
			{
				location.href='" . base_url() . "index.php/admin/artikel/form';
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

            //rendering view
            //$data['title'] = 'Daftar Peserta';
            //$data['js_grid']=$grid_js;
            $data['content'] = $this->load->view('admin/grid', $data, true);
            $this->load->view('admin/main', $data);
        }
    }

    function grid_artikel() {
        $valid_fields = array('Judul');
        $this->flexigrid->validate_post('Judul', 'asc', $valid_fields);
        $records = $this->artikel_model->get_data_artikel();
        $this->output->set_header($this->config->item('json_header'));
        $new_tab = 'target="_blank"';

        $no = 0;
        foreach ($records['records']->result() as $row) {
            $status_aktif = "";
            $status_aktif_high = "";
            $link = "";
            if ($row->status == 0) {
                $status_aktif = "" . base_url() . "images/grid/unaktif.png'";
                $status_aktif_high = "" . base_url() . "images/grid/unhighlight.png'";
                $link = "";
            } else if ($row->status > 0) {
                $status_aktif = "" . base_url() . "images/grid/aktif.png'";
                $link = "<a href=" . base_url() . "index.php/admin/artikel/update_status_high/" . $row->id_artikel . ">";
                if ($row->status == 2) {
                    $status_aktif_high = "" . base_url() . "images/grid/highlight.png'";
                } else {
                    $status_aktif_high = "" . base_url() . "images/grid/unhighlight.png'";
                }
            }

            $record_items[] = array(
                $row->id_artikel,
                $no = $no + 1,
                $row->judul,
                //remove a hreff
                '' . $link . '<img border=\'0\' src=\'' . $status_aktif_high . '\'></a> ',
                '<a href=\'' . base_url() . 'index.php/admin/artikel/update_status_aktif/' . $row->id_artikel . '\'><img border=\'0\' src=\'' . $status_aktif . '\'></a> ',
                '<a href= \'' . base_url() . 'index.php/artikel/index/' . $row->id_artikel . '\'' . $new_tab . '><img border=\'0\' src=\'' . base_url() . 'images/grid/page.png\'></a> ',
                '<a href=\'' . base_url() . 'index.php/admin/artikel/edit/' . $row->id_artikel . '\'><img border=\'0\' src=\'' . base_url() . 'images/grid/edit.png\'></a> '
            );
        }

        if (isset($record_items))
            $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
        else
            $this->output->set_output('{"page":"1","total":"0","rows":[]}');
    }

    function form() {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $data['status'] = 'new';
            $data['failed'] = false;
            $data['aa'] = '';
            $data['content'] = $this->load->view('admin/form_artikel', $data, true);
            $this->load->view('admin/main', $data);
        }
    }

    function add() {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $data = array(
                'JUDUL' => $this->input->post('judul'),
                'ISI' => $this->input->post('isi'),
                'STATUS' => 1
            );
            $this->artikel_model->insert($data);
            redirect('admin/artikel');
        }
    }

    public function edit($id) {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
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
    }

    function update($id) {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $data = array(
                'JUDUL' => $this->input->post('judul'),
                'ISI' => $this->input->post('isi')
            );
            $this->artikel_model->update($id, $data);
            redirect('admin/artikel');
        }
    }

    function update_status_aktif($id) {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
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
    }

    function update_status_high($id) {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
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
    }

    function delete() {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $spt_ids_post_array = split(",", $this->input->post('items'));
            //$this->load->model('pengolahan/data_model');
            //$msg='akun berhasil dihapus';
            foreach ($spt_ids_post_array as $index => $id) {
                if (isset($id) && $id != '') {
                    $this->artikel_model->delete($id);
                }//end if
            }//end foreach
        }
    }

    function test($id) {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        } else {
            $record_artikel = $this->artikel_model->selectone($id);
            foreach ($record_artikel->result() as $artikel) {
                //$data['id_artikel'] = $artikel->id_artikel;
                $data['judul'] = $artikel->judul;
                $data['isi'] = $artikel->isi;
            }
            $this->load->view('artikel', $data);
        }
    }

}

//end class

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */