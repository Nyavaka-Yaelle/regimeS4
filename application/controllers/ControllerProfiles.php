<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerProfiles extends CI_Controller {
    private $user;
    private $typeObjectif;
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('idUtilisateur') == null) {
			redirect('ControllerHome/Login');
		} else {
            $idUser = $this->session->userdata('idUtilisateur');
            $this->user = new Client();
            $this->user->setIdUtilisateur($idUser);
            $this->user = $this->user->getUtilisateur();
        }
	}
    public function Index(){
        if($this->user->getProfile() == null){
            $this->load->view('Profiles/Index');
        }else {
            $this->FillProfiles();
        }
    }
	public function FillProfiles()
	{
        if($this->user->getProfile() == null){      
            $genre = $this->input->post('genre');
            $taille = $this->input->post('taille');
            $poids = $this->input->post('poids');
            $dateNaissance = $this->input->post('dateNaissance');
            $idUtilisateur = $this->session->userdata('idUtilisateur');
            $profiles = new Profiles(null,$idUtilisateur,$genre,$taille,$poids,$dateNaissance);
            $results = $profiles->insertDonne();
            if(!$results){
                $this->Index();
            }else{
                $this->TypeObjectif();
            }
        }else{
            $this->TypeObjectif();
        }
	}
    public function TypeObjectif(){
        if($this->user->getObjectifUtilisateur() == null){
            $typeObjectif = new TypeObjectif();
            $data['listTypeObjectifs'] = $typeObjectif->getDonne();
            $this->load->view('Profiles/SelectTypeObjectif',$data);
        }else {
            $this->load->view('Profiles/Objectif');
        }
    }
	public function FillTypeObjectif()
	{
        $idTypeObjectif = $this->input->post('idTypeObjectif');
		$this->session->set_userdata('idTypeObjectif',$idTypeObjectif);
        $typeObjectif = new TypeObjectif();
        $typeObjectif->setIdTypeObjectif($idTypeObjectif);
        $typeObjectif = $typeObjectif->getDonneById();
        $this->typeObjectif = $typeObjectif;
        $data['listObjectif'] = $typeObjectif->getObjectif();
        $this->load->view('Profiles/Objectif');
	}
	public function FillObjectif()
	{
		$idTypeObjectif = $this->session->userdata('idTypeObjectif'); 
		$objectifs = $this->typeObjectif->getObjectif();
		$results = array();
		for($i=0; $i<count($objectifs); $i++)
		{
			$id = $this->input->post('objectif'.$i);
            if ($id != null) {
                $objectif = $this->Objectif()->getDonneById($id);
			    $results[] = $objectif;
            }
		}
        $this->user->insertObjectifUtilisateur($results);
        redirect('index.php');
	}
}
?>