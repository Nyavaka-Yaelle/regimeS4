<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerFront extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idUtilisateur') == null){
			redirect('ControllerHome/Index');
		} else {
            $idUser = $this->session->userdata('idUtilisateur');
            $this->user = new Client();
            $this->user->setIdUtilisateur($idUser);
            $this->user = $this->user->getUtilisateur();
        }
	}
	public function Deconnexion(){
		$this->session->set_userdata('idUtilisateur',null);
		$this->load->view('Login/Index');
	}
	public function Index()
	{
		$this->load->view('Home/Index');
	}
}
