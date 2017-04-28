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
	function getNilaiKelas($mapel,$kelas,$semester,$thajar){
		$this->db->flush_cache();
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.nis=nilai.nis');
		$this->db->join('kelas','kelas.nis=nilai.nis');
		$this->db->where('nilai.id_pelajaran',$mapel);
		$this->db->where('kelas.nama_kelas',$kelas);
		$this->db->where('nilai.tahun_ajaran',$thajar);
		$this->db->where('nilai.semester',$semester);
		$query=$this->db->get();
		return $query->result();
	}
	function getNilaiSiswa($nis){
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','1');
		$this->db->where('nilai.semester','1');
		$X_1=$this->db->get();
		$X_1=$X_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','1');
		$this->db->where('nilai.semester','2');
		$X_2=$this->db->get();
		$X_2=$X_2->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','2');
		$this->db->where('nilai.semester','1');
		$XI_1=$this->db->get();
		$XI_1=$XI_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','2');
		$this->db->where('nilai.semester','2');
		$XI_2=$this->db->get();
		$XI_2=$XI_2->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','3');
		$this->db->where('nilai.semester','1');
		$XII_1=$this->db->get();
		$XII_1=$XII_1->result();
		$this->db->flush_cache();
		
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=nilai.id_pelajaran');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tingkat','3');
		$this->db->where('nilai.semester','2');
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
			$this->db->flush_cache();
			$this->db->replace('nilai',$row);
			$query=$this->db->error();
			$query[]=$query['code'];
		}
		return $query;
	}
	function evalNilai($nis,$thajar){
		$this->db->start_cache();
		$this->db->from('nilai');
		$this->db->where('nilai.nis',$nis);
		$this->db->where('nilai.tahun_ajaran',$thajar);
		$X_1=$this->db->get();
		$X_1=$X_1->result();
		$this->db->flush_cache();
		$i=0;
		foreach ($X_1 as $row){
			$akhir=($row->harian * 20/100)+($row->uts * 40/100)+($row->uas * 40/100);
			if ($akhir<75){
				$i++;
			}
		}
		return $i;
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