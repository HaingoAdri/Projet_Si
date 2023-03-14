<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Compte_M extends CI_Model {

        public $id;
        public $nom_cause;
        public function _construct($nom_cause=""){
            parent::_construct();
            $this->nom_cause = $nom_cause;
        }
        public function listeCompte() {
            $requette = "select * from compte order by num_compte asc";
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id_compte'] = $row['id_compte']; 
                $typeS['id_entreprise'] = $row['id_entreprise'];
                $typeS['nom_categorie'] = $row['nom_categorie'];
                $typeS['num_compte'] = $row['num_compte'];
                $typeS['nom_compte'] = $row['nom_compte'];
                $tab[] = $typeS;
            }
            return $tab;
        }
       
    }
?>