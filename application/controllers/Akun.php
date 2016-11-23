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
			$this->load->view('head');
			$this->load->view('dashboard');
			$this->load->view('foot');
		}
	}
	function  login(){
		$config = array(
				array(
						'field' => 'id',
						'label' => 'ID',
						'rules' => 'required'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
				)
		);
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('akun');
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
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('level',$level);
				redirect(base_url());
			}else{
				$this->session->set_flashdata('alert','Login gagal! silakan cek kembali nis/nip dan password, atau hubungi petugas.');
				redirect(base_url('akun'));
			}
		}
		
	}
	function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('FormLogin','Logout berhasil');
		redirect(base_url());
	}

}