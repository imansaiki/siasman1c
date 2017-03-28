<?php
class DaftarKelasM extends CI_Model{
	function getDaftarKelas(){
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->from('daftarkelas');
		$this->db->where('tingkat','1');
		$query=$this->db->get();
		$satu=$query->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('daftarkelas');
		$this->db->where('tingkat','2');
		$query=$this->db->get();
		$dua=$query->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('daftarkelas');
		$this->db->where('tingkat','3');
		$query=$this->db->get();
		$tiga=$query->result();
		$this->db->flush_cache();
		
		$data= array(
				'satu'=>$satu,
				'dua'=>$dua,
				'tiga'=>$tiga,
		);
		return $data;
	}
	function getDetailKelas($kelas){
		$this->db->flush_cache();
		$this->db->from('daftarkelas');
		$this->db->where('daftarkelas.nama_kelas',$kelas);
		$query=$this->db->get();
		return $query->row();
		
	}
}