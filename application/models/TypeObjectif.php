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
                $typeObjectf = new Objectif();
                $typeObjectf->setIdObjectif($row->idObjectif);
                $typeObjectf->setIdTypeObjectif($row->idTypeObjectif);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
        }
        public function insertDonne()
        {
            $data = array(
                'idTypeObjectif' => $this->getIdTypeObjectif(),
                'nom' => $this->getNom()
            );
            $this->db->insert('typeObjectif', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('typeObjectif');
            $results = array();

            foreach ($query->result() as $row) {
                $typeObjectf = new TypeObjectif();
                $typeObjectf->setIdTypeObjectif($row->idTypeObjectif);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
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