<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerConnexionAdmin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idAdmin') != null){
			redirect('ControllerAdmin/Index');
		}
	}
    public function Index(){
        $this->load->view('Admin/Login/Index');
    }
    public function Login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$utilisateur = new Utilisateur(null,null,$email,$password,null);
		$utilisateur = $utilisateur->login();
		if($utilisateur != null && $utilisateur->getIdentification() == 11){
			$this->session->set_userdata('idAdmin',$utilisateur->getIdUtilisateur());
			redirect('ControllerAdmin/Index');
		}else{
			$this->Index();
		}
	}
    public function Inscription(){
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Login/Inscription');
        $this->load->view('Admin/Footer');
    }
    public function SingUp(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$utilisateur = new Utilisateur(null,$name,$email,$password,11);
		$result = $utilisateur->singUp($password,$password2);
		if($result){
			$utilisateur = $utilisateur->login();
			$this->session->set_userdata('idAdmin',$utilisateur->getIdUtilisateur());
			if($this->session->userdata('idAdmin') == null){
				$this->load->AdminConnexion();
			}else{
				redirect('ControllerAdmin/Index');
			}
		}else{
			$this->AdminSignUp();
		}  
	}
}
?>