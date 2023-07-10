<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Admin extends Utilisateur
    {
        public function validerCode($Carte, $idUtilisateur)
        {
            $sql = "select idCarte from carte c left join carteValider cv on c.idCarte = cv.idCarte where code = %s ";
            $sql=sprintf($sql,$this->db->escape($Carte->getCode()));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            if(count($row)==0) 
            {
                $CarteValider = new CarteValider(null,$Carte->getIdCarte(),null,$idUtilisateur);
                $CarteValider->insertDonne();
            }
        }
    }
?>