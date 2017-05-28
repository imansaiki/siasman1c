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
	function cekKelasDepan($nis,$tahun){
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->where('nis',$nis);
		$this->db->where('tahun_ajaran',$tahun);
		//execute query
		$query = $this->db->get();
		return $query->row();
	}
	function getDaftarSiswa($kelas,$thajar){
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->join('siswa', 'siswa.nis = kelas.nis');
		$this->db->join('daftarkelas', 'daftarkelas.nama_kelas = kelas.nama_kelas');
		$this->db->where('kelas.nama_kelas',$kelas);
		$this->db->where('kelas.tahun_ajaran',$thajar);
		//execute query
		$query = $this->db->get();
		return $query->result();
	}
	function getKelasSiswa($nis,$thnajar){
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->where('nis',$nis);
		$this->db->where('tahun_ajaran',$thnajar);
		$query=$this->db->get();
		return $query->row();
	}
	function isikelas($kelas,$thajar){
		$this->db->flush_cache();
		$this->db->from('kelas');
		$this->db->join('siswa','siswa.nis=kelas.nis');
		$this->db->where('kelas.nama_kelas',$kelas);
		$this->db->where('kelas.tahun_ajaran',$thajar);
		$this->db->where('siswa.kelamin','pria');
		$pria=$this->db->count_all_results();
		
		$this->db->from('kelas');
		$this->db->join('siswa','siswa.nis=kelas.nis');
		$this->db->where('kelas.nama_kelas',$kelas);
		$this->db->where('kelas.tahun_ajaran',$thajar);
		$this->db->where('siswa.kelamin','wanita');
		$wanita=$this->db->count_all_results();
		
		$data=array(
				'pria'=>$pria,
				'wanita'=>$wanita
		);
		return $data;
	}
	function getKelasCek($tahun){
		$this->db->flush_cache();
		$this->db->where('tahun_ajaran',$tahun);
		$num1 = $this->db->count_all_results('kelas');
		$this->db->flush_cache();
		$this->db->where('tahun_ajaran',$tahun+1);
		$num2 = $this->db->count_all_results('kelas');
		
		$num=$num1-$num2;
		return $num;
		
		
	}

}