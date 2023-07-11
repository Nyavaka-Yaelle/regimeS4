<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class CompoSakafo extends CI_Model
{
    private $idCompoSakafo, $idSakafo, $nomComp, $quantite;

    public function __construct($idCompoSakafo = null, $idSakafo = null, $nomComp = null, $quantite = null){
        $this->idCompoSakafo = $idCompoSakafo;
        $this->idSakafo = $idSakafo;
        $this->nomComp = $nomComp;
        $this->quantite = $quantite;
    }
    public function getIdCompoSakafo(){
        return $this->idCompoSakafo;
    }
    public function setIdCompoSakafo($idCompoSakafo){
        $this->idCompoSakafo = $idCompoSakafo;
    }
    public function getIdSakafo(){
        return $this->idSakafo;
    }
    public function setIdSakafo($idSakafo){
        $this->idSakafo = $idSakafo;
    }
    public function getNomComp(){
        return $this->nomComp;
    }
    public function setNomComp($nomComp){
        $this->nomComp = $nomComp;
    }
    public function getQuantite(){
        return $this->quantite;
    }
    public function setQuantite($quantite){
        $this->quantite = $quantite;
    }
    public function insertData()
    {
        $data = array(
            'idCompoSakafo' => $this->idCompoSakafo,
            'idSakafo' => $this->idSakafo,
            'nomComp' => $this->nomComp,
            'quantite' => $this->quantite
        );

        $this->db->insert('CompoSakafo', $data);
    }
    public function getDonne(){
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
}

?>