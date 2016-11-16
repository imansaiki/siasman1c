<?php
class Akun extends CI_Controller {
	public function index()  {
		if (empty($this->session->userdata)){
			$this->load->view('FormLogin');
		}else{
			$this->load->view('index');
		}
	}
}