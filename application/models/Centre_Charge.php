<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Centre_Charge extends CI_Model {
        public $id;
        public $numero;
        public $idCentre;
        public $idProduit;
        public $pourcentage;
        public $idExercice;
        public $idEntreprise;

        public function __construct($id = "",$numero = "", $idProduit = "",$idCentre = "", $pourcentage = "", $idExercice = "", $idEntreprise = "") {
            parent::__construct();
            $this->id = $id;
            $this->numero = $numero;
            $this->idProduit = $idProduit;
            $this->idCentre = $idCentre;
            $this->pourcentage = $pourcentage;
            $this->idExercice = $idExercice;
            $this->idEntreprise = $idEntreprise;
        }

        public function insert() {
            $data = array(
                'numero' => $this->numero,
                'idproduit' => $this->idProduit,
                'idcentre' => $this->idCentre,
                'pourcentage' => $this->pourcentage,
                'idexercice' => $this->idExercice,
                'identreprise' => $this->idEntreprise
            );            
            $this->db->insert('chargecentre', $data);
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
                    $liste2[] = $centre;
                }
            }
            return $liste2;
        }

    }
?>