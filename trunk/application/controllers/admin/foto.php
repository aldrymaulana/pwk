<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foto extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('flexigrid');
        $this->load->helper('flexigrid');
        $this->load->helper(array('form', 'url'));
        $this->load->model('foto_model');
    }

    //load Grid
    function index() {
        $colModel['no'] = array('No', 30, TRUE, 'center', 0);
        $colModel['Nama_Foto'] = array('Nama Foto', 200, TRUE, 'center', 1);
        $colModel['Lokasi'] = array('Link Foto', 300, TRUE, 'left', 0);
        $colModel['Slide'] = array('Set Foto Slide', 90, TRUE, 'center', 0);
        $colModel['Detail'] = array('Preview', 60, TRUE, 'center', 0);
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
        $grid_js = build_grid_js('flex1', site_url("admin/foto/grid_foto"), $colModel, 'Nama_Foto', 'asc', $gridParams, $buttons);

        $data['added_js'] =
                "<script type='text/javascript'>
        function spt_js(com,grid)
        {
                if (com=='tambah')
                {
                        location.href='" . base_url() . "index.php/admin/foto/form'; 
                }

                if (com=='hapus')
                        {
                           if($('.trSelected',grid).length>0){
                                   if(confirm('Anda yakin menghapus ' + $('.trSelected',grid).length + ' foto?')){
                                                var items = $('.trSelected',grid);
                                                var itemlist ='';
                                                for(i=0;i<items.length;i++){
                                                        itemlist+= items[i].id.substr(3)+',';
                                                }
                                                $.ajax({
                                                   type: 'POST',
                                                   url: '" . base_url() . "index.php/admin/foto/delete" . "',
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

    function grid_foto() {
        $valid_fields = array('Nama_Foto', 'Lokasi');
        $this->flexigrid->validate_post('Nama_Foto', 'asc', $valid_fields);
        $records = $this->foto_model->get_data_foto();
        $this->output->set_header($this->config->item('json_header'));
        $new_tab = 'target="_blank"';
        $no = 0;
        foreach ($records['records']->result() as $row) {
            $record_items[] = array(
                $row->id_foto,
                $no = $no + 1,
                $row->nama_foto,
                $row->lokasi,
                '<a href=\'' . base_url() . 'index.php/admin/artikel/edit/' . $row->id_foto . '\'><img border=\'0\' src=\'' . base_url() . 'images/grid/aktif.png\'></a> ',
                '<a href= \'' . $row->lokasi . '\' ' . $new_tab . '><img border=\'0\' src=\'' . $row->lokasi . '\' height=\'50\'></a> ',
                '<a href=\'' . base_url() . 'index.php/admin/foto/edit/' . $row->id_foto . '\'><img border=\'0\' src=\'' . base_url() . 'images/grid/edit.png\'></a> '
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
        $data['content'] = $this->load->view('admin/form_foto', $data, true);
        $this->load->view('admin/main', $data);
    }

    function upload() {
        $field_name = 'foto';
        $config['upload_path'] = "file";
        $config['allowed_types'] = '*';
        //$config['allowed_types'] ='jpg';

        $this->load->library('upload', $config);
        $files = $this->upload->do_upload($field_name);

        if (!$files) {
            $print = $this->upload->display_errors();
            echo $print;
            //echo $error;
            //return "";	
        } else {
            $data = $this->upload->data($field_name); //get file_name
            $file_name = $data['file_name'];
            $path[0] = base_url() . 'file/' . $file_name;
            $path[1] = $file_name;
            //return $path;

            $data = array(
                'NAMA_FOTO' => $this->input->post('nama_foto'),
                'LOKASI' => $path[0],
                'STATUS' => 1
            );
            $this->foto_model->insert($data);
            redirect('admin/foto');
        }
    }

    public function edit($id) {
        $data['status'] = 'edit';
        $record_artikel = $this->foto_model->selectone($id);
        foreach ($record_artikel->result() as $artikel) {
            $data['id_foto'] = $artikel->id_foto;
            $data['nama_foto'] = $artikel->nama_foto;
            $data['lokasi'] = $artikel->lokasi;
        }
        //$data['status'] = 'new';
        $data['failed'] = false;
        $data['aa'] = '';
        $data['content'] = $this->load->view('admin/form_foto', $data, true);
        $this->load->view('admin/main', $data);
    }

    function update($id) {
        $field_name = 'foto';
        $config['upload_path'] = "file";
        $config['allowed_types'] = '*';
        //$config['allowed_types'] ='jpg';

        $this->load->library('upload', $config);
        $files = $this->upload->do_upload($field_name);
        $file_name = '';

        if (!$files) {
            $data = $this->upload->data($field_name); //get file_name
            $file_name = $data['file_name'];
            $path[0] = base_url() . 'file/' . $file_name;
            $path[1] = $file_name;
            //return $path;

            $data = array(
                'NAMA_FOTO' => $this->input->post('nama_foto')
            );
            $this->foto_model->update($id, $data);
            redirect('admin/foto');
        } else {
            $data = $this->upload->data($field_name); //get file_name
            $file_name = $data['file_name'];
            $path[0] = base_url() . 'file/' . $file_name;
            $path[1] = $file_name;
            //return $path;

            $data = array(
                'NAMA_FOTO' => $this->input->post('nama_foto'),
                'LOKASI' => $path[0]
            );
            $this->foto_model->update($id, $data);
            redirect('admin/foto');
        }
    }

    function delete() {
        $spt_ids_post_array = split(",", $this->input->post('items'));
        //$this->load->model('pengolahan/data_model');
        //$msg='akun berhasil dihapus';
        foreach ($spt_ids_post_array as $index => $id) {
            if (isset($id) && $id != '') {
                $this->foto_model->delete($id);
            }//end if
        }//end foreach
    }

}