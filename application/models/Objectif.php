<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Objectif extends CI_Model
    {
        private $idObjectif;
        private $idTypeObjectif;
        private $nom;

        public function insertDonne()
        {
            $data = array(
                'idObjectif' => $this->getIdObjectif(),
                'idTypeObjectif' => $this->getIdTypeObjectif(),
                'nom' => $this->getNom()
            );
            $this->db->insert('Objectif', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('Objectif');
            $results = array();

            foreach ($query->result() as $row) {
                $typeObjectif = new Objectif();
                $typeObjectif->setIdObjectif($row->idObjectif);
                $typeObjectif->setIdTypeObjectif($row->idTypeObjectif);
                $typeObjectif->setNom($row->nom);
                $results[] = $typeObjectif;
            }
            return $results;
        }

        public function __construct($idObjectif = null, $idTypeObjectif = null, $nom = null){
            $this->setIdObjectif($idObjectif);
            $this->setIdTypeObjectif($idTypeObjectif);
            $this->setNom($nom);
        }
        public function setIdObjectif($idObjectif){
            $this->idObjectif = $idObjectif;
        }
        public function getIdObjectif(){
            return $this->idObjectif;
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