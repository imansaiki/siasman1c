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
		$data_a=array(
				'id'=>$data['nis'],
				'password'=>$data['nis'],
				'level'=>'siswa'
		);
		$this->db->flush_cache();
		if(!$this->db->insert('siswa',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$this->db->insert('akun',$data_a);
			$query='0';
			return $query;
		}
		
		
	}
}