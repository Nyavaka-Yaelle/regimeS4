<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class PorteFeuille extends CI_Model
    {
        private $idPorteFeuille;
        private $idUtilisateur;
        private $montant;

        public function insertDonne()
        {
            $data = array(
                'idPorteFeuille' => $this->getIdPorteFeuille(),
                'idUtilisateur' => $this->getIdUtilisateur(),
                'montant' => $this->getMontant()
            );
            $this->db->insert('PorteFeuille', $data);
            return $this->db->insert_id();
        }
        public function updateDonne()
        {
            $data = array(
                'montant' => $this->getMontant()
            );
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            if($this->db->update('PorteFeuille', $data)) return true;
            else return false;
        }
        public function getDonne()
        {
            $query = $this->db->get('PorteFeuille');
            $results = array();

            foreach ($query->result() as $row) {
                $PorteFeuille = new PorteFeuille();
                $PorteFeuille->setIdPorteFeuille($row->idPorteFeuille);
                $PorteFeuille->setIdUtilisateur($row->idUtilisateur);
                $PorteFeuille->setMontant($row->montant);
                $results[] = $PorteFeuille;
            }
            return $results;
        }

        public function __construct($idPorteFeuille = null,$idUtilisateur = null, $montant = null){
            $this->setIdPorteFeuille($idPorteFeuille);
            $this->setIdUtilisateur($idUtilisateur);
            $this->setMontant($montant);
        }
        public function setIdPorteFeuille($idPorteFeuille){
            $this->idPorteFeuille = $idPorteFeuille;
        }
        public function getIdPorteFeuille(){
            return $this->idPorteFeuille;
        }
        public function setIdUtilisateur($idUtilisateur){
            $this->idUtilisateur = $idUtilisateur;
        }
        public function getIdUtilisateur(){
            return $this->idUtilisateur;
        }
        public function setMontant($montant){
            $this->montant = $montant;
        }
        public function getMontant(){
            return $this->montant;
        }
    }
?>