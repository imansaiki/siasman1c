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
	function paket(){
		if (!empty($this->input->post('submit')) && $this->session->userdata('level')=='admin'){
			$config = array(
					array(
							'field' => 'mapel',
							'label' => 'Mata Pelajaran',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'kum',
							'label' => 'Total Jam',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
						
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <b>Terjadi Kesalahan :</b>'.validation_errors().'</div>');
				redirect(current_url());
			}else{
				$data_paket= array(
						'id_pelajaran'=>$this->input->post('mapel'),
						'jurusan'=>$this->input->post('jurusan'),
						'kum_jam'=>$this->input->post('kum'),
						'tingkat'=>$this->input->post('tingkat'),
		
				);
				$this->load->model('paketM');
				$result=$this->paketM->tambahPaket($data_paket);
				if($result=='0'){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Telah diedit </div>');
					redirect(base_url('jadwal/paket'));
					break;
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, Kode : <strong>'.$result.'</strong></div>');
					redirect(current_url());
					break;
				}
			}
		}else{
			if ($this->session->userdata('level')!='admin'){
				redirect(base_url());
			}
			$this->load->model('paketM');
			$data=$this->paketM->getDaftarPaket();
			$this->load->model('matapelajaranM');
			$data['daftar_mapel']=$this->matapelajaranM->getDaftarMapel();
			$this->load->view('head');
			$this->load->view('FormPaket',$data);
			$this->load->view('foot');
		}
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
	
	function tahunAjaran(){
		if (!empty($this->input->post('submit'))){
			$thn=$this->input->post('thnajar');
			$semester=$this->input->post('semester');
			$this->load->model('nilaiM');
			$nilai=$this->nilaiM->getNilaiCek($semester,$thn);
			$depan=$this->kelasM->getkelasCek($thn);
			switch ($semester){
				case '1':
					if ($nilai!=0){
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Terdapat nilai yang masih kosong, <strong> Total : '.$nilai.'</strong></div>');
						redirect(base_url('jadwal/tahunajaran'));
					}
					$semester=$semester+1;
					$this->tahunajaranM->updateSemester('1',$semester,$thn);
					redirect(base_url('jadwal/tahunajaran'));
					break;
				case '2':
					if (($depan!=0) || ($nilai!=0)){
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <div>Terdapat nilai yang masih kosong, <strong> Total : '.$nilai.'</strong></div>
														<div>Terdapat siswa yang belum dinaikan, <strong> Total : '.$depan.'</strong></div></div>');
						redirect(base_url('jadwal/tahunajaran'));
					}
					$tha=intval(substr($thn, 0,4))+1;
					$thk=intval(substr($thn, 4,4))+1;
					$thn=$tha.$thk;
					$semester=1;
					$this->tahunajaranM->updateSemester(1,$semester,$thn);
					redirect(base_url('jadwal/tahunajaran'));
					break;
			}
		}
		$data=$this->semTA;
		$this->load->view('head');
		$this->load->view('TahunAjaran',$data);
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
	function deletePaket(){
		$tingkat=$this->input->post('tingkat');
		$mapel=$this->input->post('mapel');
		$jurusan=$this->input->post('jurusan');
		$this->load->model('paketM');
		$this->paketM->deletePaket($tingkat,$jurusan,$mapel);
		$return = '<div class="alert alert-success" role="alert">Mata Pelajaran'.$mapel.' Berhasil Dihapus dari'.$jurusan.' tingkat'.$tingkat.'</div>';
		echo $return;
	
	}
}