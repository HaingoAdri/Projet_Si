<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ClientFournisseur extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idCompte;
        public $numero;
        public $intitule;
        public $exist;

        public function __construct($id = "",$idEntreprise = "", $idCompte = "", $numero = "", $intitule = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->idCompte = $idCompte;
            $this->numero = $numero;
            $this->intitule = $intitule;
        }

        public function insertClient() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'idcompte' => $this->idCompte,
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );            
            $this->db->insert('client', $data);
        }

        public function insertFournisseur() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'idcompte' => $this->idCompte,
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );            
            $this->db->insert('fournisseur', $data);
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('compte', $data);
        }


    }
?>