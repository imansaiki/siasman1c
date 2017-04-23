<?php
class GuruM extends CI_Model{
	function login($data){
		//cleaning query from XSS
		$id = $this->security->xss_clean($data);
		//cleaning query from SQL injection
		$id = $this->db->escape_str($id);
		//set query
		$this->db->flush_cache();
		$this->db->select('nama');
		$this->db->where('nip',$id);
		$this->db->from('Guru');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
	function tambahGuru($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		if(!$this->db->insert('guru',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	function deleteGuru($nip){
		$this->db->flush_cache();
		$this->db->where('nip',$nip);
		$this->db->delete('guru');
		
		$this->db->flush_cache();
		$this->db->where('nip',$nip);
		$this->db->delete('ampuhan');
		
		$this->db->flush_cache();
		$this->db->where('id',$nip);
		$this->db->delete('akun');
	}
	function editGuru($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->where('nip',$data['nip']);
		if(!$this->db->update('guru',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	
	function getDaftarGuru(){
		//cleaning query from XSS
		$this->db->flush_cache();
		$this->db->select('nip, nama, alamat');
		$this->db->from('guru');
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
	function getDataGuru($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		$this->db->from('guru');
		$this->db->where('nip',$data);
		//execute query
		$query = $this->db->get();
		return $query->row();
	}
	

}