<?php
class nilaiM extends CI_Model{
	function tambahNilai($data){
	if(!$this->db->insert_batch('nilai',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	function getNilaiKelas($mapel,$kelas,$thajar,$semester){
		$this->db->from('nilai');
		$this->db->where('nama_pelajaran',$mapel);
		$this->db->where('nama_kelas',$kelas);
		$this->db->where('tahun_ajaran',$thajar);
		$this->db->where('semester',$semester);
		$query=$this->db->get();
		return $query->result();
	}
}