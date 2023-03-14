<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Code_Journaux extends CI_Model {

        public $id;
        public $nom_cause;
        public function _construct($nom_cause=""){
            parent::_construct();
            $this->nom_cause = $nom_cause;
        }
        public function listeCode() {
            $requette = "select * from code";
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['nom'] = $row['nom'];
                $tab[] = $typeS;
            }
            return $tab;
        }
       
    }
?>