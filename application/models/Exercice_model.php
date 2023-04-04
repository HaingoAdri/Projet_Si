<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Exercice_model extends CI_Model {
        public $id;
        public $idEntreprise;
        public $debut;
        public $fin;

        public function __construct($id = "",$idEntreprise = "", $debut = "", $fin = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->debut = $debut;
            $this->fin = $fin;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'debut' => $this->debut,
                'fin' => $this->fin
            );            
            $this->db->insert('exercice', $data);
        }

       public function listeExercice(){
        $query = "select * from exercice";
        $sql = $this->db->query($query);
        $tab = array();
        foreach($sql->result_array() as $row){
            $tt = array();
            $tt['id'] = $row['id'];
            $tt['debut'] = $row['debut'];
            $tt['fin'] = $row['fin'];
            $tab[] = $tt;
        }
        return $tab;

       }

       public function testDebutExercice($date){
        $this->db->where('fin > ', $date);
        $query = $this->db->get('exercice');
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;

       }
    }
?>