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
}