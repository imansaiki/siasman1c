<?php
class nilaiM extends CI_Model{
	function tambahNilai($data){
	if(!$this->db->insert_batch('nilai',$data)){
			$query=$this->db->error();
			return $query['code'];
		}else {
			$query='0';
			return $query;
		}
	}
	function getNilaiKelas($mapel,$kelas,$thajar,$semester){
		$this->db->from('nilai');
		$this->db->where('nama_pelajaran',$mapel);
		$this->db->where('nama_kelas',$kelas);
		$this->db->where('tahun_ajaran',$thajar);
		$this->db->where('semester',$semester);
		$query=$this->db->get();
		return $query->result();
	}
	function nilaiPaket($nis,$tingkat,$jurusan,$semester,$tahun){
		switch ($semester){
			case '1':
				$this->db->start_cache();
				$this->db->from('paket');
				$this->db->where('tingkat',$tingkat);
				$this->db->where('jurusan',$jurusan);
				$query=$this->db->get();
				$this->db->stop_cache();
				$query=$query->result();
				foreach ($query as $row){
					$paket[]=array(
							'nis'=>$nis,
							'tingkat'=>$tingkat,
							'semester'=>'1',
							'tahun_ajaran'=>$tahun,
							'id_pelajaran'=>$row->id_pelajaran,
					);
					$paket[]=array(
							'nis'=>$nis,
							'tingkat'=>$tingkat,
							'semester'=>'2',
							'tahun_ajaran'=>$tahun,
							'id_pelajaran'=>$row->id_pelajaran,
					);
				}
				$this->db->flush_cache();
				$this->db->insert_batch('nilai',$paket);
				break;
			case '2':
				$this->db->start_cache();
				$this->db->from('paket');
				$this->db->where('tingkat',$tingkat);
				$this->db->where('jurusan',$jurusan);
				$query=$this->db->get();
				$this->db->stop_cache();
				$test=$query->result();
				foreach ($test as $row){
					$paket[]=array(
							'nis'=>$nis,
							'tingkat'=>$tingkat,
							'semester'=>'2',
							'id_pelajaran'=>$row->id_pelajaran,
					);
				}
				$this->db->flush_cache();
				$this->db->insert_batch('nilai',$paket);
				break;
		}
	}
	function nilaiPaket1($nis,$tingkat,$jurusan,$semester,$tahun){
		$paket1=array(
				'nis'=>$nis,
				'tingkat'=>$tingkat,
				'semester'=>'2',
				'id_pelajaran'=>'0102',
		);
		$this->db->insert('nilai',$paket1);
	}
}