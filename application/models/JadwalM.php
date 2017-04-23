<?php
class jadwalM extends CI_Model{
	function updateJadwal($jam,$hari,$kelas,$kode){
		$this->db->flush_cache();
		$data = array(
				'jam' => $jam,
				'hari'  => $hari,
				'nama_kelas'  => $kelas,
				'kode_guru'  => $kode
		);
		$this->db->replace('jadwal',$data);
		return 0;
	}
	function refreshJadwal(){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$query=$this->db->get();
		return $query->result();
	}
	function getJadwalKelas($kelas){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->where('nama_kelas',$kelas);
		$query=$this->db->get();
		return $query->result();
	}
	function getJadwalGuru($nip){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->join('ampuhan','ampuhan.kode_guru=jadwal.kode_guru');
		$this->db->where('ampuhan.nip',$nip);
		$query=$this->db->get();
		return $query->result();
	}
}