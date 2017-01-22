<?php
class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	function index(){
		$this->load->view('head');
		$this->load->view('DaftarSiswa');
		$this->load->view('foot');
	}
	function tambahSiswa(){
		if(!empty($this->input->post('submit'))){
			
		}else{
			$this->load->view('head');
			$this->load->view('FormTambahSiswa');
			$this->load->view('foot');
		}
	}
}