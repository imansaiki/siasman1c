<?php
class AkunM extends CI_Model{
	function login($data){
		//cleaning query from XSS
		$id = $this->security->xss_clean($data['id']);
		$password = $this->security->xss_clean($data['password']);
		//cleaning query from SQL injection
		$id = $this->db->escape_str($id);
		$password = $this->db->escape_str($password);
		//set query
		$this->db->flush_cache();
		$this->db->where('id',$id);
		$this->db->where('password',$password);
		$this->db->from('Siswa');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}