<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Enchainement extends CI_Model
{
    private $idEnchainement;
    private $idTypeEnchainement;
    private $nom;
    private $duree;
    public function deleteDonne()
    {
        $query = $this->db->where('idTypeEnchainement',$this->getIdTypeEnchainement());
        if($this->db->delete('Enchainement')) return true;
        else return false;
    }
    public function getDonne()
    {
        $query = $this->db->get('Enchainement');
        $results = array();
        foreach ($query->result() as $row) {
            $Enchainement = new Enchainement();
            $Enchainement->setIdEnchainement($row->idEnchainement);
            $Enchainement->setIdTypeEnchainement($row->idTypeEnchainement);
            $Enchainement->setNom($row->nom);
            $Enchainement->setDuree($row->duree);
            $results[] = $Enchainement;
        }
        return $results;
    }
    public function insertDonne()
    {
        $data = array(
            'idEnchainement' => $this->getIdEnchainement(),
            'idTypeEnchainement' => $this->getIdTypeEnchainement(),
            'nom' => $this->getNom(),
            'duree' => $this->getDuree()
        );
        $this->db->insert('Enchainement', $data);
        return $this->db->insert_id();
    }

    public function __construct($idEnchainement = null, $idTypeEnchainement = null, $nom = null, $duree = null){
        $this->setIdEnchainement($idEnchainement);
        $this->setIdTypeEnchainement($idTypeEnchainement);
        $this->setNom($nom);
        $this->setDuree($duree);
    }
    public function getIdEnchainement(){
        return $this->idEnchainement;
    }
    public function setIdEnchainement($idEnchainement){
        $this->idEnchainement = $idEnchainement;
    }
    public function getIdTypeEnchainement(){
        return $this->idTypeEnchainement;
    }
    public function getTypeEnchainement(){
        $typeEnchainement = new TypeEnchainement($this->getIdTypeEnchainement(),null);
        return $typeEnchainement->getDonneById();
}
    public function setIdTypeEnchainement($idTypeEnchainement){
        $this->idTypeEnchainement = $idTypeEnchainement;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getDuree(){
        return $this->duree;
    }
    public function setDuree($duree){
        if($duree>0)
        {
            $this->duree = $duree;
        }
    }
}
?>