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
				case 'admin':
					if (empty($this->uri->segment('3'))){
						$data=$this->daftarkelasM->getDaftarKelas();
						$this->load->view('head');
						$this->load->view('DaftarKelasSiswa',$data);
						$this->load->view('foot');
					}else {
						$nis=$this->uri->segment('3');
						$data=$this->nilaiM->getNilaiSiswa($nis);
						if (empty($data)){
							redirect(base_url('nilai/tambahnilai'));
						}else {
							$this->load->view('head');
							$this->load->view('FormTambahNilaiSiswa',$data);
							$this->load->view('foot');
						}
					}
					break;
				case 'guru':
					$this->load->model('ampuhanM');
					$data['daftar_ampuhan']=$this->ampuhanM->getKelasAmpuhan($this->session->userdata('id'));
					if (empty($this->uri->segment('3'))){
						$this->load->view('head');
						$this->load->view('DaftarKelasAmpuhan',$data);
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
							$data['nilai_kelas']=$this->nilaiM->getNilaiKelas($mapel->id_pelajaran,$kelas,$this->semTA->semester,$this->semTA->tahun_ajar);
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
			$nis=$this->input->post('nis');
			$idpelajaran=$this->input->post('idpelajaran');
			$tingkat=$this->input->post('tingkat');
			$semester=$this->input->post('semester');
			$tahunajaran=$this->input->post('tahunajaran');
			$harian=$this->input->post('harian');
			$uts=$this->input->post('uts');
			$uas=$this->input->post('uas');
			$uri3=$this->input->post('uri3');
			$uri4=$this->input->post('uri4');
			
			foreach ($nis as $key=> $n){
				if ($harian[$key]>100 or $uts[$key]>100 or $uas[$key]>100){
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, nilai tidak boleh lebih dari 100</div>');
					redirect(base_url('nilai/tambahnilai/'.$uri3.'/'.$uri4));
					break;
				}elseif ($harian[$key]<0 or $uts[$key]<0 or $uas[$key]<0){
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, nilai tidak boleh lebih dari 100</div>');
					redirect(base_url('nilai/tambahnilai/'.$uri3.'/'.$uri4));
					break;
				}elseif ($harian[$key]==null or $uts[$key]==null or $uas[$key]==null){
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, nilai tidak boleh kosong</div>');
					redirect(base_url('nilai/tambahnilai/'.$uri3.'/'.$uri4));
					break;
				}
				$data[] = array(
						'nis' => $n,
						'id_pelajaran'  => $idpelajaran[$key],
						'tingkat'  => $tingkat[$key],
						'semester' => $semester[$key],
						'tahun_ajaran'  => $tahunajaran[$key],
						'harian'  => $harian[$key],
						'uts' => $uts[$key],
						'uas'  => $uas[$key]
				);
			};
			echo $uri3.$uri4;
				$error=$this->nilaiM->updateNilai($data);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><b>Berhasil</b>, nilai telah diubah </div>');
				redirect(base_url('nilai/tambahnilai/'.$uri3.'/'.$uri4));
			
			
		}
	}
	function lihatnilai(){
		switch ($this->session->userdata('level')){
			case 'guru':
				if (empty($this->uri->segment('3'))){
					redirect(base_url('siswa/daftarsiswa'));
				}else {
					$nis=$this->uri->segment('3');
					$data=$this->nilaiM->getNilaiSiswa($nis);
					if (empty($data)){
						redirect(base_url('siswa/daftarsiswa'));
					}else {
						$data['nis']=$nis;
						$this->load->view('head');
						$this->load->view('NilaiSiswa',$data);
						$this->load->view('foot');
					}
				}
				break;
			case 'admin':
			if (empty($this->uri->segment('3'))){
					redirect(base_url('siswa/daftarsiswa'));
				}else {
					$nis=$this->uri->segment('3');
					$data=$this->nilaiM->getNilaiSiswa($nis);
					if (empty($data)){
						redirect(base_url('siswa/daftarsiswa'));
					}else {
						$data['nis']=$nis;
						$this->load->view('head');
						$this->load->view('NilaiSiswa',$data);
						$this->load->view('foot');
					}
				}
				break;
			case 'siswa':
				$nis=$this->session->userdata('id');
				$data=$this->nilaiM->getNilaiSiswa($nis);
				$data['nis']=$nis;
				$this->load->view('head');
				$this->load->view('NilaiSiswa',$data);
				$this->load->view('foot');
		}
	}
}