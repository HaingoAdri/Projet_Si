<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Compte extends CI_Model {
        public $id;
        public $idEntreprise;
        public $numero;
        public $intitule;
        public $exist;

        public function __construct($id = "",$idEntreprise = "", $numero = "", $intitule = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->numero = $numero;
            $this->intitule = $intitule;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );            
            $this->db->insert('compte', $data);
        }

        public function updateCompte() {
            $data = array(
                'numero' => $this->numero,
                'intitule' => $this->intitule
            );  
            $this->db->where('id', $this->id); 
            $this->db->update('compte', $data); 
            
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('compte', $data);
        }

        public function listeCompte($idEntreprise) {
            $this->db->order_by('id', 'asc');
            $conditions = array(
                'identreprise' => $idEntreprise            ); 
            $query = $this->db->get_where('compte', $conditions);

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $compte = new Compte("".$liste[$i]->id, "".$liste[$i]->identreprise, "".$liste[$i]->numero, "".$liste[$i]->intitule);     
                    $compte->exist = $liste[$i]->exist;
                    $liste2[] = $compte;
                }
            }
            return $liste2;
        }

        public function compteClientFournisseur($idEntreprise) {
            // $like = "like '%fournisseur%' or intitule like '%Fournisseur%' or intitule like '%client%' or intitule like '%Client%'";
            $conditions = array(
                'identreprise' => $idEntreprise,
                'exist' => 0
            );
            $this->db->select('*');
            $this->db->where($conditions);
            $this->db->group_start();
            $this->db->or_like('intitule', "client");
            $this->db->or_like('intitule', "Client");
            $this->db->or_like('intitule', "Fournisseur");
            $this->db->or_like('intitule', "fournisseur");
            $this->db->group_end();
            $query = $this->db->get('compte');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $compte = new Compte("".$liste[$i]->id, "".$liste[$i]->identreprise, "".$liste[$i]->numero, "".$liste[$i]->intitule);     
                    $compte->exist = $liste[$i]->exist;
                    $liste2[] = $compte;
                }
            }
            return $liste2;
        }

        public function donneesUnCompte($id) {
            $this->db->where('id', $id); 
            $query = $this->db->get('compte'); 
            $compte = new Compte();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $compte = new Compte("".$liste[0]->id, "".$liste[0]->identreprise, "".$liste[0]->numero, "".$liste[0]->intitule);     
                $compte->exist = $liste[0]->exist;
            }

            return $compte;
        }

        public function searchCompte($postData){
            $response = array();
            $searchValue = $postData;

            $searchQuery = '';
            if($searchValue!=''){
                $searchQuery="(numero like '%".$searchValue."%' or intitule like '%".$searchValue."')";
            }

            $this->db->select('*');
            if($searchQuery!=''){
                $this->db->where($searchQuery);
            }
            $records = $this->db->get('compte')->result();

            $data = array();

            foreach($records as $record){
                $data[] = array(
                    "numero"=>$record->numero,
                    "intitule"=>$record->intitule
                );
            }
            
            $response = $data;
            
            return $response;
        }


    }
?>