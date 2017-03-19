<?php
class DaftarKelasM extends CI_Model{
	function getDaftarKelas(){
		$this->db->flush_cache();
		$this->db->from('daftarkelas');
		$query=$this->db->get();
		return $query->result();
	}
	function getDetailKelas($kelas){
		$this->db->from('daftarkelas');
		$this->db->where('nama_kelas',$kelas);
		$query=$this->db->get();
		return $query->row();
		
	}
}