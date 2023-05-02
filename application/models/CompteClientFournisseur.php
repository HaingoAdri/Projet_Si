<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class CompteClientFournisseur extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idCompte;
        public $numCompte;
        public $compte;
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

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'idcompte' => $this->idCompte,
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );            
            $this->db->insert('tiers', $data);
        }

        public function updateTiers() {
            $data = array(
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );            
            $this->db->where('id', $this->id); 
            $this->db->update('tiers', $data); 
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('tiers', $data);
        }

        public function listeCompteTiers($idEntreprise) {
            $this->db->order_by('id', 'desc');
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('listecomptetiers');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $compte = new CompteClientFournisseur("".$liste[$i]->id, "".$liste[$i]->identreprise,  "".$liste[$i]->idcompte, "".$liste[$i]->numero, "".$liste[$i]->intitule);     
                    $compte->compte = $liste[$i]->compte;                    
                    $compte->exist = $liste[$i]->exist;
                    $compte->numCompte = $liste[$i]->numcompte;
                    $liste2[] = $compte;
                }
            }
            return $liste2;
        }

        public function donneesUnCompte($id) {
            $this->db->where('id', $id); 
            $query = $this->db->get('tiers'); 
            $compte = new CompteClientFournisseur();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $compte = new CompteClientFournisseur("".$liste[0]->id, "".$liste[0]->identreprise,  "".$liste[0]->idcompte, "".$liste[0]->numero, "".$liste[0]->intitule);     
                $compte->exist = $liste[0]->exist;
            }

            return $compte;
        }

        public function donneesParCompteNumero($idEntreprise, $compte, $numero) {
            $conditions = array(
                'identreprise' => $idEntreprise,
                'numcompte' => $compte,
                'numero' => $numero
            );
            $query = $this->db->get_where('listecomptetiers', $conditions); 
            $compte = new CompteClientFournisseur();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $compte = new CompteClientFournisseur("".$liste[0]->id, "".$liste[0]->identreprise,  "".$liste[0]->idcompte, "".$liste[0]->numero, "".$liste[0]->intitule);     
                $compte->compte = $liste[0]->compte;                    
                $compte->exist = $liste[0]->exist;
                $compte->numCompte = $liste[0]->numcompte;
            }
            return $compte;
        } 


    }
?>