<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerProfiles extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idUtilisateur') == null) {
			redirect('ControllerHome/Login');
		}
	}
    public function Index(){
        $this->load->view('Profiles/Index');
    }
	public function FillProfiles()
	{
		$genre = $this->input->post('genre');
		$taille = $this->input->post('taille');
		$poids = $this->input->post('poids');
		$dateNaissance = $this->input->post('dateNaissance');
		$idUtilisateur = $this->session->userdata('idUtilisateur');
		$profiles = new Profiles(null,$idUtilisateur,$genre,$taille,$poids,$dateNaissance);
		$results = $profiles->insertDonne();
		if(!$results){
			redirect('ControllerProfiles/index');
		}else{
			$this->Index();
			//$this->load->view('Profiles/Index');
		}
	}
}
?>