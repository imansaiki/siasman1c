<?php
class Akun extends CI_Controller {
	public function index()  {
		if (empty($this->session->userdata('id'))){
			$this->load->view('FormLogin');
		}else{
			$this->load->view('welcome_message');
		}
	}

}