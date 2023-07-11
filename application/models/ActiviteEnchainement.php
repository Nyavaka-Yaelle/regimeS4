<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class ActiviteEnchainement extends CI_Model
    {
        private $idActiviteEnchainement;
        private $idActivite;
        private $idEnchainement;

        public function insertDonne()
        {
            $data = array(
                'idActiviteEnchainement' => $this->getIdActiviteEnchainement(),
                'idActivite' => $this->getIdActivite(),
                'idEnchainement' => $this->getIdEnchainement()
            );
            $this->db->insert('ActiviteEnchainement', $data);
            return $this->db->insert_id();
        }
        public function getEnchainement(){
            $this->db->where('idEnchainement',$this->getIdEnchainement());
            $query = $this->db->get('Enchainement');
            foreach ($query->result() as $row) {
                $Enchainement = new Enchainement();
                $Enchainement->setIdEnchainement($row->idEnchainement);
                $Enchainement->setIdTypeEnchainement($row->idTypeEnchainement);
                $Enchainement->setNom($row->nom);
                $Enchainement->setDuree($row->duree);
                return $Enchainement;
            }
            return null;
        }
        public function getEnchainementsByIdActivite()
        {
            $this->db->where('idActivite',$this->getIdActivite());
            $query = $this->db->get('ActiviteEnchainement');
            $results = array();
            foreach ($query->result() as $row) {
                $enchainement = new Enchainement($row->idEnchainement,null,null,null);
                $enchainement = $enchainement->getDonneById();
                $results[] = $enchainement;
            }
            return $results;
        }
        public function getDonne()
        {
            $query = $this->db->get('ActiviteEnchainement');
            $results = array();

            foreach ($query->result() as $row) {
                $ActiviteEnchainement = new ActiviteEnchainement();
                $ActiviteEnchainement->setIdActiviteEnchainement($row->idActiviteEnchainement);
                $ActiviteEnchainement->setIdActivite($row->idActivite);
                $ActiviteEnchainement->setIdEnchainement($row->idEnchainement);
                $results[] = $ActiviteEnchainement;
            }
            return $results;
        }

        public function __construct($idActiviteEnchainement = null,$idActivite = null, $idEnchainement = null){
            $this->setIdActiviteEnchainement($idActiviteEnchainement);
            $this->setIdActivite($idActivite);
            $this->setIdEnchainement($idEnchainement);
        }
        public function setIdActiviteEnchainement($idActiviteEnchainement){
            $this->idActiviteEnchainement = $idActiviteEnchainement;
        }
        public function getIdActiviteEnchainement(){
            return $this->idActiviteEnchainement;
        }
        public function setIdActivite($idActivite){
            $this->idActivite = $idActivite;
        }
        public function getIdActivite(){
            return $this->idActivite;
        }
        public function setIdEnchainement($idEnchainement){
            $this->idEnchainement = $idEnchainement;
        }
        public function getIdEnchainement(){
            return $this->idEnchainement;
        }
    }
?>