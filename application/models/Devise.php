<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Devise extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idListeDevise;
        public $devise;
        public $exist;

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

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('devise', $data);
        }

        public function listeDeviseEntreprise($idEntreprise) {
            $this->db->order_by('id', 'asc');
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('listedeviseentreprise');

            $liste = array();
            $liste2 = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $devise = new Devise($liste[$i]->id, $liste[$i]->identreprise, $liste[$i]->idlistedevise);
                    $devise->devise = $liste[$i]->devise;
                    $devise->exist = $liste[$i]->exist;
                    $liste2[] = $devise;
                }
            }
            return $liste2;
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

        public function deviseRetenuDuCompte($idEntreprise) {
            $liste = listeDeviseEntreprise($idEntreprise);
            return $liste[0];
        }

        

    }
?>