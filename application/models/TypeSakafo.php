<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeSakafo extends CI_Model
    {
        private $idTypeSakafo;
        private $nom;

        public function insertDonne()
        {
            $data = array(
                'idTypeSakafo' => $this->getIdTypeSakafo(),
                'nom' => $this->getNom()
            );
            $this->db->insert('TypeSakafo', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('TypeSakafo');
            $results = array();

            foreach ($query->result() as $row) {
                $TypeSakafo = new TypeSakafo();
                $TypeSakafo->setIdTypeSakafo($row->idTypeSakafo);
                $TypeSakafo->setNom($row->nom);
                $results[] = $TypeSakafo;
            }
            return $results;
        }

        public function __construct($idTypeSakafo = null, $nom = null){
            $this->setIdTypeSakafo($idTypeSakafo);
            $this->setNom($nom);
        }
        public function setIdTypeSakafo($idTypeSakafo){
            $this->idTypeSakafo = $idTypeSakafo;
        }
        public function getIdTypeSakafo(){
            return $this->idTypeSakafo;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
    }
?>