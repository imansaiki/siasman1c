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
		switch ($this->session->userdata('level')){
			case 'siswa':
				redirect(base_url('nilai'));
				break;
			case 'admin':
				if (empty($this->uri->segment('3'))){
					$this->load->model('kelasM');
					$data['daftar_ampuhan']=$this->kelasM->getDaftarKelas();
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
				$this->load->model('AmpuhanM');
				$data['daftar_ampuhan']=$this->AmpuhanM->getKelasAmpuhan($this->session->userdata('id'));
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
						
						$this->load->model('kelasM');
						$mapel=$this->ampuhanM->getNamaMapel($kodeguru);
						$data['nilai_kelas']=$this->nilaiM->getNilaiKelas($mapel,$kelas,$this->SemTA);
						if (empty($nilaikelas)){
							$daftarsiswa=$this->kelasM->getDaftarSiswa($kelas,$this->semTA->tahun_ajar);
							
							foreach ($daftarsiswa as $row){
								$array[]= array(
										'nis'=>$row->nis,
										'nama_kelas'=>$row->nama_kelas,
										'tahun_ajaran'=>$this->semTA->tahun_ajar,
										'semester'=>$this->semTA->semester,
										'nama_pelajaran'=>$mapel
								);
							}
							$this->nilaiM->tambahNilai($array);
						}
						$this->load->view('head');
						$this->load->viev('FormTambahNilai',$data);
						$this->load->view('foot');
					}else {
						echo 'nay';
						//redirect(base_url('nilai'));
					}
				}
				break;
		}
	}
}