<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Sakafo extends CI_Model
{
    private $idSakafo;
    private $idTypeSakafo;
    private $nom;
    private $prix;

    public function getCompoSakafo(){
        $this->db->where('idSakafo',$this->getIdSakafo());
        $query = $this->db->get('CompoSakafo');
        $result = $query->result();
        $composakafoArray = array();
        foreach ($result as $row) {
            $composakafo = new CompoSakafo(
                $row->idCompoSakafo,
                $row->idSakafo,
                $row->nomComp,
                $row->quantite
            );
            $composakafoArray[] = $composakafo;
        }
        return $composakafoArray;
    }
    public function deleteDonneByIdType()
    {
        $query = $this->db->where('idTypeSakafo',$this->getIdTypeSakafo());
        if($this->db->delete('Sakafo')) return true;
        else return false;
    }
    public function deleteDonne()
    {
        $query = $this->db->where('idSakafo',$this->getIdSakafo());
        if($this->db->delete('Sakafo')) return true;
        else return false;
    }
    public function updateDonne()
    {
        $data = array(
            'idSakafo' => $this->getIdSakafo(),
            'idTypeSakafo' => $this->getIdTypeSakafo(),
            'nom' => $this->getNom(),
            'prix' => $this->getPrix()
        );
        $query = $this->db->where('idSakafo',$this->getIdSakafo());
        if($this->db->update('Sakafo', $data))return true;
        else return false;
    }
    public function getDonne()
    {
        $query = $this->db->get('Sakafo');
        $results = array();

        foreach ($query->result() as $row) {
            $Sakafo = new Sakafo();
            $Sakafo->setIdSakafo($row->idSakafo);
            $Sakafo->setIdTypeSakafo($row->idTypeSakafo);
            $Sakafo->setNom($row->nom);
            $Sakafo->setPrix($row->prix);
            $results[] = $Sakafo;
        }
        return $results;
    }
    public function getDonneById()
    {
        $query = $this->db->where('idSakafo', $this->getIdSakafo());
        $query = $this->db->get('Sakafo');
        foreach ($query->result() as $row) {
            $Sakafo = new Sakafo();
            $Sakafo->setIdSakafo($row->idSakafo);
            $Sakafo->setIdTypeSakafo($row->idTypeSakafo);
            $Sakafo->setNom($row->nom);
            $Sakafo->setPrix($row->prix);
            return $Sakafo;
        }
        return null;
    }
    public function insertDonne()
    {
        $data = array(
            'idSakafo' => $this->getIdSakafo(),
            'idTypeSakafo' => $this->getIdTypeSakafo(),
            'nom' => $this->getNom(),
            'prix' => $this->getPrix()
        );
        $this->db->insert('Sakafo', $data);
        return $this->db->insert_id();
    }

    public function __construct($idSakafo = null, $idTypeSakafo = null, $nom = null, $prix = null){
        $this->setIdSakafo($idSakafo);
        $this->setIdTypeSakafo($idTypeSakafo);
        $this->setNom($nom);
        $this->setPrix($prix);
    }
    public function getIdSakafo(){
        return $this->idSakafo;
    }
    public function setIdSakafo($idSakafo){
        $this->idSakafo = $idSakafo;
    }
    public function getIdTypeSakafo(){
        return $this->idTypeSakafo;
    }
    public function getTypeSakafo(){
        $typeSakafo = new TypeSakafo($this->getIdTypeSakafo(),null);
        return $typeSakafo->getDonneById();
    }
    public function setIdTypeSakafo($idTypeSakafo){
        $this->idTypeSakafo = $idTypeSakafo;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function setPrix($prix){
        if($prix>=0)
        {
            $this->prix = $prix;
        }
    }
}
?>