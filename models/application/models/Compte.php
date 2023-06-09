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
            $conditions = array(
                'identreprise' => $idEntreprise,
                'exist' => 0,
                'numero != ' => 4456,
                'numero != ' => 4457,
                'CAST(numero AS VARCHAR) like' => '4%'
            );
            $this->db->order_by('numero', 'asc');
            $this->db->select('*');
            $this->db->where($conditions);
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

        public function searchCompte($postData,$idEntreprise){
            echo $postData;
            $this->db->select('*');
            $this->db->from('compte');
            $this->db->where('identreprise', $idEntreprise);
            $this->db->where("Cast(numero as char) LIKE '%".$postData."%' or intitule LIKE '%".$postData."%'");
            $query = $this->db->get();
            echo $this->db->last_query();
            $response = $query->result();
            return $response;
        }

        public function numeroDeCompteExisteDeja() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'numero' => $this->numero,
                'intitule !=' => $this->intitule
            );  
            $query = $this->db->get_where('compte', $data);
            return $query->num_rows();
        }

        public function compteExisteDeja($exist) {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'numero' => $this->numero,
                'intitule' => $this->intitule,
                'exist' => $exist
            );  
            $query = $this->db->get_where('compte', $data);
            return $query->num_rows();
        }

        public function modifierUnCompteDonnees() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'numero' => $this->numero,
                'intitule' => $this->intitule,
                'exist' => 1
            );  
            $query = $this->db->get_where('compte', $data);
            $compte = new Compte();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $compte = new Compte("".$liste[0]->id, "".$liste[0]->identreprise, "".$liste[0]->numero, "".$liste[0]->intitule);     
                $compte->exist = $liste[0]->exist;
            }
            $compte->update(0);
        }

        public function donneesParNumeroC($idEntreprise, $compte) {
            $conditions = array(
                'identreprise' => $idEntreprise,
                'numero' => $compte
            );
            $query = $this->db->get_where('compte', $conditions); 
            $compte = new Compte();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $compte = new Compte("".$liste[0]->id, "".$liste[0]->identreprise, "".$liste[0]->numero, "".$liste[0]->intitule);    
            }
            return $compte;
        } 
    }
?>