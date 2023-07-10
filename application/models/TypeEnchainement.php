<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeEnchainement extends CI_Model
    {
        private $idTypeEnchainement;
        private $nom;

        public function insertDonne()
        {
            $data = array(
                'idTypeEnchainement' => $this->getIdTypeEnchainement(),
                'nom' => $this->getNom()
            );
            $this->db->insert('TypeEnchainement', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('TypeEnchainement');
            $results = array();

            foreach ($query->result() as $row) {
                $typeObjectf = new TypeEnchainement();
                $typeObjectf->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
        }
        public function getDonneById()
        {
            $this->db->where('idTypeEnchainement', $this->getIdTypeEnchainement());
            $query = $this->db->get('TypeEnchainement');
            foreach ($query->result() as $row) {
                $typeObjectf = new TypeEnchainement();
                $typeObjectf->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeObjectf->setNom($row->nom);
                return $typeObjectf;
            }
            return null;
        }

        public function __construct($idTypeEnchainement = null, $nom = null){
            $this->setIdTypeEnchainement($idTypeEnchainement);
            $this->setNom($nom);
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
    }
?>