<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeEnchainement extends CI_Model
    {
        private $idTypeEnchainement;
        private $nom;

        public function getEnchainement(){
            $query = $this->db->where('idTypeEnchainement', $this->getIdTypeEnchainement());
            $query = $this->db->get('Enchainement');
            $results = array();
            foreach ($query->result() as $row) {
                $typeObjectf = new Enchainement();
                $typeObjectf->setIdEnchainement($row->idEnchainement);
                $typeObjectf->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
        }
        public function insertDonne()
        {
            $data = array(
                'idTypeEnchainement' => $this->getIdTypeEnchainement(),
                'nom' => $this->getNom()
            );
            $this->db->insert('typeEnchainement', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('typeEnchainement');
            $results = array();

            foreach ($query->result() as $row) {
                $typeObjectf = new TypeEnchainement();
                $typeObjectf->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
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