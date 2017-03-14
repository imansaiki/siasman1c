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
function getDaftarSiswa($data,$data2){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->join('siswa', 'siswa.nis = kelas.nis');
		$this->db->where('nama_kelas',$data);
		$this->db->where('tahun_ajaran',$data2);
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}