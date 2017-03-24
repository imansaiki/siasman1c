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
	function getNilaiKelas($mapel,$tingkat,$semester,$thajar){
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.nis=nilai.nis');
		$this->db->where('id_pelajaran',$mapel);
		$this->db->where('tingkat',$tingkat);
		$this->db->where('tahun_ajaran',$thajar);
		$this->db->where('semester',$semester);
		$query=$this->db->get();
		return $query->result();
	}
	function getNilaiSiswa($nis){
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','1');
		$this->db->where('semester','1');
		$X_1=$this->db->get();
		$X_1=$X_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','1');
		$this->db->where('semester','2');
		$X_2=$this->db->get();
		$X_2=$X_2->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','2');
		$this->db->where('semester','1');
		$XI_1=$this->db->get();
		$XI_1=$XI_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','2');
		$this->db->where('semester','2');
		$XI_2=$this->db->get();
		$XI_2=$XI_2->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','3');
		$this->db->where('semester','1');
		$XII_1=$this->db->get();
		$XII_1=$XII_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nis',$nis);
		$this->db->where('tingkat','3');
		$this->db->where('semester','2');
		$XII_2=$this->db->get();
		$XII_2=$XII_2->result();
		$this->db->flush_cache();
		
		$data= array(
				'X_1'=>$X_1,
				'X_2'=>$X_2,
				'XI_1'=>$XI_1,
				'XI_2'=>$XI_2,
				'XII_1'=>$XII_1,
				'XII_2'=>$XII_2,
		);
		
		return $data;
	}
	function updateNilai($data){
		foreach ($data as $row){
			$this->db->replace('nilai',$row);
		}
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
}