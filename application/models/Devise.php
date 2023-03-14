<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Devise extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idListeDevise;

        public function __construct($id = "",$idEntreprise = "", $idListeDevise = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->idListeDevise = $idListeDevise;
           
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'idlistedevise' => $this->idListeDevise
            );            
            $this->db->insert('devise', $data);
        }

        public function listeDeviseEntreprise($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('devise');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) > 0) {
                $this->$id = $liste[0]->id;
                for($i = 0; $i < count($liste); $i++) {
                    $devise = new Devise($liste[i]->id, $liste[i]->idEntreprise, $liste[i]->idListeDevise);
                    $liste[] = $devise;
                }
            }
            return $liste;
        }

        public function listeDevise() {
            $requette = "select * from listeDevise";
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['devise'] = $row['devise'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        public function nomDevise($idListeDevise) {
            $requette = "select * from ListeDevise where id = '%s'";
            $requette = sprintf($requette, $idStatus);
            $query = $this->db->query($idListeDevise);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['devise'] = $row['devise'];
                $tab[] = $typeS;
            }
            return $tab[0];
        }

    }
?>