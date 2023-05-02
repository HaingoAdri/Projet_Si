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
            $this->db->order_by('date', 'asc');
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('listeadresse');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $adresse['id'] = $liste[$i]->id;
                    $adresse['idEntreprise'] = $liste[$i]->identreprise;
                    $adresse['date'] = $liste[$i]->date;
                    $adresse['idTypeAdresse'] = $liste[$i]->idtypeadresse;
                    $adresse['type'] = $liste[$i]->type;
                    $adresse['valeur'] = $liste[$i]->valeur;
                    $adresse['exist'] = $liste[$i]->exist;                    
                    $liste2[] = $adresse;
                }
            }
            return $liste2;
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('adresse', $data);
        }

        



    }
?>