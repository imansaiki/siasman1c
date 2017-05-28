<?php
class AmpuhanM extends CI_Model{
	function getKelasAmpuhan($data){
		$this->db->flush_cache();
		$this->db->distinct();
		$this->db->select('jadwal.nama_kelas,jadwal.kode_guru,matapelajaran.nama_pelajaran');
		$this->db->from('ampuhan');
		$this->db->join('jadwal', 'jadwal.kode_guru = ampuhan.kode_guru');
		$this->db->join('matapelajaran', 'matapelajaran.id_pelajaran = ampuhan.id_pelajaran');
		$this->db->where('ampuhan.nip',$data);
		$query=$this->db->get();
		return $query->result();
	}
	function getNamaMapel($data){
		$this->db->flush_cache();
		$this->db->from('ampuhan');
		$this->db->join('matapelajaran', 'matapelajaran.id_pelajaran = ampuhan.id_pelajaran');
		$this->db->where('kode_guru',$data);
		$query=$this->db->get();
		return $query->row();
	}
	function getIDMapel($kodeguru){
		$this->db->flush_cache();
		$this->db->select('id_pelajaran');
		$this->db->from('ampuhan');
		$this->db->where('kode_guru',$kodeguru);
		$query=$this->db->get();
		return $query->row();
	}
	function getNIPGuru($kodeguru){
		$this->db->flush_cache();
		$this->db->select('nip');
		$this->db->from('ampuhan');
		$this->db->where('kode_guru',$kodeguru);
		$query=$this->db->get();
		return $query->row();
	}
	function tambahAmpuhan($data){
		//cleaning query from XSS
		$data = $this->security->xss_clean($data);
		$data = $this->db->escape_str($data);
		$this->db->flush_cache();
		if(!$this->db->insert('ampuhan',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	function deleteAmpuhan($kode){
		$this->db->flush_cache();
		$this->db->where('kode_guru',$kode);
		$this->db->delete('ampuhan');
	}
	function getAllKodeGuru(){
		$this->db->flush_cache();
		$this->db->from('ampuhan');
		$query=$this->db->get();
		return $query->result();
		
	}
	function getAmpuhanGuru($nip){
		//cleaning query from XSS
		$nip = $this->security->xss_clean($nip);
		$nip = $this->db->escape_str($nip);
		$this->db->flush_cache();
		$this->db->from('ampuhan');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=ampuhan.id_pelajaran');
		$this->db->where('ampuhan.nip',$nip);
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
}