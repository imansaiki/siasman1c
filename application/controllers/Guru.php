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
		$this->load->model('ampuhanM');
	}
	function index(){
		$this->load->view('head');
		$this->load->view('GuruMain');
		$this->load->view('foot');
	}
	function daftarGuru(){
		$data['daftar_guru']=$this->guruM->getDaftarGuru();
		$this->load->view('head');
		$this->load->view('DaftarGuru',$data);
		$this->load->view('foot');
	}
	function deleteAmpuhan(){
		$kode=$this->input->post('kode');
		$this->load->model('ampuhanM');
		$this->ampuhanM->deleteAmpuhan($kode);
		$return = '<div class="alert alert-success" role="alert">'.$kode.' Berhasil Dihapus</div>';
		echo $return;
		
	}
	function deleteGuru(){
		if ($this->session->userdata('level')!='admin'){
			redirect(base_url());
			break;
		}
		$nis=$this->input->post('nip');
		$url=$this->input->post('url');
		$error=$this->guruM->deleteGuru($nip);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"></div>');
		redirect($url);
	}
	function dataGuru(){
		if (empty($this->uri->segment('3'))){
			if ($this->session->userdata('level')=='guru'){
				redirect(base_url('guru/dataguru/'.$this->session->userdata('id')));
			}else {
				redirect(base_url('guru'));
			}
		}else {
			$nip=$this->uri->segment('3');
			$data['data_guru']=$this->guruM->getDataGuru($nip);
			$data['data_ampuhan']=$this->ampuhanM->getAmpuhanGuru($nip);
			if (empty($data['data_guru'])){
				redirect(base_url('guru'));
			}else{
				$this->load->view('head');
				$this->load->view('DataGuru',$data);
				$this->load->view('foot');
			}
		}
	}
	function tambahGuru(){
		if ($this->session->userdata('level')!='admin'){
			redirect(base_url('guru'));
			break;
		}
		$this->load->model('matapelajaranM');
		$data['daftar_mapel']=$this->matapelajaranM->getDaftarMapel();
		if (empty($this->input->post('submit'))){
			$this->load->view('head');
			$this->load->view('FormTambahGuru',$data);
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
							'field' => 'telepon',
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
				$data_guru= array(
						'nip'=>$nip,
						'nama'=>$this->input->post('nama'),
						'tempat_lahir'=>$this->input->post('tmptlahir'),
						'tanggal_lahir'=>$this->input->post('tgllahir'),
						'kelamin'=>$this->input->post('jkelamin'),
						'alamat'=>$this->input->post('alamat'),
						'agama'=>$this->input->post('agama'),
						'telepon'=>$this->input->post('telepon'),
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
				if ($this->input->post('ampuhan')=='ampuhan'){
					$config2 = array(
							array(
									'field' => 'mapel',
									'label' => 'Mapel Ampuhan',
									'rules' => 'required',
									'errors' => array(
											'required' => '%s tidak boleh kosong',),
										
							),
							array(
									'field' => 'kodeguru',
									'label' => 'Kode Guru',
									//'rules' => 'required',
									'errors' => array('required' => '%s tidak boleh kosong',),
							),
					);
					$this->form_validation->set_rules($config2);
					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
						redirect(base_url('guru/tambahguru'));
					}else {
						$data_ampuhan= array(
								'kode_guru'=>$this->input->post('kodeguru'),
								'nip'=>$nip,
								'id_pelajaran'=>$this->input->post('mapel'),
						);
					}
				}
			
				$data=$this->guruM->tambahGuru($data_guru);
				if ($data=='0'){
					//success
					$this->load->model('AkunM');
					$this->AkunM->tambahAkun($data_akun);
					if (!empty($data_ampuhan)){
						$this->load->model('ampuhanM');
						$this->ampuhanM->tambahAmpuhan($data_ampuhan);
					}
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$nip.' Telah ditambahkan </div>');
					redirect(base_url('guru/tambahguru'));
				}else {
					//fail
					
				}
			}
		}
	}
	function editGuru(){
		if (!empty($this->input->post('submit')) && ($this->session->userdata('id')==$nip || $this->session->userdata('level')=='admin')){
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
							'rules' => 'required',
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
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'agama',
							'label' => 'Agama',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'telepon',
							'label' => 'Nomor Telepon',
							'rules' => 'required',
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
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'tktpd',
							'label' => 'Tingkat Pendidikan',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'jurpd',
							'label' => 'Jurusan Pendidikan',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					array(
							'field' => 'kwnegara',
							'label' => 'Kewarganegaraan',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <b>Terjadi Kesalahan :</b>'.validation_errors().'</div>');
				redirect(current_url());
			}else{
				$nip=$this->input->post('nip');
				$data_guru= array(
						'nip'=>$nip,
						'nama'=>$this->input->post('nama'),
						'tempat_lahir'=>$this->input->post('tmptlahir'),
						'tanggal_lahir'=>$this->input->post('tgllahir'),
						'kelamin'=>$this->input->post('jkelamin'),
						'alamat'=>$this->input->post('alamat'),
						'agama'=>$this->input->post('agama'),
						'telepon'=>$this->input->post('telepon'),
						'email'=>$this->input->post('email'),
						'pendidikan_tingkat'=>$this->input->post('tktpd'),
						'pendidikan_studi'=>$this->input->post('jurpd'),
						'kewarganegaraan'=>$this->input->post('kwnegara'),
						'update_by'=>$this->session->userdata('id')
				);
				$result=$this->guruM->editGuru($data_guru);
				if($result=='0'){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$nip.' Telah diedit </div>');
					redirect(base_url('guru/dataguru/'.$nip));
					break;
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, Kode : <strong>'.$result.'</strong></div>');
					redirect(current_url());
					break;
				}
			}
		}else{
			$nip=$this->uri->segment('3');
			if (empty($this->uri->segment('3'))){
				redirect(base_url('guru'));
			}elseif($this->session->userdata('id')==$nip || $this->session->userdata('level')=='admin'){
				$data['data_guru']=$this->guruM->getDataGuru($nip);
				if (empty($data['data_guru'])){
					redirect(base_url('guru/daftarguru'));
				}else{
					$this->load->view('head');
					$this->load->view('FormEditGuru',$data);
					$this->load->view('foot');
				}
			}else{
				redirect(base_url('guru'));
			}
		}
	}
	function editAmpuhan(){
		if (!empty($this->input->post('submit')) && $this->session->userdata('level')=='admin'){
			$config = array(
					array(
							'field' => 'kodeguru',
							'label' => 'Kode guru',
							'rules' => 'required',
							'errors' => array(
									'required' => '%s tidak boleh kosong',),
								
					),
					array(
							'field' => 'mapel',
							'label' => 'Mata Pelajaran',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					),
					
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <b>Terjadi Kesalahan :</b>'.validation_errors().'</div>');
				redirect(current_url());
			}else{
				$nip=$this->input->post('nip');
				$data_guru= array(
						'nip'=>$nip,
						'kode_guru'=>$this->input->post('kodeguru'),
						'id_pelajaran'=>$this->input->post('mapel'),
						
				);
				$result=$this->ampuhanM->tambahAmpuhan($data_guru);
				if($result=='0'){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$nip.' Telah diedit </div>');
					redirect(base_url('guru/editampuhan/'.$nip));
					break;
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Terjadi kesalahan</b>, Kode : <strong>'.$result.'</strong></div>');
					redirect(current_url());
					break;
				}
			}
		}else{
			$nip=$this->uri->segment('3');
			if (empty($this->uri->segment('3'))){
				redirect(base_url('guru'));
			}elseif($this->session->userdata('level')=='admin'){
				$data['data_guru']=$this->guruM->getDataGuru($nip);
				if (empty($data['data_guru'])){
					redirect(base_url('guru/daftarguru'));
				}else{
					$data['data_ampuhan']=$this->ampuhanM->getAmpuhanGuru($nip);
					$this->load->model('matapelajaranM');
					$data['daftar_mapel']=$this->matapelajaranM->getDaftarMapel();
					$this->load->view('head');
					$this->load->view('FormEditAmpuhan',$data);
					$this->load->view('foot');
				}
			}else{
				redirect(base_url('guru'));
			}
		}
	}
}