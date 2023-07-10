<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class ObjectifUtilisateur extends CI_Model
    {
        private $idObjectifUtilisateur;
        private $idUtilisateur;
        private $idObjectif;

        public function insertDonne()
        {
            $data = array(
                'idObjectifUtilisateur' => $this->getIdObjectifUtilisateur(),
                'idUtilisateur' => $this->getIdUtilisateur(),
                'idObjectif' => $this->getIdObjectif()
            );
            $this->db->insert('ObjectifUtilisateur', $data);
            return $this->db->insert_id();
        }
        public function getDonne()
        {
            $query = $this->db->get('ObjectifUtilisateur');
            $results = array();

            foreach ($query->result() as $row) {
                $ObjectifUtilisateur = new ObjectifUtilisateur();
                $ObjectifUtilisateur->setIdObjectifUtilisateur($row->idObjectifUtilisateur);
                $ObjectifUtilisateur->setIdUtilisateur($row->idUtilisateur);
                $ObjectifUtilisateur->setIdObjectif($row->idObjectif);
                $results[] = $ObjectifUtilisateur;
            }
            return $results;
        }

        public function __construct($idObjectifUtilisateur = null, $idUtilisateur = null, $idObjectif = null){
            $this->setIdObjectifUtilisateur($idObjectifUtilisateur);
            $this->setIdUtilisateur($idUtilisateur);
            $this->setIdObjectif($idObjectif);
        }
        public function setIdObjectifUtilisateur($idObjectifUtilisateur){
            $this->idObjectifUtilisateur = $idObjectifUtilisateur;
        }
        public function getIdObjectifUtilisateur(){
            return $this->idObjectifUtilisateur;
        }
        public function setIdUtilisateur($idUtilisateur){
            $this->idUtilisateur = $idUtilisateur;
        }
        public function getIdUtilisateur(){
            return $this->idUtilisateur;
        }
        public function setIdObjectif($idObjectif){
            $this->idObjectif = $idObjectif;
        }
        public function getIdObjectif(){
            return $this->idObjectif;
        }
    }
?>