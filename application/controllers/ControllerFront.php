<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerFront extends CI_Controller {
    private $user;
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
        if($this->user->getPorteFeuille()== null){
            $protefeuille = new PorteFeuille(null,$this->user->getIdUtilisateur(),0);
            $protefeuille->insertDonne();
        }
	}
	public function Deconnexion(){
		$this->session->sess_destroy();
		$this->load->view('Login/Index');
	}
	public function Index()
	{
        $data['user'] = $this->user;
		$this->load->view('Home/Index',$data);
	}
    public function AjourCaisse()
	{
        $data['user'] = $this->user;
		$this->load->view('Home/Rechargement',$data);
	}
    public function Profile()
	{
        $data['profile'] = $this->user->getProfile();
        $data['user'] = $this->user;
		$this->load->view('Home/Profil',$data);
	}
    public function RegimeJournalier(){
        $data['user'] = $this->user;
        if($this->user->getRegime() == null){
            $this->user->creationRegime();
        }
        $data['regimeJournaliers'] = $this->user->getRegimeJournalier();
        $this->load->view('Home/RegimeJournalier',$data);
    }
}
