<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Fournisseur extends CI_Model {
        public $idFournisseur;
        public $idEntreprise;
        public $nom;

        public function __construct($id = "",$idEntreprise = "",$nom= "") {
            parent::__construct();
            $this->idFournisseur= $id;
            $this->idEntreprise = $idEntreprise;
            $this->$nom = $nom;
        }

        public function insert() {
            $data = array(
                'idFournisseur' => $this->idFournisseur,
                'idEntreprise' => $this->idEntreprise,
                'nom' => $this->$nom,
                'numCompte' => '0'
            );            
            $this->db->insert('fournisseur', $data);
        }

        public function update() {
            $data = array(
                'idFournisseur' => $this->idFournisseur,
                'idEntreprise' => $this->idEntreprise,
                'nom' => nom
            );            
            $this->db->update('fournisseur', $data);
        }

        public function delete($id) {
            $data = array(
                'idFournisseur' => $id
            );            
            $this->db->delete('fournisseur', $data);
        }

    }
?>