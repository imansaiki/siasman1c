<?php
class MataPelajaranM extends CI_Model{
	function getDaftarMapel(){
		$this->db->flush_cache();
		$this->db->from('matapelajaran');
		$query=$this->db->get();
		return $query->result();
	}
}