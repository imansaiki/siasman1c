<?php
class AmpuhanM extends CI_Model{
	function getKelasAmpuhan($data){
		$this->db->flush_cache();
		$this->db->distinct();
		$this->db->select('jadwal.nama_kelas,jadwal.kode_guru');
		$this->db->from('ampuhan');
		$this->db->join('jadwal', 'jadwal.kode_guru = ampuhan.kode_guru');
		$this->db->where('ampuhan.nip',$data);
		$query=$this->db->get();
		return $query->result();
	}
	function getNamaMapel($data){
		$this->db->from('ampuhan');
		$this->db->where('kode_guru',$data);
		$query=$this->db->get();
		return $query->row();
	}
}