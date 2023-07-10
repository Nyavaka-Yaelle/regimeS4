<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Carte extends CI_Model
{
    private $idCarte;
    private $code;
    private $montant;
   
    public function getDonne()
    {
        $query = $this->db->get('Carte');
        $results = array();

        foreach ($query->result() as $row) {
            $Carte = new Carte();
            $Carte->setIdCarte($row->idCarte);
            $Carte->setCode($row->code);
            $Carte->setMontant($row->montant);
            $results[] = $Carte;
        }
        return $results;
    }
    public function insertDonne()
    {
        $data = array(
            'idCarte' => $this->getIdCarte(),
            'code' => $this->getCode(),
            'montant' => $this->getMontant()
        );
        $this->db->insert('Carte', $data);
        return $this->db->insert_id();
    }

    public function __construct($idCarte = null, $code = null, $montant = null){
        $this->setIdCarte($idCarte);
        $this->setCode($code);
        $this->setMontant($montant);
    }
    public function getIdCarte(){
        return $this->idCarte;
    }
    public function setIdCarte($idCarte){
        $this->idCarte = $idCarte;
    }
    public function getCode(){
        return $this->code;
    }
    public function setCode($code){
        $this->code = $code;
    }
    public function getMontant(){
        return $this->montant;
    }
    public function setMontant($montant){
        if($montant>0)
        {
            $this->montant = $montant;
        }
    }
}
?>