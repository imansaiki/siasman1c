<?php
class Akun extends CI_Controller {
	public function index()  {
		if (empty($this->session->userdata('id'))){
			$this->load->view('FormLogin');
		}else{
			$this->load->view('welcome_message');
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
			echo $row->id;
			echo $row->password;
		}
	}

}