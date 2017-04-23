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
	function deleteSiswa($nis){
		$this->db->flush_cache();
		$this->db->where('nis',$nis);
		$this->db->delete('siswa');
		
		$this->db->flush_cache();
		$this->db->where('nis',$nis);
		$this->db->delete('kelas');
		
		$this->db->flush_cache();
		$this->db->where('nis',$nis);
		$this->db->delete('nilai');
		
		$this->db->flush_cache();
		$this->db->where('nis',$nis);
		$this->db->delete('akun');
	}
	function editSiswa($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->where('nis',$data['nis']);
		if(!$this->db->update('siswa',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
}