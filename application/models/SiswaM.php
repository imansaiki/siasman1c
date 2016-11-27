<?php
class SiswaM extends CI_Model{
	function login($data){
		//cleaning query from XSS
		$id = $this->security->xss_clean($data);
		//cleaning query from SQL injection
		$id = $this->db->escape_str($id);
		//set query
		$this->db->flush_cache();
		$this->db->select('nama');
		$this->db->where('nis',$id);
		$this->db->from('Siswa');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}