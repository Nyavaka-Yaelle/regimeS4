<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Formater extends CI_Model
    {
        public function format($nb) {
            return number_format($nb, 0, ',', ' ');
        }
    }  
?>