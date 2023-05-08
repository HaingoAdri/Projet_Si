<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Centre_Model extends CI_Model {
        public $idCentre;
        public $Intitule;
        public $idEntreprise;

        public function __construct($idCentre = "",$Intitule = "", $idEntreprise = "") {
            parent::__construct();
            $this->idCentre = $idCentre;
            $this->Intitule = $Intitule;
            $this->idEntreprise = $idEntreprise;
        }

        public function insert() {
            $data = array(
                'intitule' => $this->Intitule,
                'identreprise' => $this->idEntreprise
            );            
            $this->db->insert('centre', $data);
        }

        public function listeCentre($idEntreprise) {
            $this->db->order_by('idcentre', 'asc');
            $conditions = array(
                'identreprise' => $idEntreprise            ); 
            $query = $this->db->get_where('centre', $conditions);

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $centre = new Centre_Model("".$liste[$i]->idcentre, "".$liste[$i]->intitule, "".$liste[$i]->identreprise);     
                    //$compte->exist = $liste[$i]->exist;
                    $liste2[] = $centre;
                }
            }
            return $liste2;
        }

    }
?>