<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeObjectif extends CI_Model
    {
        private $idTypeObjectif;
        private $nom;

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