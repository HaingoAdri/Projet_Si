<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Detail_Charge extends CI_Model {
        public $id;
        public $numero;
        public $types;
        public $nature;
        public $unite;
        public $idExercice;
        public $idEntreprise;

        public function __construct($id = "",$numero = "", $type = "", $nature = "", $unite = "", $idExercice = "", $idEntreprise = "") {
            parent::__construct();
            $this->id = $id;
            $this->numero = $numero;
            $this->type = $type;
            $this->nature = $nature;
            $this->unite = $unite;
            $this->idExercice = $idExercice;
            $this->idEntreprise = $idEntreprise;
        }

        public function insert() {
            $data = array(
                'numero' => $this->numero,
                'types' => $this->type,
                'nature' => $this->nature,
                'unite' => $this->unite,
                'idexercice' => $this->idExercice,
                'identreprise' => $this->idEntreprise
            );            
            $this->db->insert('detailcharge', $data);
        }

        public function detailExist($idEntreprise, $idExercice, $numero) {
            $this->db->order_by('id', 'asc');
            $conditions = array(
                'identreprise' => $idEntreprise,
                'idexercice' => $idExercice,
                'numero' => $numero
            ); 
            $query = $this->db->get_where('detailcharge', $conditions);
            if ($query->num_rows() == 0) {
                return false;
            }
            return true;
        }

    }
?>