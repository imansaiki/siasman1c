<?php
class jadwalM extends CI_Model{
	function getDaftarMapel(){
		$this->db->flush_cache();
		$this->db->from('matapelajaran');
		$query=$this->db->get();
		return $query->result();
	}
	function  getKelasAmpuhan($data){
		$this->db->flush_cache();
		$this->db->select('daftarkelas.nama_kelas');
		$this->db->from('daftarkelas');
		$this->db->join('jadwal', 'jadwal.nama_kelas = daftarkelas.nama_kelas','inner');
		$query=$this->db->get();
		return $query->result();
	}
}