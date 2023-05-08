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

        public function listesClients($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise); 
            $query = $this->db->get('client');        
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['intitule'] = $row['intitule'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        
        public function listesFournisseurs($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise); 
            $query = $this->db->get('fournisseur');        
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['intitule'] = $row['intitule'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        public function select() {
            $query = $this->db->get('getSequenceClient()');
            $liste = $query->result();
            $this->id = $liste[0]->id;
        }

        public function numeroClient(){
            $query = $this->db->get('getSequenceClient()');
            $liste = $query->result();
            $nb = $liste[0]->getsequenceclient;

            $halavany = strlen($nb);
            $reste = 5 - $halavany;
            $resultat = '';
            for($i=0; $i<$reste; $i++){
                $resultat = $resultat.'0';
            }
            $mot = ''.$nb;
            $resultat = $resultat.$mot;
            echo $resultat;
            return $resultat;
        }

        public function numeroFournisseur(){
            $query = $this->db->get('getSequenceFournisseur()');
            $liste = $query->result();
            $nb = $liste[0]->getsequencefournisseur;

            $halavany = strlen($nb);
            $reste = 5 - $halavany;
            $resultat = '';
            for($i=0; $i<$reste; $i++){
                $resultat = $resultat.'0';
            }
            $mot = ''.$nb;
            $resultat = $resultat.$mot;
            echo $resultat;
            return $resultat;
        }

    }
?>