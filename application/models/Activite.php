<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Activite extends CI_Model
    {
        private $idActivite;
        private $nom;

        public function getActiviterEnchainement(){
            $this->db->where('idActivite', $this->getIdActivite());
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
        public function getDonneById()
        {
            $query = $this->db->where('idActivite',$this->getIdActivite());
            $query = $this->db->get('Activite');
            foreach ($query->result() as $row) {
                $activite = new Activite();
                $activite->setIdActivite($row->idActivite);
                $activite->setNom($row->nom);
                return $activite;
            }
            return null;
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