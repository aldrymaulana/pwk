<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//ini masih belum jadi :D

class dosen_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->CI = get_instance();
    }

    function insert($data) {
        $this->db->insert('FOTO', $data);
    }

    //list flexy
    function get_data_dosen() {
        //Select table name
        $table_name = "dosen";

        //Build contents query
        $this->db->select('*')->from($table_name);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select('*')->from($table_name);
        $this->CI->flexigrid->build_query(FALSE);

        $return['record_count'] = $this->db->count_all_results();

        //Return all
        return $return;
    }

    function delete($id) {
        $this->db->where('ID_DOSEN', $id);
        $this->db->delete('dosen');
    }

    function selectone($id) {
        $this->db->select("*");
        $this->db->from('FOTO');
        $this->db->where('ID_FOTO', $id);
        $query = $this->db->get();
        return $query;
    }

    function update($id, $data) {
        $this->db->where('ID_FOTO', $id);
        $this->db->update('FOTO', $data);
    }

}

?>