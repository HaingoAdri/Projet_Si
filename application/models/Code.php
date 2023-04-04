<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Code extends CI_Model {
        public $id;
        public $idEntreprise;
        public $code;
        public $intitule;
        public $exist;

        public function __construct($id = "",$idEntreprise = "", $code = "", $intitule = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->code = $code;
            $this->intitule = $intitule;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'code' => $this->code,
                'intitule' => $this->intitule
            );            
            $this->db->insert('code', $data);
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('code', $data);
        }

        public function listeCode($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('code');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $code = new Code("".$liste[$i]->id, "".$liste[$i]->identreprise, "".$liste[$i]->code, "".$liste[$i]->intitule);     
                    $code->exist = $liste[$i]->exist;
                    $liste2[] = $code;
                }
            }
            return $liste2;
        }

        public function getOneCode($code,$idEntreprise){
            $requette = "select * from code where code = '".$code."' and idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }

        public function updateCode() {
            $data = array(
                'code' => $this->code,
                'intitule' => $this->intitule
            );  
            $this->db->where('id', $this->id); 
            $this->db->update('code', $data); 
            
        }

        public function donneesUnCompte($id) {
            $this->db->where('id', $id); 
            $query = $this->db->get('code'); 
            $code = new Code();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $code = new Code("".$liste[0]->id, "".$liste[0]->identreprise, "".$liste[0]->code, "".$liste[0]->intitule);     
                $code->exist = $liste[0]->exist;
            }

            return $code;
        }

        


    }
?>

<!-- checkdate(int month, day, hear) -->
