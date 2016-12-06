<?php
class Guru extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	function index(){
		$this->load->view('head');
		$this->load->view('DaftarGuru');
		$this->load->view('foot');
	}
}