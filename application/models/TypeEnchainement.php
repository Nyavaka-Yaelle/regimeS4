<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeEnchainement extends CI_Model
    {
        private $idTypeEnchainement;
        private $nom;
        private $idTypeObjectif;
        public function deleteDonne()
        {
            $query = $this->db->where('idTypeEnchainement',$this->getIdTypeEnchainement());
            $this->db->delete('TypeEnchainement');
        }
        public function updateDonne()
        {
            $data = array(
                'idTypeEnchainement' => $this->getIdTypeEnchainement(),
                'nom' => $this->getNom(),
                'idTypeObjectif' => $this->getIdTypeObjectif()
            );
            $query = $this->db->where('idTypeEnchainement',$this->getIdTypeEnchainement());
            if($this->db->update('TypeEnchainement', $data))
            {
                return true;
            }
            else{
                return false;
            }
        }
        public function insertDonne()
        {
            $data = array(
                'idTypeEnchainement' => $this->getIdTypeEnchainement(),
                'nom' => $this->getNom(),
                'idTypeObjectif' => $this->getIdTypeObjectif()
            );
            $this->db->insert('TypeEnchainement', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('TypeEnchainement');
            $results = array();

            foreach ($query->result() as $row) {
                $typeEnchainement = new TypeEnchainement();
                $typeEnchainement->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeEnchainement->setNom($row->nom);
                $typeEnchainement->setIdTypeObjectif($row->idTypeObjectif);
                $results[] = $typeEnchainement;
            }
            return $results;
        }
        public function getDonneById()
        {
            $this->db->where('idTypeEnchainement', $this->getIdTypeEnchainement());
            $query = $this->db->get('TypeEnchainement');
            foreach ($query->result() as $row) {
                $typeEnchainement = new TypeEnchainement();
                $typeEnchainement->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeEnchainement->setNom($row->nom);
                $typeEnchainement->setIdTypeObjectif($row->idTypeObjectif);
                return $typeEnchainement;
            }
            return null;
        }

        public function __construct($idTypeEnchainement = null, $nom = null, $idTypeObjectif = null){
            $this->setIdTypeEnchainement($idTypeEnchainement);
            $this->setNom($nom);
            $this->setIdTypeObjectif($idTypeObjectif);
        }
        public function setIdTypeEnchainement($idTypeEnchainement){
            $this->idTypeEnchainement = $idTypeEnchainement;
        }
        public function getIdTypeEnchainement(){
            return $this->idTypeEnchainement;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
        public function setIdTypeObjectif($idTypeObjectif){
            $this->idTypeObjectif = $idTypeObjectif;
        }
        public function getIdTypeObjectif(){
            return $this->idTypeObjectif;
        }
    }
?>