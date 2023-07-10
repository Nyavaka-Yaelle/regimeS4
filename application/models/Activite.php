<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Activite extends CI_Model
    {
        private $idActivite;
        private $nom;

        public function insertDonne()
        {
            $data = array(
                'idActivite' => $this->getIdActivite(),
                'nom' => $this->getNom()
            );
            $this->db->insert('Activite', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('Activite');
            $results = array();

            foreach ($query->result() as $row) {
                $Activite = new Activite();
                $Activite->setIdActivite($row->idActivite);
                $Activite->setNom($row->nom);
                $results[] = $Activite;
            }
            return $results;
        }

        public function __construct($idActivite = null, $nom = null){
            $this->setIdActivite($idActivite);
            $this->setNom($nom);
        }
        public function setIdActivite($idActivite){
            $this->idActivite = $idActivite;
        }
        public function getIdActivite(){
            return $this->idActivite;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
    }
?>