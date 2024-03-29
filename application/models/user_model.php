<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('USER',$data);
	}
	
	//list flexy
	function get_data_user(){
		//Select table name
		$table_name = "USER";
		
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
		$this->db->where('ID_USER', $id);
		$this->db->delete('USER');
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('USER');
		$this->db->where('ID_USER',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($id, $data){
		$this->db->where('ID_USER',$id);
		$this->db->update('USER',$data);
	}
        
        function get_user(){
		$this->db->select("*");
		$this->db->from('USER');
		$this->db->where("STATUS > 0 ");
		$query = $this->db->get();
		return $query;
	}
	
}

?>