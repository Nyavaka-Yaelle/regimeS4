<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class RegimeJournalier extends CI_Model
{
    private $idRegimeJournalier;
    private $idRegime;
    private $numeroJour;
    private $idSakafo;
    private $idActivite;
   
    public function getDonne()
    {
        $query = $this->db->get('RegimeJournalier');
        $results = array();
        foreach ($query->result() as $row) {
            $RegimeJournalier = new RegimeJournalier();
            $RegimeJournalier->setIdRegimeJournalier($row->idRegimeJournalier);
            $RegimeJournalier->setIdRegime($row->idRegime);
            $RegimeJournalier->setNumeroJour($row->numeroJour);
            $RegimeJournalier->setIdSakafo($row->idSakafo);
            $RegimeJournalier->setIdActivite($row->idActivite);
            $results[] = $RegimeJournalier;
        }
        return $results;
    }
    public function insertDonne()
    {
        $data = array(
            'idRegimeJournalier' => $this->getIdRegimeJournalier(),
            'idRegime' => $this->getIdRegime(),
            'numeroJour' => $this->getNumeroJour(),
            'idSakafo' => $this->getIdSakafo(),
            'idActivite' => $this->getIdActivite()
        );
        $this->db->insert('RegimeJournalier', $data);
        return $this->db->insert_id();
    }

    public function __construct($idRegimeJournalier = null, $idRegime = null, $numeroJour = null, $idSakafo = null, $idActivite = null){
        $this->setIdRegimeJournalier($idRegimeJournalier);
        $this->setIdRegime($idRegime);
        $this->setNumeroJour($numeroJour);
        $this->setIdSakafo($idSakafo);
        $this->setIdActivite($idActivite);
    }
    public function getIdRegimeJournalier(){
        return $this->idRegimeJournalier;
    }
    public function setIdRegimeJournalier($idRegimeJournalier){
        $this->idRegimeJournalier = $idRegimeJournalier;
    }
    public function getIdRegime(){
        return $this->idRegime;
    }
    public function setIdRegime($idRegime){
        $this->idRegime = $idRegime;
    }
    public function getNumeroJour(){
        return $this->numeroJour;
    }
    public function setNumeroJour($numeroJour){
        $this->numeroJour = $numeroJour;
    }
    public function getIdSakafo(){
        return $this->idSakafo;
    }
    public function setIdSakafo($idSakafo){
        $this->idSakafo = $idSakafo;
    }
    public function getIdActivite(){
        return $this->idActivite;
    }
    public function setIdActivite($idActivite){
        $this->idActivite = $idActivite;
    }
}
?>