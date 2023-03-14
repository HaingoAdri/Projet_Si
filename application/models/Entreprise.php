<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Entreprise extends CI_Model {
        public $id;
        public $nom;
        public $capital;
        public $objet;
        public $dateDeCreation;
        public $idDeviseTenuCompte;

        public function __construct($id = "",$nom = "", $capital = "", $objet = "", $dateDeCreation = "", $idDeviseTenuCompte = "") {
            parent::__construct();
            $this->id = $id;
            $this->nom = $nom;
            $this->capital = $capital;
            $this->objet = $objet;
            $this->dateDeCreation = $dateDeCreation;
            $this->idDeviseTenuCompte = $idDeviseTenuCompte;
        }

        public function insert() {
            $data = array(
                'nom' => $this->nom,
                'capital' => $this->capital,
                'objet' => $this->objet,
                'datedecreation' => $this->dateDeCreation,
                'iddevisetenucompte' => $this->idDeviseTenuCompte
            );            
            $this->db->insert('entreprise', $data);
        }

        public function select() {
            $conditions = array(
                'nom' => $this->nom,
                'capital' => $this->capital,
                'objet' => $this->objet,
                'datedecreation' => $this->dateDeCreation,
                'iddevisetenucompte' => $this->idDeviseTenuCompte
            );
            $query = $this->db->get_where('entreprise', $conditions);

            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }

            $this->id = $liste[0]->id;
        }

        public function donneeEntreprise($id) {
            $this->db->where('id', $id); 
            $query = $this->db->get('entreprise'); 
            $entreprise = new Entreprise();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $entreprise = new Entreprise("" . $liste[0]->id,"" . $liste[0]->nom,"" . $liste[0]->capital,"" . $liste[0]->objet,"" . $liste[0]->datedecreation,"" . $liste[0]->iddevisetenucompte);
            }
            return $entreprise;
        }

        


    }
?>