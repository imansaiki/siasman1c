<?php
class KelasM extends CI_Model{
	
	function tambahSiswaKelas($data){
		$this->security->xss_clean($data);
		$this->db->escape_str($data);
		$this->db->flush_cache();
		if(!$this->db->replace('kelas',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
function getDaftarSiswa($kelas,$thajar){
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->join('siswa', 'siswa.nis = kelas.nis');
		$this->db->join('daftarkelas', 'daftarkelas.nama_kelas = kelas.nama_kelas');
		$this->db->where('kelas.nama_kelas',$kelas);
		$this->db->where('kelas.tahun_ajaran',$thajar);
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}