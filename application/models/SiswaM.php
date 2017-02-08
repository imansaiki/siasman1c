<?php
class SiswaM extends CI_Model{
	function login($data){
		//cleaning query from XSS
		$id = $this->security->xss_clean($data);
		//cleaning query from SQL injection
		$id = $this->db->escape_str($id);
		//set query
		$this->db->flush_cache();
		$this->db->select('nama');
		$this->db->where('nis',$id);
		$this->db->from('Siswa');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
	function tambahSiswa($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		if(!$this->db->insert('siswa',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	function getDaftarSiswa($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->join('siswa', 'siswa.nis = kelas.nis');
		$this->db->where('nama_kelas',$data);
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
	function getDataSiswa($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->from('siswa');
		$this->db->where('nis',$data);
		//execute query
		$query = $this->db->get();
		return $query->row();
	}
}