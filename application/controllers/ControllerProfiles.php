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
			redirect('ControllerHome/Index');
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
            redirect('ControllerFront/Index');
        }
    }
	public function FillTypeObjectif()
	{
        if($this->input->post('idTypeObjectif') != null){
            $idTypeObjectif = $this->input->post('idTypeObjectif');
            $this->session->set_userdata('idTypeObjectif',$idTypeObjectif);
            $typeObjectif = new TypeObjectif();
            $typeObjectif->setIdTypeObjectif($idTypeObjectif);
            $typeObjectif = $typeObjectif->getDonneById();
            $this->typeObjectif = $typeObjectif;
            $data['listObjectif'] = $this->typeObjectif->getObjectif();
            $this->load->view('Profiles/Objectif',$data);
        }else {
            $this->TypeObjectif();
        }
	}
	public function FillObjectif()
	{
		$idTypeObjectif = $this->session->userdata('idTypeObjectif'); 
        $typeObjectif = new TypeObjectif();
        $typeObjectif->setIdTypeObjectif($idTypeObjectif);
        $typeObjectif = $typeObjectif->getDonneById();

        $checkedCheckboxes = $this->input->post('checkboxes');
        if (!empty($checkedCheckboxes) && is_array($checkedCheckboxes)) {
            $results = array();
            foreach ($checkedCheckboxes as $checkbox) {
                $id = $checkbox;
                $objectif = new Objectif();
                $objectif->setIdObjectif($id);
                $objectif = $objectif->getDonneById();
                $results[] = $objectif;
            }
            $this->user->insertObjectifUtilisateur($results);
            redirect('ControllerFront/Index');
        } else {
            $this->TypeObjectif();
        }
	}
}
?>