<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('ARTIKEL',$data);
	}
	
	
	function getAllGrid($start,$limit,$sidx,$sord,$where){
		$this->db->select('ID_PESERTA','NAMA_PESERTA');
		$this->db->limit($limit);
		if($where != NULL)$this->db->where($where,NULL,FALSE);
		$this->db->order_by($sidx,$sord);
		$query = $this->db->get('peserta',$limit,$start);

		return $query->result();
	}
	
	
	
	
	function update_user($data,$id_user){
		$this->db->where('ID_USER',$id_user);
		$this->db->update('USERS',$data);
	}
	
	function get_user(){
		$this->db->select("*");
		$this->db->from('USERS');
		$this->db->where("STATUS > 0 ");
		$query = $this->db->get();
		return $query;
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