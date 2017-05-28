<?php
class Kelas extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id'))
		{
			redirect(base_url());
		}
		$this->load->model('siswaM');
		$this->load->model('kelasM');
		$this->load->model('nilaiM');
		$this->load->model('daftarkelasM');
		$this->load->model('tahunajaranM');
		$this->semTA=$this->tahunajaranM->getSemTA();
	}
	function index(){
		$this->load->view('head');
		$this->load->model('nilaiM');
		$data=$this->nilaiM->getNilaiCek($this->semTA->semester,$this->semTA->tahun_ajar);
	echo $data;
		$this->load->view('foot');
	}
	
	function naikKelas(){
		$status=$this->uri->segment(3);
		$kelas=$this->uri->segment(4);
		$data['daftar_kelas']=$this->daftarkelasM->getDaftarKelas();
		if (empty($status)||empty($kelas)){
			$this->load->view('head');
			$this->load->view('DaftarKelasNaik',$data);
			$this->load->view('foot');
		}else {
			$detail=$this->daftarkelasM->getDetailKelas($kelas);
			$tingkat=$detail->tingkat;
			$jurusan=$detail->jurusan;
			$satu['IPA']='';
			$dua['IPA']='';
			$tiga['IPA']='';
			$satu['IPS']='';
			$dua['IPS']='';
			$tiga['IPS']='';
			$satu['BHS']='';
			$dua['BHS']='';
			$tiga['BHS']='';
			foreach ($data['daftar_kelas']['satu'] as $row){
				switch ($row->jurusan){
					case 'IPA' :
						$satu['IPA'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'IPS' :
						$satu['IPS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'BHS' :
						$satu['BHS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
				}
			}
			foreach ($data['daftar_kelas']['dua'] as $row){
			switch ($row->jurusan){
					case 'IPA' :
						$dua['IPA'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'IPS' :
						$dua['IPS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'BHS' :
						$dua['BHS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
				}
			}
			foreach ($data['daftar_kelas']['tiga'] as $row){
			switch ($row->jurusan){
					case 'IPA' :
						$tiga['IPA'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'IPS' :
						$tiga['IPS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
					case 'BHS' :
						$tiga['BHS'].='<option data-jurusan="'.$row->jurusan.'" data-tingkat="'.$row->tingkat.'" data-kelas="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
						break;
				}
			}
			switch ($status){
				case 'l':
					$thn=$this->semTA->tahun_ajar;
					$data['daftar_siswa']=$this->kelasM->getDaftarSiswa($kelas,$thn);
					$data['kelas']=$kelas;
					switch ($tingkat){
						case '1':
							$data['tinggal']=$satu[$jurusan];
							$data['naik']=$dua[$jurusan];
							break;
						case '2':
							$data['tinggal']=$dua[$jurusan];
							$data['naik']=$tiga[$jurusan];
							break;
						case '3':
							$data['tinggal']=$tiga[$jurusan];
							$data['naik']='<option data-tingkat="lulus" data-kelas="lulus"> lulus </option>';
							break;
					}
					$this->load->view('head');
					$this->load->view('DaftarSiswaNaik',$data);
					$this->load->view('foot');
					break;
				case 'b':
					$thn=$this->semTA->tahun_ajar;
					$tha=intval(substr($thn, 0,4))+1;
					$thk=intval(substr($thn, 4,4))+1;
					$thn=$tha.$thk;
					$data['tahun']=$tha.'/'.$thk;
					$data['daftar_siswa']=$this->kelasM->getDaftarSiswa($kelas,$thn);
					$data['kelas']=$kelas;
					$this->load->view('head');
					$this->load->view('DaftarSiswa',$data);
					$this->load->view('foot');
					break;
			}
		}
	}
	function siswaNaikKelas(){
		$kelas=$this->input->post('kelas');
		$jurusan=$this->input->post('jurusan');
		$nis=$this->input->post('nis');
		$tingkat=$this->input->post('tingkat');
		$semester='1';
		$thn=$this->semTA->tahun_ajar;
		$tha=intval(substr($thn, 0,4))+1;
		$thk=intval(substr($thn, 4,4))+1;
		$thn=$tha.$thk;
		$data_kelas= array(
						'nis'=>$nis,
						'nama_kelas'=>$kelas,
						'tahun_ajaran'=>$thn
				);
		$this->kelasM->tambahSiswaKelas($data_kelas);
		$this->nilaiM->resetNilai($nis,$thn);
		$this->nilaiM->nilaiPaket($nis,$tingkat,$jurusan,$semester,$thn);
		echo $kelas;
		
	}
	function cekKelasDepan(){
		$nis=$this->input->post('nis');
		$thn=$this->semTA->tahun_ajar;
		$tha=intval(substr($thn, 0,4))+1;
		$thk=intval(substr($thn, 4,4))+1;
		$thn=$tha.$thk;
		$kelas=$this->kelasM->cekKelasDepan($nis,$thn);
		if (!empty($kelas)){
			echo $kelas->nama_kelas;
		}
	}
	function getisikelas(){
		$kelas=$this->input->post('id');
		$data=$this->kelasM->isikelas($kelas,$this->semTA->tahun_ajar);
		$data=array('jumlah'=>$data['pria']+$data['wanita'],'pria'=>$data['pria'],'wanita'=>$data['wanita']);
		$data=json_encode($data);
		echo $data;
	}
}
