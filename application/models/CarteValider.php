<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class CarteValider extends CI_Model
{
    private $idCarteValider;
    private $idCarte;
    private $dateValidation;
    private $idUtilisateur;
   
    public function getDemande()
    {
        if($this->getIdCarte()!=null)
        {
            $this->db->where('idCarte', $this->idCarte);
        }
        $query = $this->db->get('CarteDemande');
        $results = array();
        foreach ($query->result() as $row) {
            $CarteValider = new CarteValider();
            $CarteValider->setIdCarte($row->idCarte);
            $CarteValider->setDateValidation($row->dateValidation);
            $CarteValider->setIdUtilisateur($row->idUtilisateur);
            $results[] = $CarteValider;
        }
        return $results;
    }
    public function insertDemande()
    {
        $data = array(
            'idCarteDemande' => $this->getIdCarteValider(),
            'idCarte' => $this->getIdCarte(),
            'dateDemande' => $this->getDateValidation(),
            'idUtilisateur' => $this->getIdUtilisateur()
        );
        $this->db->insert('CarteValider', $data);
        return $this->db->insert_id();
    }

    public function getDonne()
    {
        if($this->getIdCarte()!=null)
        {
            $this->db->where('idCarte', $this->idCarte);
        }
        $query = $this->db->get('CarteValider');
        $results = array();
        foreach ($query->result() as $row) {
            $CarteValider = new CarteValider();
            $CarteValider->setIdCarte($row->idCarte);
            $CarteValider->setDateValidation($row->dateValidation);
            $CarteValider->setIdUtilisateur($row->idUtilisateur);
            $results[] = $CarteValider;
        }
        return $results;
    }
    public function insertDonne()
    {
        $data = array(
            'idCarteValider' => $this->getIdCarteValider(),
            'idCarte' => $this->getIdCarte(),
            'dateValidation' => $this->getDateValidation(),
            'idUtilisateur' => $this->getIdUtilisateur()
        );
        $this->db->insert('CarteValider', $data);
        return $this->db->insert_id();
    }

    public function __construct($idCarteValider = null, $idCarte = null, $dateValidation = null, $idUtilisateur = null){
        $this->setIdCarteValider($idCarteValider);
        $this->setIdCarte($idCarte);
        $this->setDateValidation($dateValidation);
        $this->setIdUtilisateur($idUtilisateur);
    }
    public function getIdCarteValider(){
        return $this->idCarteValider;
    }
    public function setIdCarteValider($idCarteValider){
        $this->idCarteValider = $idCarteValider;
    }
    public function getIdCarte(){
        return $this->idCarte;
    }
    public function setIdCarte($idCarte){
        $this->idCarte = $idCarte;
    }
    public function getDateValidation(){
        if($dateValidation==null) $this->setDateValidation(new DateTime(null, new DateTimeZone('Indian/Antananarivo')));
        return $this->dateValidation;
    }
    public function setDateValidation($dateValidation){
        $this->dateValidation = $dateValidation;
    }
    public function setIdUtilisateur($idProfiles){
        $this->idProfiles = $idProfiles;
    }
    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
}
?>