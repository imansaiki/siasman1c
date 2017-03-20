<?php
class Nilai extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id'))
		{
			redirect(base_url());
		}
		$this->load->model('jadwalM');
		$this->load->model('nilaiM');
		$this->load->model('tahunajaranM');
		$this->semTA=$this->tahunajaranM->getSemTA();
		
	}
	function index(){
		$this->load->view('head');
		$this->load->view('NilaiMain');
		$this->load->view('foot');
	}
	function tambahNilai(){
		if (empty($this->input->post('submit'))){
			$this->load->model('daftarkelasM');
			switch ($this->session->userdata('level')){
				case 'siswa':
					redirect(base_url('nilai'));
					break;
				case 'admin':
					if (empty($this->uri->segment('3'))){
						$data['daftar_ampuhan']=$this->daftarkelasM->getDaftarKelas();
						$this->load->view('head');
						$this->load->view('foot');
					}else {
						$kelas=$this->uri->segment('3');
						$this->load->model('siswaM');
						$data['daftar_siswa']=$this->siswaM->getDaftarSiswa($kelas);
						$this->load->view('head');
						$this->load->view('foot');
					}
					break;
				case 'guru':
					$this->load->model('ampuhanM');
					$data['daftar_ampuhan']=$this->ampuhanM->getKelasAmpuhan($this->session->userdata('id'));
					if (empty($this->uri->segment('3'))){
						$this->load->view('head');
						foreach ($data['daftar_ampuhan'] as $row){
							echo $row->nama_kelas;
							//echo $row->kode_guru;
							echo '<br>';
								
						}
						$this->load->view('foot');
					}else {
						$kelas=$this->uri->segment('3');
						$kodeguru=$this->uri->segment('4');
						$ampuh=0;
						foreach ($data['daftar_ampuhan'] as $row){
							if ($kelas == $row->nama_kelas && $kodeguru == $row->kode_guru ){
								$ampuh=1;
								break;
							}
						}
						if ($ampuh==1){
			
							$mapel=$this->ampuhanM->getIDMapel($kodeguru);
							$tingkat=$this->daftarkelasM->getDetailKelas($kelas);
							$data['nilai_kelas']=$this->nilaiM->getNilaiKelas($mapel->id_pelajaran,$tingkat->tingkat,$this->semTA->semester,$this->semTA->tahun_ajar);
							$this->load->view('head');
							$this->load->view('FormTambahNilai',$data);
							$this->load->view('foot');
						}else {
							redirect(base_url('nilai'));
						}
					}
					break;
			}
				
		}else{
			
		}
	}
}