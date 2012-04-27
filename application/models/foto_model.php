<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('FOTO_SLIDE',$data);
	}
	
	//list flexy
	function get_data_artikel(){
		//Select table name
		$table_name = "ARTIKEL";
		
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
	
	
	function getAllGrid($start,$limit,$sidx,$sord,$where){
		$this->db->select('ID_PESERTA','NAMA_PESERTA');
		$this->db->limit($limit);
		if($where != NULL)$this->db->where($where,NULL,FALSE);
		$this->db->order_by($sidx,$sord);
		$query = $this->db->get('peserta',$limit,$start);

		return $query->result();
	}
	
	
	function delete($id){
		$this->db->where('ID_ARTIKEL', $id);
		$this->db->delete('ARTIKEL'); 
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('ARTIKEL');
		$this->db->where('ID_ARTIKEL',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($id, $data){
		$this->db->where('ID_ARTIKEL',$id);
		$this->db->update('ARTIKEL',$data);
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