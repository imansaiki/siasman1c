<?php
class Guru extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id'))
		{
			redirect(base_url());
		}
		$this->load->model('jadwalM');
		$this->load->model('guruM');
	}
	function index(){
		$this->load->view('head');
		$this->load->view('DaftarGuru');
		$this->load->view('foot');
	}
	function tambahGuru(){
		if ($this->session->userdata('level')!='admin'){
			redirect(base_url('guru'));
		}
		if (empty($this->input->post('submit'))){
			$this->load->view('head');
			$this->load->view('FormTambahGuru');
			$this->load->view('foot');
		}else{
			$config = array(
					array(
							'field' => 'nip',
							'label' => 'nip',
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
							'field' => 'agama',
							'label' => 'Agama',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'telepom',
							'label' => 'Nomor Telepon',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'alamat',
							'label' => 'Alamat',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'email',
							'label' => 'Email',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'tktpd',
							'label' => 'Tingkat Pendidikan',
							//'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'jurpd',
							'label' => 'Jurusan Pendidikan',
							//'rules' => 'required',
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
				redirect(base_url('guru/tambahguru'));
			}else {
				$nip=$this->input->post('nip');
				$kodeguru=$this->input->post('kodeguru');
				$pelajaran=$this->input->post('pelajaran');
				$data_guru= array(
						'nip'=>$nip,
						'nama'=>$this->input->post('nama'),
						'tempat_lahir'=>$this->input->post('tmptlahir'),
						'tanggal_lahir'=>$this->input->post('tgllahir'),
						'kelamin'=>$this->input->post('jkelamin'),
						'alamat'=>$this->input->post('alamat'),
						'agama'=>$this->input->post('agama'),
						'email'=>$this->input->post('email'),
						'pendidikan_tingkat'=>$this->input->post('tktpd'),
						'pendidikan_studi'=>$this->input->post('jurpd'),
						'kewarganegaraan'=>$this->input->post('kwnegara'),
						'update_by'=>$this->session->userdata('id')
				);
				$data_akun= array(
						'id'=>$nip,
						'password'=>$nip,
						'level'=>'guru',
				);
				$data_ampuhan= array(
						'kode_guru'=>$kodeguru,
						'password'=>$nip,
						'nama_pelajaran'=>$pelajaran,
				);
				$data=$this->guruM->tambahGuru($data_guru);
				if ($data=='0'){
					//success
					$this->load->model('AkunM');
					$this->AkunM->tambahAkun($data_akun);
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$nip.' Telah ditambahkan </div>');
					redirect(base_url('guru/tambahguru'));
				}else {
					//fail
					
				}
			}
		}
	}
}