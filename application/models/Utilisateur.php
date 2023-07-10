<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Utilisateur extends CI_Model
    {
        private $idUtilisateur;
        private $nom;
        private $email;
        private $motDePasse;
        private $identification;


        public function isEmailUnique() {
            $this->db->where('email', $this->email);
            $query = $this->db->get('utilisateur');
            return $query->num_rows() == 0;
        }
        public function isNomUnique() {
            $this->db->where('nom', $this->nom);
            $query = $this->db->get('utilisateur');
            return $query->num_rows() == 0;
        }
        public function singUp($mdp,$mdp2){
            if($mdp == $mdp2)
            {
                if($this->isEmailUnique()){
                    if($this->isNomUnique()){
                        $this->insertDonne();
                        return true;
                    }else{
                        return "Nom deja utiliser";
                    }
                }else{
                    return "Email deja utiliser";
                }
            }else{
                return "mot de passe non identique";
            }
        }
        public function getUtilisateur()
        {
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('utilisateur');
            $results = array();

            foreach ($query->result() as $row) {
                $Utilisateur = new Utilisateur();
                $Utilisateur->setIdUtilisateur($row->idUtilisateur);
                $Utilisateur->setNom($row->nom);
                $Utilisateur->setEmail($row->email);
                $Utilisateur->setMotDePasse($row->motDePasse);
                $Utilisateur->setIdentification($row->identification);
                $results[] = $Utilisateur;
            }
            return $results;
        }
        public function getDonne()
        {
            $query = $this->db->get('utilisateur');
            $results = array();

            foreach ($query->result() as $row) {
                $Utilisateur = new Utilisateur();
                $Utilisateur->setIdUtilisateur($row->idUtilisateur);
                $Utilisateur->setNom($row->nom);
                $Utilisateur->setEmail($row->email);
                $Utilisateur->setMotDePasse($row->motDePasse);
                $Utilisateur->setIdentification($row->identification);
                $results[] = $Utilisateur;
            }
            return $results;
        }
        public function login()
        {
            $this->db->where('email', $this->getEmail());
            $this->db->where('motDePasse', $this->getMotDePasse());
            $query = $this->db->get('utilisateur');

            foreach ($query->result() as $row) {
                $Utilisateur = new Utilisateur();
                $Utilisateur->setIdUtilisateur($row->idUtilisateur);
                $Utilisateur->setNom($row->nom);
                $Utilisateur->setEmail($row->email);
                $Utilisateur->setMotDePasse($row->motDePasse);
                $Utilisateur->setIdentification($row->identification);
                return $Utilisateur;
            }
            return null;
        }
        public function insertDonne()
        {
            $data = array(
                'idUtilisateur' => $this->getIdUtilisateur(),
                'nom' => $this->getNom(),
                'email' => $this->getEmail(),
                'motDePasse' => $this->getMotDePasse(),
                'identification' => $this->getIdentification()
            );

            $this->db->insert('Utilisateur', $data);
            return $this->db->insert_id();
        }

        public function __construct($idUtilisateur = null, $nom = null, $email = null, $motDePasse = null, $identification = null){
            $this->idUtilisateur = $idUtilisateur;
            $this->nom = $nom;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->identification = $identification;
        }
        public function getIdUtilisateur(){
            return $this->idUtilisateur;
        }
        public function setIdUtilisateur($idUtilisateur){
            $this->idUtilisateur = $idUtilisateur;
        }
        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getMotDePasse(){
            return $this->motDePasse;
        }
        public function setMotDePasse($motDePasse){
            $this->motDePasse = $motDePasse;
        }
        public function getIdentification(){
            return $this->identification;
        }
        public function setIdentification($identification){
            $this->identification = $identification;
        }
    }

    
?>