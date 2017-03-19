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
		$this->db->join('matapelajaran', 'matapelajaran.id_pelajaran = ampuhan.id_pelajaran');
		$this->db->where('kode_guru',$data);
		$this->db->select('matapelajaran.nama_pelajaran');
		$query=$this->db->get();
		return $query->row();
	}
}