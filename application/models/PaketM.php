<?php
class PaketM extends CI_Model {
	function getDaftarPaket(){
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','1');
		$this->db->where('paket.jurusan','IPA');
		$query=$this->db->get();
		$X_IPA=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','1');
		$this->db->where('paket.jurusan','IPS');
		$query=$this->db->get();
		$X_IPS=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','1');
		$this->db->where('paket.jurusan','BHS');
		$query=$this->db->get();
		$X_BHS=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','2');
		$this->db->where('paket.jurusan','IPA');
		$query=$this->db->get();
		$XI_IPA=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','2');
		$this->db->where('paket.jurusan','IPS');
		$query=$this->db->get();
		$XI_IPS=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','2');
		$this->db->where('paket.jurusan','BHS');
		$query=$this->db->get();
		$XI_BHS=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','3');
		$this->db->where('paket.jurusan','IPA');
		$query=$this->db->get();
		$XII_IPA=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','3');
		$this->db->where('paket.jurusan','IPS');
		$query=$this->db->get();
		$XII_IPS=$query->result();
		
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=paket.id_pelajaran');
		$this->db->where('paket.tingkat','3');
		$this->db->where('paket.jurusan','BHS');
		$query=$this->db->get();
		$XII_BHS=$query->result();
		$data= array(
				'X_IPA'=>$X_IPA,
				'X_IPS'=>$X_IPS,
				'X_BHS'=>$X_BHS,
				'XI_IPA'=>$XI_IPA,
				'XI_IPS'=>$XI_IPS,
				'XI_BHS'=>$XI_BHS,
				'XII_IPA'=>$XII_IPA,
				'XII_IPS'=>$XII_IPS,
				'XII_BHS'=>$XII_BHS,
		);
		return $data;
	}
	function tambahPaket($data){
		$data=$this->security->xss_clean($data);
		$data=$this->db->escape_str($data);
		$this->db->flush_cache();
		if(!$this->db->replace('paket',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
		
	}
	function deletePaket($tingkat,$jurusan,$mapel){
		$this->db->flush_cache();
		$this->db->where('tingkat',$tingkat);
		$this->db->where('id_pelajaran',$mapel);
		$this->db->where('jurusan',$jurusan);
		$this->db->delete('paket');
	}
}