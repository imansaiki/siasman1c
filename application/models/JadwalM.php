<?php
class jadwalM extends CI_Model{
	function updateJadwal($jam,$hari,$kelas,$kode){
		$this->db->flush_cache();
		$data = array(
				'jam' => $jam,
				'hari'  => $hari,
				'nama_kelas'  => $kelas,
				'kode_guru'  => $kode
		);
		$this->db->replace('jadwal',$data);
		return 0;
	}
	function refreshJadwal(){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$query=$this->db->get();
		return $query->result();
	}
	function deleteJadwal($kelas,$hari,$jam){
		$this->db->flush_cache();
		$this->db->where('nama_kelas',$kelas);
		$this->db->where('hari',$hari);
		$this->db->where('jam',$jam);
		$this->db->delete('jadwal');
		
	}
	function getJadwalKelas($kelas){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->where('nama_kelas',$kelas);
		$query=$this->db->get();
		return $query->result();
	}
	function countJadwalKelas($kelas,$id){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->join('ampuhan','ampuhan.kode_guru=jadwal.kode_guru');
		$this->db->join('matapelajaran','matapelajaran.id_pelajaran=ampuhan.id_pelajaran');
		$this->db->where('jadwal.nama_kelas',$kelas);
		$this->db->where('matapelajaran.id_pelajaran',$id);
		$query=$this->db->get();
		$num = $query->num_rows();
		return $num;
	}
	function countJadwalPaket($id){
		$this->db->flush_cache();
		$this->db->from('paket');
		$this->db->where('id_pelajaran',$id);
		$query=$this->db->get();
		$num = $query->row();
		return $num->kum_jam;
	}
	function getJadwalGuru($nip){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->join('ampuhan','ampuhan.kode_guru=jadwal.kode_guru');
		$this->db->where('ampuhan.nip',$nip);
		$query=$this->db->get();
		return $query->result();
	}
	function cekJadwalGuru($nip,$hari,$jam){
		$this->db->flush_cache();
		$this->db->from('jadwal');
		$this->db->join('ampuhan','ampuhan.kode_guru=jadwal.kode_guru');
		$this->db->where('ampuhan.nip',$nip);
		$this->db->where('jadwal.jam',$jam);
		$this->db->where('jadwal.hari',$hari);
		$query=$this->db->get();
		return $query->result();
	}
}