<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class StatusEtat extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idStatus;
        public $numero;
        public $type;

        public function __construct($id = "",$idEntreprise = "", $idStatus = "", $numero = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->idStatus = $idStatus;
            $this->numero = $numero;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'idstatus' => $this->idStatus,
                'numero' => $this->numero
            );            
            $this->db->insert('statusetat', $data);
        }

        public function statusEntreprise($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise); 
            $query = $this->db->get('listestatusetat'); 
            $StatusEtat = new StatusEtat();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) == 1) {
                $StatusEtat = new StatusEtat($liste[0]->id, $liste[0]->identreprise, $liste[0]->idstatus, $liste[0]->numero);
                $StatusEtat->type = $liste[0]->type;
            }
            return $StatusEtat;
        }

        public function listeTypeStatus() {
            $requette = "select * from typestatus";
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['type'] = $row['type'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        public function donneesUnStatus($idStatus) {
            $requette = "select * from TypeStatus where id = '%s'";
            $requette = sprintf($requette, $idStatus);
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['type'] = $row['type'];
                $tab[] = $typeS;
            }
            return $tab[0];
        }




    }
?>