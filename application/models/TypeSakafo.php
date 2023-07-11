<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class TypeSakafo extends CI_Model
    {
        private $idTypeSakafo;
        private $nom;
        private $idTypeObjectif;

        public function insertDonne()
        {
            $data = array(
                'idTypeSakafo' => $this->getIdTypeSakafo(),
                'nom' => $this->getNom(),
                'idTypeObjectif' => $this->getIdTypeObjectif()
            );
            $this->db->insert('TypeSakafo', $data);
            return $this->db->insert_id();
        }
        public function getSakafo()
        {
            $this->db->where('idTypeSakafo',$this->getIdTypeSakafo());
            $query = $this->db->get('Sakafo');
            $results = array();

            foreach ($query->result() as $row) {
                $Sakafo = new Sakafo();
                $Sakafo->setIdSakafo($row->idSakafo);
                $Sakafo->setIdTypeSakafo($row->idTypeSakafo);
                $Sakafo->setNom($row->nom);
                $Sakafo->setPrix($row->prix);
                $results[] = $Sakafo;
            }
            return $results;
        }
        public function getDonne()
        {
            $query = $this->db->get('TypeSakafo');
            $results = array();

            foreach ($query->result() as $row) {
                $TypeSakafo = new TypeSakafo();
                $TypeSakafo->setIdTypeSakafo($row->idTypeSakafo);
                $TypeSakafo->setNom($row->nom);
                $TypeSakafo->setIdTypeObjectif($row->idTypeObjectif);
                $results[] = $TypeSakafo;
            }
            return $results;
        }
        public function getDonneById()
        {
            $this->db->where('idTypeSakafo', $this->getIdTypeSakafo());
            $query = $this->db->get('TypeSakafo');
            $results = array();

            foreach ($query->result() as $row) {
                $TypeSakafo = new TypeSakafo();
                $TypeSakafo->setIdTypeSakafo($row->idTypeSakafo);
                $TypeSakafo->setNom($row->nom);
                $TypeSakafo->setIdTypeObjectif($row->idTypeObjectif);
                return $TypeSakafo;
            }
            return null;
        }
        public function __construct($idTypeSakafo = null, $nom = null, $idTypeObjectif = null){
            $this->setIdTypeSakafo($idTypeSakafo);
            $this->setNom($nom);
            $this->setIdTypeObjectif($idTypeObjectif);
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
        public function setIdTypeObjectif($idTypeObjectif){
            $this->idTypeObjectif = $idTypeObjectif;
        }
        public function getIdTypeObjectif(){
            return $this->idTypeObjectif;
        }
        public function getTypeObjectif(){
            $typeObjectif = new TypeObjectif($this->getIdTypeObjectif(),null);
            return $typeObjectif->getDonneById();
        }
    }
?>