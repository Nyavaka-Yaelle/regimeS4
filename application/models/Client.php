<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');
    class Client extends Utilisateur
    {
        public  function __construct($idUtilisateur = null, $nom = null, $email = null, $motDePasse = null, $identification = null) {
            parent::__construct($idUtilisateur,$nom,$email,$motDePasse,$identification);
        }
        public function insertProfil($genre, $taille, $poids, $dateDeNaissance){
            $profiles = new Profiles(null,$this->getIdUtilisateur(),$genre,$taille,$poids,$dateDeNaissance);
            $profiles->insertDonnee();
        }
        public function insertObjectifUtilisateur($listObjectif){
            foreach ($listObjectif as $objectif) {
                $id = $objectif->insertDonne();
                $ObjectifUtilisateur = new ObjectifUtilisateur(null,$this->idUtilisateur,$id);
                $this->insertDonne();
            }
        }
        public function getDonne()
        {
            $this->db->where('idUtilisateur', $this->getIdUtilisateur());
            $query = $this->db->get('profiles');
            $results = array();

            foreach ($query->result() as $row) {
                $Profiles = new Profiles();
                $Profiles->setIdProfiles($row->idProfiles);
                $Profiles->setIdUtilisateur($row->idUtilisateur);
                $Profiles->setGenre($row->genre);
                $Profiles->setTaille($row->taille);
                $Profiles->setPoids($row->poids);
                $Profiles->setDateNaissance($row->dateNaissance);
                $results[] = $Profiles;
            }
            return $results;
        }
    }
?>