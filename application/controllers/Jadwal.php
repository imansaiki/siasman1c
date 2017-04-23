<?php
class Jadwal extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id'))
		{
			redirect(base_url());
		}
		$this->load->model('ampuhanM');
		$this->load->model('jadwalM');
		$this->load->model('kelasM');
		$this->load->model('daftarkelasM');
		$this->load->model('tahunajaranM');
		$this->semTA=$this->tahunajaranM->getSemTA();
	}
	function index(){
		$this->load->view('head');
		$this->load->view('foot');
	}
	function lihatJadwal(){
		switch ($this->session->userdata('level')){
			case 'siswa' :
				$data['kelas']=$this->kelasM->getKelasSiswa($this->session->userdata('id'),$this->semTA->tahun_ajar);
				$data['hari']=array('Senin','Selasa','Rabu','Kamis','Jumat');
				$this->load->view('head');
				$this->load->view('JadwalKelas',$data);
				$this->load->view('foot');
				break;
			case 'guru' :
				$data['nip']=$this->session->userdata('id');
				$data['hari']=array('Senin','Selasa','Rabu','Kamis','Jumat');
				$this->load->view('head');
				$this->load->view('JadwalGuru',$data);
				$this->load->view('foot');
				break;
			case 'admin' :
				$data=$this->daftarkelasM->getDaftarKelas();
				$data['daftar_hari']=array('Senin','Selasa','Rabu','Kamis','Jumat');
				$this->load->view('head');
				$this->load->view('JadwalAdmin',$data);
				$this->load->view('foot');
				break;
		}
	}
	function editJadwal(){
		
		$data=$this->daftarkelasM->getDaftarKelas();
		$data['kode_guru']=$this->ampuhanM->getAllKodeGuru();
		$data['daftar_hari']=array('Senin','Selasa','Rabu','Kamis','Jumat');
		$this->load->view('head');
		$this->load->view('EditJadwal',$data);
		$this->load->view('foot');
	}
	function updateJadwal(){
		$jam=$this->input->post('jam');
		$kelas=$this->input->post('kelas');
		$kode=$this->input->post('kode');
		$hari=$this->input->post('hari');
		$result=$this->jadwalM->updateJadwal($jam,$hari,$kelas,$kode);
		
		echo $result;
	}
	function refreshJadwal(){
		$data=$this->jadwalM->refreshJadwal();
		$data=json_encode($data);
		echo $data;
	}
	function getJadwalKelas($kelas){
		$data=$this->jadwalM->getJadwalKelas($kelas);
		$data=json_encode($data);
		echo $data;
	}
	function getJadwalGuru($nip){
		$data=$this->jadwalM->getJadwalGuru($nip);
		$data=json_encode($data);
		echo $data;
	}
}