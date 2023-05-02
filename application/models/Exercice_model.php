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

        public function listeExerciceByIdEntrerise(){
            $conditions = array(
                'identreprise' => $this->idEntreprise            ); 
            $query = $this->db->get_where('exercice', $conditions);

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $exercice = new Exercice_model("".$liste[$i]->id, "".$liste[$i]->identreprise, "".$liste[$i]->debut, "".$liste[$i]->fin);     
                    $liste2[] = $exercice;
                }
            }
            return $liste2;

        }

        public function testDebutExercice($date){
            $this->db->where('fin > ', $date);
            $query = $this->db->get('exercice');
            if ($query->num_rows() > 0) {
                return true;
            }
            return false;

        }

        public function getOneExercice($idExercice,$idEntreprise){
            $requette = "select * from exercice where id = '".$idExercice."' and idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }

        public function dateIncluDansUneExercice($idEntreprise, $idExercice, $date) {
            $conditions = array(
                'identreprise' => $idEntreprise,
                'id' => $idExercice,
                'debut <=' => $date,
                'fin >=' => $date
            ); 
            $query = $this->db->get_where('exercice', $conditions);
            if ($query->num_rows() == 0) {
                return 0;
            }
            return 1; 
        }

        public function getExercice($idEntreprise, $date){
            $requette = "select * from exercice where debut < '".$date."' and idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }
    }
?>