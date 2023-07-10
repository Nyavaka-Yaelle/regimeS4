<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idUtilisateur') == null){
			redirect('ControllerHome/Index');
		}
	}
	public function Index()
	{
		$this->load->view('Home/Index');
	}
}
