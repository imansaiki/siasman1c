<?php
class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id'))
		{
			redirect(base_url());
		}
		$this->load->model('jadwalM');
		$this->load->model('siswaM');
	}
	function index(){
		$this->load->view('head');
		$this->load->view('SiswaMain');
		$this->load->view('foot');
	}
	function tambahSiswa(){
		if ($this->session->userdata('level')!='admin'){
			redirect(base_url('siswa'));
		}
		
		if(!empty($this->input->post('submit'))){
			$config = array(
					array(
							'field' => 'nis',
							'label' => 'nis',
							'rules' => 'required',
							'errors' => array(
									'required' => '%s tidak boleh kosong',),
								
					),
					array(
							'field' => 'nama',
							'label' => 'nama',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'tmptlahir',
							'label' => 'Tempat Lahir',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'kelas',
							'label' => 'kelas',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'tgllahir',
							'label' => 'Tanggal Lahir',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'jkelamin',
							'label' => 'Jenis Kelamin',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'alamat',
							'label' => 'Alamat',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'nayah',
							'label' => 'Nama Ayah',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'nibu',
							'label' => 'Nama Ibu',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'pdayah',
							'label' => 'Pendidikan Ayah',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'pdibu',
							'label' => 'Pendidikan Ibu',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'pkayah',
							'label' => 'Pekerjaan Ayah',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'pkibu',
							'label' => 'Pekerjaan Ibu',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'asekolah',
							'label' => 'Asal Sekolah',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'thnmasuk',
							'label' => 'Tahun Masuk',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'kwnegara',
							'label' => 'Kewarganegaraan',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
				redirect(base_url('siswa/tambahsiswa'));
			}else{
				$nis=$this->input->post('nis');
				$semta=$this->jadwalM->getSemTA();
				$thn_masuk=substr($semta->tahun_ajar,0,4);
				$data_siswa= array(
						'nis'=>$nis,
						'nama'=>$this->input->post('nama'),
						'tempat_lahir'=>$this->input->post('tmptlahir'),
						'tanggal_lahir'=>$this->input->post('tgllahir'),
						'kelamin'=>$this->input->post('jkelamin'),
						'alamat'=>$this->input->post('alamat'),
						'agama'=>$this->input->post('agama'),
						'nama_ayah'=>$this->input->post('nayah'),
						'nama_ibu'=>$this->input->post('nibu'),
						'pendidikan_ayah'=>$this->input->post('pdayah'),
						'pendidikan_ibu'=>$this->input->post('pdibu'),
						'pekerjaan_ayah'=>$this->input->post('pkayah'),
						'pekerjaan_ibu'=>$this->input->post('pkibu'),
						'asal_sekolah'=>$this->input->post('asekolah'),
						'tahun_masuk'=>$thn_masuk,
						'kewarganegaraan'=>$this->input->post('kwnegara'),
						'update_by'=>$this->session->userdata('id')
				);
				$data_akun= array(
						'id'=>$nis,
						'password'=>$nis,
						'level'=>'siswa',
				);
				$data_kelas= array(
						'id_kelas'=>$nis.$semta->tahun_ajar,
						'nis'=>$nis,
						'nama_kelas'=>$this->input->post('kelas'),
						'tahun_ajaran'=>$semta->tahun_ajar,
				);
			}
			
			$result=$this->siswaM->tambahSiswa($data_siswa);
			if($result=='0'){
				$this->load->model('AkunM');
				$this->load->model('KelasM');
				$this->AkunM->tambahAkun($data_akun);
				$this->KelasM->tambahSiswaKelas($data_kelas);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$nis.' Telah ditambahkan </div>');
				$nis=$nis+1;
				$this->session->set_flashdata('nis',$nis);
				redirect(base_url('siswa/tambahsiswa'));
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, silahkan masukan <strong>nis</strong> yang belum digunakan</div>');
				redirect(base_url('siswa/tambahsiswa'));
			}
			
		}else{
			$this->load->view('head');
			$this->load->view('FormTambahSiswa');
			$this->load->view('foot');
		}
	}
	function daftarSiswa(){
		if (empty($this->uri->segment('3'))){
			$this->load->view('head');
			$this->load->view('DaftarKelasSiswa');
			$this->load->view('foot');
		}else {
			$kelas=$this->uri->segment('3');
			$data['daftar_siswa']=$this->SiswaM->getDaftarSiswa($kelas);
			if (empty($data['daftar_siswa'])){
				redirect(base_url('siswa/daftarSiswa'));
			}else{
				$data['kelas']=$kelas;
				$this->load->view('head');
				$this->load->view('DaftarSiswa',$data);
				$this->load->view('foot');
			}
		}
		
	}
	function dataSiswa(){
		if (empty($this->uri->segment('3'))){
			if ($this->session->userdata('level')=='siswa'){
				redirect(base_url('siswa/datasiswa/'.$this->session->userdata('id')));
			}else {
				redirect(base_url('siswa/daftarsiswa'));
			}
		}else {
			$nis=$this->uri->segment('3');
			$data['data_siswa']=$this->siswaM->getDataSiswa($nis);
			if (empty($data['data_siswa'])){
				redirect(base_url('siswa/daftarSiswa'));
			}else{
				$this->load->view('head');
				$this->load->view('DataSiswa',$data);
				$this->load->view('foot');
			}
		}
	}
}