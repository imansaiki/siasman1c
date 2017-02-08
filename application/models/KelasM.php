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
}