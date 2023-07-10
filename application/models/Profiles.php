<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Profiles extends CI_Model
{
    private $idProfiles;
    private $idUtilisateur;
    private $genre;
    private $taille;
    private $poids;
    private $dateNaissance;

    public function getDonne()
    {
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
    public function insertDonne()
    {
        $data = array(
            'idProfiles' => $this->getIdProfiles(),
            'idUtilisateur' => $this->getIdUtilisateur(),
            'genre' => $this->getGenre(),
            'taille' => $this->getTaille(),
            'poids' => $this->getPoids(),
            'dateNaissance' => $this->getDateNaissance()
        );

        $this->db->insert('Profiles', $data);
        return $this->db->insert_id();
    }

    public function __construct($idProfiles = null, $idUtilisateur = null, $genre = null, $taille = null, $poids = null, $dateNaissance = null){
        $this->idProfiles = $idProfiles;
        $this->idUtilisateur = $idUtilisateur;
        $this->genre = $genre;
        $this->taille = $taille;
        $this->poids = $poids;
        $this->dateNaissance = $dateNaissance;
    }
    public function getIdProfiles(){
        return $this->idProfiles;
    }
    public function setIdUtilisateur($idProfiles){
        $this->idProfiles = $idProfiles;
    }
    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function setIdUtilisateur($idUtilisateur){
        $this->idUtilisateur = $idUtilisateur;
    }
    public function getGenre(){
        return $this->genre;
    }
    public function setGenre($genre){
        if($genre=='1' || $genre=='0')
        {
            $this->genre = $genre;
        }
    }
    public function getTaille(){
        return $this->taille;
    }
    public function setTaille($taille){
        if($taille>0 && $taille<5)
        {
            $this->taille = $taille;
        }
        return 'Taille invalide';
    }
    public function getPoids(){
        return $this->poids;
    }
    public function setPoids($poids){
        if($poids>0)
        {
            $this->poids = $poids;
        }
    }
    public function getDateNaissance(){
        return $this->dateNaissance;
    }
    public function setDateNaissance($dateNaissance){
        $this->dateNaissance = $dateNaissance;
    }
}
?>