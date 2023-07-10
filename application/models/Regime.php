<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Regime extends CI_Model
{
    private $idRegime;
    private $idUtilisateur;
    private $debutRegime;
    private $finRegime;
   
    public function getDonne()
    {
        $query = $this->db->get('Regime');
        $results = array();
        foreach ($query->result() as $row) {
            $Regime = new Regime();
            $Regime->setIdRegime($row->idRegime);
            $Regime->setIdUtilisateur($row->idUtilisateur);
            $Regime->setDebutRegime($row->debutRegime);
            $Regime->setFinRegime($row->finRegime);
            $results[] = $Regime;
        }
        return $results;
    }
    public function insertDonne()
    {
        $data = array(
            'idRegime' => $this->getIdRegime(),
            'idUtilisateur' => $this->getIdUtilisateur(),
            'debutRegime' => $this->getDebutRegime(),
            'finRegime' => $this->getFinRegime()
        );
        $this->db->insert('Regime', $data);
        return $this->db->insert_id();
    }

    public function __construct($idRegime = null, $idUtilisateur = null, $debutRegime = null, $finRegime = null){
        $this->setIdRegime($idRegime);
        $this->setIdUtilisateur($idUtilisateur);
        $this->setDebutRegime($debutRegime);
        $this->setFinRegime($finRegime);
    }
    public function getIdRegime(){
        return $this->idRegime;
    }
    public function setIdRegime($idRegime){
        $this->idRegime = $idRegime;
    }
    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function setIdUtilisateur($idUtilisateur){
        $this->idUtilisateur = $idUtilisateur;
    }
    public function getDebutRegime(){
        return $this->debutRegime;
    }
    public function setDebutRegime($debutRegime){
        $this->debutRegime = $debutRegime;
    }
    public function getFinRegime(){
        return $this->finRegime;
    }
    public function setFinRegime($finRegime){
        $this->finRegime = $finRegime;
    }
}
?>