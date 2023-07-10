<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerHome extends CI_Controller {
	private $user;
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idUtilisateur') != null){
			redirect('ControllerProfiles/Index');
		}
	}
	public function Index()
	{
		$this->load->view('Login/Index');
	}
	public function Login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$utilisateur = new Utilisateur(null,null,$email,$password,null);
		$utilisateur = $utilisateur->login();
		if($utilisateur != null){
			$this->session->set_userdata('idUtilisateur',$utilisateur->getIdUtilisateur());
			redirect('ControllerProfiles/Index');
		}else{
			$this->load->view('Login/Index');
		}
	}
	public function Inscription(){
		$this->load->view('Login/Inscription');
	}
	public function SingUp(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$utilisateur = new Utilisateur(null,$name,$email,$password,1);
		$result = $utilisateur->singUp($password,$password2);
		if($result){
			$utilisateur = $utilisateur->login();
			$this->session->set_userdata('idUtilisateur',$utilisateur->getIdUtilisateur());
			if($this->session->userdata('idUtilisateur') == null){
				$this->load->view('Login/Index');
			}else{
				redirect('ControllerProfiles/Index');
			}
		}else{
			$this->load->view('Login/Inscription');
		}  
	}	
}
