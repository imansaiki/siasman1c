<?php
class Akun extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()  {
		if (empty($this->session->userdata('id'))){
			$this->load->view('FormLogin');
		}else{
			$this->load->view('head');
			$this->load->view('dashboard');
			$this->load->view('foot');
		}
	}
	function  login(){
		$login_s= array(
				'id'=>$this->input->post('id'),
				'password'=>$this->input->post('password')
		);
		$this->load->model('Akunm');
		$login_r=$this->Akunm->login($login_s);
		foreach ($login_r as $row){
			$id=$row->id;
			$level=$row->level;
		}
		$this->session->set_userdata('id',$id);
		$this->session->set_userdata('level',$level);
		redirect(base_url());
	}
	function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('FormLogin','Logout berhasil');
		redirect(base_url());
	}

}