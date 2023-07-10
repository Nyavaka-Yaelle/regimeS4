<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Objectif extends CI_Model
    {
        private $idObjectif;
        private $nom;

        public function insertDonne()
        {
            $data = array(
                'idObjectif' => $this->getIdObjectif(),
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
                $typeObjectf = new Objectif();
                $typeObjectf->setIdObjectif($row->idObjectif);
                $typeObjectf->setNom($row->nom);
                $results[] = $typeObjectf;
            }
            return $results;
        }

        public function __construct($idObjectif = null, $nom = null){
            $this->setIdObjectif($idObjectif);
            $this->setNom($nom);
        }
        public function setIdObjectif($idObjectif){
            $this->idObjectif = $idObjectif;
        }
        public function getIdObjectif(){
            return $this->idObjectif;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
    }
?>