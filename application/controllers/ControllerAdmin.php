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
     //crud type Sakafo
    public function TypeSakafo() //view list loader
    {
        $data = array();
        $data['listeTypeSakafo'] = $this->TypeSakafo->getDonne();
        $data['content'] = 'TypeSakafo/TypeSakafo';
        $this->load($data);
    }
    public function nouveauTypeSakafo() //view create loader
    {
        $data = array();
        $data['typeObjectif'] = $this->TypeObjectif->getDonne();
        $data['content'] = 'TypeSakafo/NewTypeSakafo';
        $this->load($data);
    }
    public function insertNewTypeSakafo() //execute create
    {
        $idTypeObjectif = $this->input->post("idTypeObjectif");
        $nomTypeSakafo = $this->input->post("nomTypeSakafo");
        $newTypeSakafo = new TypeSakafo(null,$nomTypeSakafo,$idTypeObjectif);
        $results = $newTypeSakafo->insertDonne();
        if(!$results)
        {
            $this->nouveauTypeSakafo();
        }
        else{
            redirect("ControllerAdmin/TypeSakafo");
        }
    }
    public function editTypeSakafo() //view update loader
    {
        $data = array();
        $idTypeSakafo = $this->input->get("idTypeSakafo");
        $typeSakafo = new TypeSakafo($idTypeSakafo,null);
        $data['typeSakafo'] = $typeSakafo->getDonneById();
        $data['typeObjectif'] = $this->TypeObjectif->getDonne();
        $data['content'] = 'TypeSakafo/EditTypeSakafo';
        $this->load($data);
    }
    public function modifierTypeSakafo() //execute update
    {
        $idTypeSakafo = $this->input->post("idTypeSakafo");
        $idTypeObjectif = $this->input->post("idTypeObjectif");
        $nomTypeSakafo = $this->input->post("nomTypeSakafo");
        $TypeSakafo = new TypeSakafo($idTypeSakafo,$nomTypeSakafo,$idTypeObjectif);
        $results = $TypeSakafo->updateDonne();
        if(!$results)
        {
            $this->editTypeSakafo();
        }
        else{
            redirect("ControllerAdmin/TypeSakafo");
        }
    }
    public function deleteTypeSakafo() //view delete loader
    {
        $data = array();
        $data['idTypeSakafo'] = $this->input->get("idTypeSakafo");
        $data['content'] = 'TypeSakafo/DeleteTypeSakafo';
        $this->load($data);
    } 
    public function supprimerTypeSakafo() //execute delete
    {
        $idTypeSakafo = $this->input->get("idTypeSakafo");
        $TypeSakafo = new TypeSakafo($idTypeSakafo,null,null);
        $Sakafo = new Sakafo(null,$idTypeSakafo,null,null);
        $result1 = $Sakafo->deleteDonneByIdType();
        $result2 = $TypeSakafo->deleteDonne();
        if(!$result1 || !$result2)
        {
            $this->deleteTypeSakafo();
        }
        else{
            redirect("ControllerAdmin/TypeSakafo");
        }
    }  
    public function annulerTypeSakafo() //redirect
    {
        redirect("ControllerAdmin/TypeSakafo");
    }
  
	//crud  Sakafo
    public function Sakafo() //view list loader
    {
        $data = array();
        $data['listeSakafo'] = $this->Sakafo->getDonne();
        $data['content'] = 'Sakafo/Sakafo';
        $this->load($data);
    }
    public function nouveauSakafo() //view create loader
    {
        $data = array();
        $data['typeSakafo'] = $this->TypeSakafo->getDonne();
        $data['content'] = 'Sakafo/NewSakafo';
        $this->load($data);
    }
    public function insertNewSakafo() //execute create
    {
        $idTypeSakafo = $this->input->post("idTypeSakafo");
        $nomSakafo = $this->input->post("nomSakafo");
        $prixSakafo = $this->input->post("prixSakafo");
        $newSakafo = new Sakafo(null, $idTypeSakafo,$nomSakafo, $prixSakafo);
        $results = $newSakafo->insertDonne();
        if(!$results) $this->nouveauSakafo();
        else redirect("ControllerAdmin/Sakafo");
    }
    public function editSakafo() //view update loader
    {
        $data = array();
        $idSakafo = $this->input->get("idSakafo");
        $sakafo = new Sakafo($idSakafo,null,null,null);
        $data['sakafo'] = $sakafo->getDonneById();
        $typeSakafo = new TypeSakafo($sakafo->getIdTypeSakafo(),null,null);
        $data['typeSakafo'] = $typeSakafo->getDonneById();
        $data['listeTypeSakafo'] = $this->TypeSakafo->getDonne();
        $data['content'] = 'Sakafo/EditSakafo';
        $this->load($data);
    }
    public function modifierSakafo() //execute update
    {
        $idSakafo = $this->input->post("idSakafo");
        $idTypeSakafo = $this->input->post("idTypeSakafo");
        $nomSakafo = $this->input->post("nomSakafo");
        $prixSakafo = $this->input->post("prixSakafo");
        $Sakafo = new Sakafo($idSakafo,$idTypeSakafo,$nomSakafo, $prixSakafo);
        $results = $Sakafo->updateDonne();
        if(!$results)$this->editSakafo();
        else redirect("ControllerAdmin/Sakafo");
    }
    public function deleteSakafo() //view delete loader
    {
        $data = array();
        $data['idSakafo'] = $this->input->get("idSakafo");
        $data['content'] = 'Sakafo/DeleteSakafo';
        $this->load($data);
    } 
    public function supprimerSakafo() //execute delete
    {
        $idSakafo = $this->input->get("idSakafo");
        $Sakafo = new Sakafo($idSakafo,null,null,null);
        $results = $Sakafo->deleteDonne();
        if(!$results) $this->deleteSakafo();
        else redirect("ControllerAdmin/Sakafo");
    }  
    public function annulerSakafo() //redirect
    {
        redirect("ControllerAdmin/Sakafo");
    }
    public function Carte()
	{
        $data = array();
        $data['listeCarteValider'] = $this->CarteValider->getDonne();
        $data['listeCarte'] = $this->Carte->getDonne();
        $data['content'] = 'Carte';
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
            $this->TypeSakafo();
        }
        else if($action==11)
        {
            $this->Sakafo();
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
