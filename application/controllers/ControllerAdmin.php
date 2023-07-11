<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
    public function Index()
	{
        redirect("ControllerAdmin/Sakafo");
    }
  //crud type enchainement
    public function TypeEnchainement() //view list loader
	{
        $data = array();
        $data['listeTypeEnchainement'] = $this->TypeEnchainement->getDonne();
        $data['content'] = 'TypeEnchainement/TypeEnchainement';
		$this->load($data);
	}
    public function nouveauTypeEnchainement() //view create loader
    {
        $data = array();
        $data['typeObjectif'] = $this->TypeObjectif->getDonne();
        $data['content'] = 'TypeEnchainement/NewTypeEnchainement';
		$this->load($data);
    }
    public function insertNewTypeEnchainement() //execute create
    {
        $idTypeObjectif = $this->input->post("idTypeObjectif");
        $nomTypeEnchainement = $this->input->post("nomTypeEnchainement");
        $newTypeEnchainement = new TypeEnchainement(null,$nomTypeEnchainement,$idTypeObjectif);
        $results = $newTypeEnchainement->insertDonne();
		if(!$results)
        {
            $this->nouveauTypeEnchainement();
        }
        else{
            redirect("ControllerAdmin/TypeEnchainement");
        }
    }
    public function editTypeEnchainement() //view update loader
    {
        $data = array();
        $idTypeEnchainement = $this->input->get("idTypeEnchainement");
        $typeEnchainement = new TypeEnchainement($idTypeEnchainement,null);
        $data['typeEnchainement'] = $typeEnchainement->getDonneById();
        $data['typeObjectif'] = $this->TypeObjectif->getDonne();
        $data['content'] = 'TypeEnchainement/EditTypeEnchainement';
		$this->load($data);
    }
    public function modifierTypeEnchainement() //execute update
    {
        $idTypeEnchainement = $this->input->post("idTypeEnchainement");
        $idTypeObjectif = $this->input->post("idTypeObjectif");
        $nomTypeEnchainement = $this->input->post("nomTypeEnchainement");
        $TypeEnchainement = new TypeEnchainement($idTypeEnchainement,$nomTypeEnchainement,$idTypeObjectif);
        $results = $TypeEnchainement->updateDonne();
		if(!$results)
        {
            $this->editTypeEnchainement();
        }
        else{
            redirect("ControllerAdmin/TypeEnchainement");
        }
    }
    public function deleteTypeEnchainement() //view delete loader
    {
        $data = array();
        $data['idTypeEnchainement'] = $this->input->get("idTypeEnchainement");
        $data['content'] = 'TypeEnchainement/DeleteTypeEnchainement';
		$this->load($data);
    } 
    public function supprimerTypeEnchainement() //execute delete
    {
        $idTypeEnchainement = $this->input->get("idTypeEnchainement");
        $TypeEnchainement = new TypeEnchainement($idTypeEnchainement,null,null);
        $Enchainement = new Enchainement(null,$idTypeEnchainement,null,null);
        $result1 = $TypeEnchainement->deleteDonne();
        $result2 = $TypeEnchainement->deleteDonne();
		if(!$result1 || !$result2)
        {
            $this->deleteTypeEnchainement();
        }
        else{
            redirect("ControllerAdmin/TypeEnchainement");
        }
    }  
    public function annulerTypeEnchainement() //redirect
    {
        redirect("ControllerAdmin/TypeEnchainement");
    }  
    public function Carte()
	{
        $data = array();
        $data['listeCarteValider'] = $this->CarteValider->getDonne();
        $data['listeCarte'] = $this->Carte->getDonne();
        $data['content'] = 'Carte';
		$this->load($data);
	}
	public function Sakafo()
	{
        $data = array();
        $data['listeSakafo'] = $this->Sakafo->getDonne();
        $data['content'] = 'Sakafo';
		$this->load($data);
	}
    public function TypeSakafo()
	{
        $data = array();
        $data['listeTypeSakafo'] = $this->TypeSakafo->getDonne();
        $data['content'] = 'TypeSakafo';
		$this->load($data);
	}
    
    public function Enchainement()
	{
        $data = array();
        $data['listeEnchainement'] = $this->Enchainement->getDonne();
        $data['content'] = 'Enchainement';
		$this->load($data);
	}
    public function load($data)
	{
		$this->load->view('Admin/Header');
		$this->load->view('Admin/'.$data['content'],$data);
		$this->load->view('Admin/Footer');
	}
    public function content()
    {
        $action = $this->input->get('action');
        if($action==1)
        {
            $this->Sakafo();
        } 
        else if($action==11)
        {
            $this->TypeSakafo();
        }
        else if($action==2)
        {
            $this->TypeEnchainement();
        }
        else if($action==21)
        {
            $this->Enchainement();
        }
        else if($action==3)
        {
            $this->Carte();
        }
    }
	
}
