<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Fournisseur extends CI_Model {
        public $idFournisseur;
        public $idEntreprise;
        public $nom;

        public function insert() {
            $data = array(
                'idFournisseur' => $this->idFournisseur,
                'idEntreprise' => $this->idEntreprise,
                'nom' => nom
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

        public function delete() {
            $data = array(
                'idFournisseur' => $this->idFournisseur
            );            
            $this->db->delete('fournisseur', $data);
        }

    }
?>