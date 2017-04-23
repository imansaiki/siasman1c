<?php
class Akun extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()  {
		if (empty($this->session->userdata('id'))){
			$this->load->view('head');
			$this->load->view('FormLogin');
			$this->load->view('foot');
		}else{
			redirect(base_url());
		}
	}
	function  login(){
		if (!empty($this->input->post('submit'))){
			$config = array(
					array(
							'field' => 'id',
							'label' => 'nis/nip',
							'rules' => 'required',
							'errors' => array(
									'required' => '%s tidak boleh kosong',),
							
							),
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required',
							'errors' => array('required' => '%s tidak boleh kosong',),
					)
			);
			$this->form_validation->set_rules($config);
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'
														.validation_errors().
														'</div>');
				redirect(base_url('akun'));
			}else{
				$login_s= array(
						'id'=>$this->input->post('id'),
						'password'=>$this->input->post('password')
						);
				$this->load->model('Akunm');
				$login_r=$this->Akunm->login($login_s);
				if (!empty($login_r)){
					foreach ($login_r as $row){
						$id=$row->id;
						$level=$row->level;
					}
					if ($level=='admin'){
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('id_name',$id);
						$this->session->set_userdata('level',$level);
						redirect(base_url());
					}elseif ($level=='siswa'){
						$this->load->model('SiswaM');
						$name=$this->SiswaM->login($id);
						foreach ($name as $row){
							$name=$row->nama;
						}
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('id_name',$name);
						$this->session->set_userdata('level',$level);
						redirect(base_url());
					}elseif ($level=='guru'){
						$this->load->model('GuruM');
						$name=$this->GuruM->login($id);
						foreach ($name as $row){
							$name=$row->nama;
						}
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('id_name',$name);
						$this->session->set_userdata('level',$level);
						redirect(base_url());
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
															Login gagal! silakan cek kembali nis/nip dan password, atau hubungi petugas.
															</div>');
					redirect(base_url('akun'));
				}
			}
		}else{
			redirect(base_url('akun'));
		}
	}
	function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('id_name');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
												Logout berhasil
												</div>');
		redirect(base_url());
	}
	function editPassword(){
		if (empty($this->session->userdata('id'))){
			redirect(base_url());
		}else{
			if (empty($this->input->post('submit'))){
				$this->load->view('head');
				$this->load->view('FormEditPassword');
				$this->load->view('foot');
			}else{
				$config = array(
						array(
								'field' => 'oldpassword',
								'label' => 'password lama',
								'rules' => 'required',
								'errors' => array(
										'required' => '%s tidak boleh kosong',),
			
						),
						array(
								'field' => 'newpassword',
								'label' => 'password baru',
								'rules' => 'required',
								'errors' => array('required' => '%s tidak boleh kosong',),
						),
						array(
								'field' => 'newpasswordconfirm',
								'label' => 'konfirmasi password baru',
								'rules' => 'required|matches[newpassword]',
								'errors' => array(
										'required' => '%s tidak boleh kosong',
										'matches' => 'konfirmasi password baru tidak sama'
								),
						)
				);
				$this->form_validation->set_rules($config);
			
				if ($this->form_validation->run() == FALSE){
			
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'
							.validation_errors().
							'</div>');
							redirect('akun/editPassword');
				}else{
					$cek_s= array(
							'id'=>$this->session->userdata('id'),
							'password'=>$this->input->post('oldpassword'),
					);
			
					$this->load->model('AkunM');
					$cek_r=$this->AkunM->login($cek_s);
					if (!empty($cek_r)){
						$update=array(
								'id'=>$this->session->userdata('id'),
								'password'=>$this->input->post('newpassword')
						);
						$this->load->model('AkunM');
						$this->AkunM->editPassword($update);
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
													Password berhasil dirubah
													</div>');
						redirect(base_url('akun/editPassword'));
					}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
													Password lama salah
													</div>');
						redirect(base_url('akun/editPassword'));
					}
			
				}
			}
		}
	}
	function daftarAkun(){
		$this->load->view('head');
		$this->load->view('DaftarAkun');
		$this->load->view('foot');
	}
	function resetPassword(){
		$id=$this->input->post('id');
		$url=$this->input->post('url');
		$this->load->model('akunM');
		$this->akunM->resetPassword($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
													Password berhasil direset
													</div>');
		redirect($url);
	}



}