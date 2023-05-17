<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Centre_Model extends CI_Model {
        public $idCentre;
        public $Intitule;
        public $idEntreprise;
        public $idTypeCentre;
        public $typecentre;

        public function __construct($idCentre = "",$Intitule = "", $idEntreprise = "", $idTypeCentre = "", $typecentre = "") {
            parent::__construct();
            $this->idCentre = $idCentre;
            $this->Intitule = $Intitule;
            $this->idEntreprise = $idEntreprise;
            $this->idTypeCentre = $idTypeCentre;
            $this->typecentre = $typecentre;
        }

        public function insert() {
            $data = array(
                'intitule' => $this->Intitule,
                'identreprise' => $this->idEntreprise,
                'idtypecentre' => $this->idTypeCentre
            );            
            $this->db->insert('centre', $data);
        }

        public function listeTypeCentre(){
            $requette = "select * from typecentre";
            $query = $this->db->query($requette);            
            $tab = array();
            $i=0;
            foreach($query->result_array() as $row){
                $tab[$i] = $row;
                $i++;
            }
            return $tab;
        }

        public function listeCentre($idEntreprise) {
            $this->db->order_by('idcentre', 'asc');
            $conditions = array(
                'identreprise' => $idEntreprise            ); 
            $query = $this->db->get_where('centretype', $conditions);

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $centre = new Centre_Model("".$liste[$i]->idcentre, "".$liste[$i]->intitule, "".$liste[$i]->identreprise, "".$liste[$i]->idtypecentre, "".$liste[$i]->typecentre);     
                    $liste2[] = $centre;
                }
            }
            return $liste2;
        }

    }
?>