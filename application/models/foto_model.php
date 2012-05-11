<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ini masih belum jadi :D

class Foto_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('FOTO',$data);
	}
	
	//list flexy
	function get_data_foto(){
		//Select table name
		$table_name = "FOTO";
		
		//Build contents query
		$this->db->select('*')->from($table_name);
                $this->db->where("STATUS > 0 ");
		$this->CI->flexigrid->build_query();
		
		//Get contents
		$return['records'] = $this->db->get();
		
		//Build count query
		$this->db->select('*')->from($table_name);
                $this->db->where("STATUS > 0 ");
		$this->CI->flexigrid->build_query(FALSE);
		
		$return['record_count'] = $this->db->count_all_results();
	
		//Return all
		return $return;
	}
	
	
	function getAllGrid($start,$limit,$sidx,$sord,$where){
		$this->db->select('ID_PESERTA','NAMA_PESERTA');
		$this->db->limit($limit);
		if($where != NULL)$this->db->where($where,NULL,FALSE);
		$this->db->order_by($sidx,$sord);
		$query = $this->db->get('peserta',$limit,$start);

		return $query->result();
	}
	
	
	function delete($id){
		$this->db->where('ID_FOTO', $id);
		$this->db->delete('FOTO'); 
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('FOTO');
		$this->db->where('ID_FOTO',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($id, $data){
		$this->db->where('ID_FOTO',$id);
		$this->db->update('FOTO',$data);
	}
	
	function get_menteri(){
		$this->db->select('*');
		$this->db->from('USERS');
		$this->db->where('STATUS = 2');
		$query = $this->db->get();
		return $query;
	}
	
}

?>