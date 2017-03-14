<?php
class TahunAjaranM extends CI_Model{
	function getSemTA(){
		$this->db->flush_cache();
		$this->db->from('tahunAjaran');
		$query=$this->db->get();
		return $query->row();
	}
}