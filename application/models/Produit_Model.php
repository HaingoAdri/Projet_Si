<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Produit_Model extends CI_Model {
        public $idProduit;
        public $Intitule;
        public $idEntreprise;

        public function __construct($idProduit = "",$Intitule = "", $idEntreprise = "") {
            parent::__construct();
            $this->idProduit = $idProduit;
            $this->Intitule = $Intitule;
            $this->idEntreprise = $idEntreprise;
        }

        public function insert() {
            $data = array(
                'intitule' => $this->Intitule,
                'identreprise' => $this->idEntreprise
            );            
            $this->db->insert('produit', $data);
        }

        public function listeProduit($idEntreprise) {
            $this->db->order_by('idproduit', 'asc');
            $conditions = array(
                'identreprise' => $idEntreprise            ); 
            $query = $this->db->get_where('produit', $conditions);

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $produit = new Produit_Model("".$liste[$i]->idproduit, "".$liste[$i]->intitule, "".$liste[$i]->identreprise);     
                    //$compte->exist = $liste[$i]->exist;
                    $liste2[] = $produit;
                }
            }
            return $liste2;
        }

    }
?>