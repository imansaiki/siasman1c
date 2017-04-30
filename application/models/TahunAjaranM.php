<?php
class TahunAjaranM extends CI_Model{
	function getSemTA(){
		$this->db->flush_cache();
		$this->db->from('tahunAjaran');
		$query=$this->db->get();
		return $query->row();
	}
	function updateSemester($id,$semester,$tahun){
		$this->db->flush_cache();
		$data=array (
				'semester'=>$semester,
				'tahun_ajar'=>$tahun
		);
		$this->db->where('id',$id);
		//execute query
		$query = $this->db->update('tahunajaran',$data);
	}
}