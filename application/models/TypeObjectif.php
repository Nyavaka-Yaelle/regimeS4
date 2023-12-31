<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeObjectif extends CI_Model
    {
        private $idTypeObjectif;
        private $nom;

        public function getTypeSakafo(){
            $query = $this->db->where('idTypeObjectif',$this->getIdTypeObjectif());
            $query = $this->db->get('TypeSakafo');
            $TypeSakafo = new TypeSakafo();
            foreach ($query->result() as $row) {
                $TypeSakafo->setIdTypeSakafo($row->idTypeSakafo);
                $TypeSakafo->setNom($row->nom);
                $TypeSakafo->setIdTypeObjectif($row->idTypeObjectif);
                return $TypeSakafo;
            }
            return null;
        }
        public function getTypeEnchainement(){
            $query = $this->db->where('idTypeObjectif',$this->getIdTypeObjectif());
            $query = $this->db->get('TypeEnchainement');
            $typeEnchainement = new TypeEnchainement();
            foreach ($query->result() as $row) {
                $typeEnchainement->setIdTypeEnchainement($row->idTypeEnchainement);
                $typeEnchainement->setNom($row->nom);
                $typeEnchainement->setIdTypeObjectif($row->idTypeObjectif);
                return $typeEnchainement;
            }
            return null;
        }
        public function getObjectif(){
            $query = $this->db->where('idTypeObjectif', $this->getIdTypeObjectif());
            $query = $this->db->get('Objectif');
            $results = array();
            foreach ($query->result() as $row) {
                $TypeObjectif = new Objectif();
                $TypeObjectif->setIdObjectif($row->idObjectif);
                $TypeObjectif->setIdTypeObjectif($row->idTypeObjectif);
                $TypeObjectif->setNom($row->nom);
                $results[] = $TypeObjectif;
            }
            return $results;
        }
        public function insertDonne()
        {
            $data = array(
                'idTypeObjectif' => $this->getIdTypeObjectif(),
                'nom' => $this->getNom()
            );
            $this->db->insert('TypeObjectif', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('TypeObjectif');
            $results = array();

            foreach ($query->result() as $row) {
                $TypeObjectif = new TypeObjectif();
                $TypeObjectif->setIdTypeObjectif($row->idTypeObjectif);
                $TypeObjectif->setNom($row->nom);
                $results[] = $TypeObjectif;
            }
            return $results;
        }

        public function getDonneById(){
            $query = $this->db->where('idTypeObjectif', $this->getIdTypeObjectif());
            $query = $this->db->get('TypeObjectif');
            $TypeObjectif = new TypeObjectif();
            foreach ($query->result() as $row) {
                $TypeObjectif->setIdTypeObjectif($row->idTypeObjectif);
                $TypeObjectif->setNom($row->nom);
                return $TypeObjectif;
            }
            return null;
        }

        public function __construct($idTypeObjectif = null, $nom = null){
            $this->setIdTypeObjectif($idTypeObjectif);
            $this->setNom($nom);
        }
        public function setIdTypeObjectif($idTypeObjectif){
            $this->idTypeObjectif = $idTypeObjectif;
        }
        public function getIdTypeObjectif(){
            return $this->idTypeObjectif;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
    }
?>