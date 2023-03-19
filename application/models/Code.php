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
            $this->db->order_by('id', 'asc');
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
        


    }
?>