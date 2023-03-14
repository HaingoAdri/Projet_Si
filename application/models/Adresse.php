<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Adresse extends CI_Model {
        public $id;
        public $idEntreprise;
        public $date;
        public $idTypeAdresse;
        public $valeur;
        public $exist;


        public function __construct($id = "",$idEntreprise = "", $date = "", $idTypeAdresse = "", $valeur = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->date = $date;
            $this->idTypeAdresse = $idTypeAdresse;
            $this->valeur = $valeur;
           
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'date' => $this->date,
                'idtypeadresse' => $this->idTypeAdresse,
                'valeur' => $this->valeur
            );            
            $this->db->insert('adresse', $data);
        }

        public function listeAdresse($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('adresse');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) > 0) {
                $this->$id = $liste[0]->id;
                for($i = 0; $i < count($liste); $i++) {
                    $typeA = new Adrresse($liste[i]->id, $liste[i]->idEntreprise, $liste[i]->date, $liste[i]->idTypeAdresse, $liste[i]->valeur);
                    $liste[] = $typeA;
                }
            }
            return $liste;
        }



    }
?>