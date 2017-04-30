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
		if (empty($this->input->post('submit'))){
			if (empty($this->uri->segment('3'))){
				$data=$this->daftarkelasM->getDaftarKelas();
				$this->load->view('head');
				$this->load->view('foot');
			}else {
				$kelas=$this->uri->segment('3');
				$data=$this->daftarkelasM->getDaftarKelas();
				$daftar=$this->kelasM->getDaftarSiswa($kelas,$this->semTA->tahun_ajar);
				$data['detail_kelas']=$this->daftarkelasM->getDetailKelas($kelas);
				$this->load->model('nilaiM');
				foreach ($daftar as $row){
					$count=$this->nilaiM->evalNilai($row->nis,$this->semTA->tahun_ajar);
					$send[]=array(
							'nis'=>$row->nis,
							'nama'=>$row->nama,
							'eval'=>$count
					);
				}
				$data['daftar_siswa']=$send;
				$this->load->view('head');
				$this->load->view('DaftarSiswaNaik',$data);
				$this->load->view('foot');
				
			}
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