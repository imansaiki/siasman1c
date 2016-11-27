<?php
class GuruM extends CI_Model{
	function login($data){
		//cleaning query from XSS
		$id = $this->security->xss_clean($data);
		//cleaning query from SQL injection
		$id = $this->db->escape_str($id);
		//set query
		$this->db->flush_cache();
		$this->db->select('nama');
		$this->db->where('nip',$id);
		$this->db->from('Guru');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}