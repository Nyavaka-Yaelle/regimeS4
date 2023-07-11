<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Utilisateur extends CI_Model
    {
        private $idUtilisateur;
        private $nom;
        private $email;
        private $motDePasse;
        private $identification;

        public function getRegimeJournalier()
        {
            $this->db->where('idRegime',$this->getRegime()->getIdRegime());
            $query = $this->db->get('RegimeJournalier');
            $result = array();
            foreach ($query->result() as $row) {
                $RegimeJournalier = new RegimeJournalier();
                $RegimeJournalier->setIdRegimeJournalier($row->idRegimeJournalier);
                $RegimeJournalier->setIdRegime($row->idRegime);
                $RegimeJournalier->setNumeroJour($row->numeroJour);
                $RegimeJournalier->setIdSakafo($row->idSakafo);
                $RegimeJournalier->setIdActivite($row->idActivite);
                $result[] =  $RegimeJournalier;
            }
            return $result;
        }
        public function getRegime()
        {
            $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('Regime');
            $Regime = new Regime();
            foreach ($query->result() as $row) {
                $Regime->setIdRegime($row->idRegime);
                $Regime->setIdUtilisateur($row->idUtilisateur);
                $Regime->setDebutRegime($row->debutRegime);
                $Regime->setFinRegime($row->finRegime);
                return  $Regime;
            }
            return null;
        }

        public function creationRegime(){
            date_default_timezone_set('Africa/Nairobi');
            $currentDate = date('Y-m-d');
            $futureDate = date('Y-m-d', strtotime('+7 days'));
            $regime = new Regime(null,$this->getIdUtilisateur(),$currentDate,$futureDate);
            $idRegime = $regime->insertDonne();
            $typeObjectif = $this->getTypeObjectif();
            $enchanement = $typeObjectif->getTypeEnchainement()->getEnchainement();
            $sakafo = $typeObjectif->getTypeSakafo()->getSakafo();
            for ($i=0; $i < 7; $i++) { 
                $activiter = new Activite(null,$typeObjectif->getNom());
                $idActiviter = $activiter->insertDonne();
                for ($j=0; $j < count($enchanement); $j++) { 
                    $activiteEnchainement = new ActiviteEnchainement(null,$idActiviter,$enchanement[$j]->getIdEnchainement());
                    $activiteEnchainement->insertDonne();
                }
                $temp = $sakafo[$i % count($sakafo)];
                $regimeJournalier = new RegimeJournalier(null,$idRegime,$i,$temp->getIdSakafo(),$idActiviter);
                $regimeJournalier->insertDonne();
            }
        }
        public function isEmailUnique() {
            $this->db->where('email', $this->email);
            $query = $this->db->get('Utilisateur');
            return $query->num_rows() == 0;
        }
        public function isNomUnique() {
            $this->db->where('nom', $this->nom);
            $query = $this->db->get('Utilisateur');
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
        public function getTypeObjectif(){
            $objectif = new Objectif($this->getObjectifUtilisateur()->getIdObjectif());
            $objectif = $objectif->getDonneById();
            $query = $this->db->where('idTypeObjectif',$objectif->getIdTypeObjectif());
            $query = $this->db->get('TypeObjectif');
            $TypeObjectif = new TypeObjectif();
            foreach ($query->result() as $row) {
                $TypeObjectif->setIdTypeObjectif($row->idTypeObjectif);
                $TypeObjectif->setNom($row->nom);
                return  $TypeObjectif;
            }
            return null;
        }
        public function getProteFeuille()
        {
            $this->db->where('idUtilisateur',$this->getIdUtilisateur())
            $query = $this->db->get('PorteFeuille');
            foreach ($query->result() as $row) {
                $PorteFeuille = new PorteFeuille();
                $PorteFeuille->setIdPorteFeuille($row->idPorteFeuille);
                $PorteFeuille->setIdUtilisateur($row->idUtilisateur);
                $PorteFeuille->setMontant($row->montant);
                return $PorteFeuille;
            }
            return null;
        }
        public function getObjectifUtilisateurs()
        {
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('ObjectifUtilisateur');
            $result = array();
            foreach ($query->result() as $row) {
                $ObjectifUtilisateur = new ObjectifUtilisateur();
                $ObjectifUtilisateur->setIdObjectifUtilisateur($row->idObjectifUtilisateur);
                $ObjectifUtilisateur->setIdUtilisateur($row->idUtilisateur);
                $ObjectifUtilisateur->setIdObjectif($row->idObjectif);
                $result[] = $ObjectifUtilisateur;
            }
            return $result;
        }
        public function getObjectifUtilisateur()
        {
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('ObjectifUtilisateur');
            $result = array();
            foreach ($query->result() as $row) {
                $ObjectifUtilisateur = new ObjectifUtilisateur();
                $ObjectifUtilisateur->setIdObjectifUtilisateur($row->idObjectifUtilisateur);
                $ObjectifUtilisateur->setIdUtilisateur($row->idUtilisateur);
                $ObjectifUtilisateur->setIdObjectif($row->idObjectif);
                return $ObjectifUtilisateur;
            }
            return null;
        }
        public function getProfile()
        {
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('Profiles');
            $Utilisateur = new Utilisateur();
            foreach ($query->result() as $row) {
                
                $Profiles = new Profiles();
                $Profiles->setIdProfiles($row->idProfiles);
                $Profiles->setIdUtilisateur($row->idUtilisateur);
                $Profiles->setGenre($row->genre);
                $Profiles->setTaille($row->taille);
                $Profiles->setPoids($row->poids);
                $Profiles->setDateNaissance($row->dateNaissance);
                return $Profiles;
            }
            return null;
        }
        public function getUtilisateur()
        {
            $query = $this->db->where('idUtilisateur',$this->getIdUtilisateur());
            $query = $this->db->get('Utilisateur');
            $Utilisateur = new Utilisateur();
            foreach ($query->result() as $row) {
                
                $Utilisateur->setIdUtilisateur($row->idUtilisateur);
                $Utilisateur->setNom($row->nom);
                $Utilisateur->setEmail($row->email);
                $Utilisateur->setMotDePasse($row->motDePasse);
                $Utilisateur->setIdentification($row->identification);
                return $Utilisateur;
            }
            return null;
        }
        public function getDonne()
        {
            $query = $this->db->get('Utilisateur');
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
            $query = $this->db->get('Utilisateur');

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

        public function insertObjectifUtilisateur($listObjectif){
            foreach ($listObjectif as $objectif) {
                $id = $objectif->getIdObjectif();
                $ObjectifUtilisateur = new ObjectifUtilisateur(null,$this->idUtilisateur,$id);
                $ObjectifUtilisateur->insertDonne();
            }
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