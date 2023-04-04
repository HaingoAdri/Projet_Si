<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class TypeAdresse extends CI_Model {
        public $id;
        public $idEntreprise;
        public $type;

        public function __construct($id = "",$idEntreprise = "", $type = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->type = $type;
           
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'type' => $this->type
            );            
            $this->db->insert('typeadresse', $data);
        }

        public function select() {
            $conditions = array(
                'identreprise' => $this->idEntreprise,
                'type' => $this->type
            );
            $query = $this->db->get_where('typeadresse', $conditions);

            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }

            $this->id = $liste[0]->id;
        }

        public function listeTypeAdresse($idEntreprise) {
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('typeadresse');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $typeA['id'] = $liste[$i]->id;
                    $typeA['idEntreprise'] = $liste[$i]->identreprise;
                    $typeA['type'] = $liste[$i]->type;
                    $liste2[] = $typeA;
                }
            }
            return $liste2;
        }

        public function donneeTypeAdresse($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('typeadresse');
            $dirigeant = new Dirigeant();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(county($liste) == 1) {
                $dirigeant = new TypeAdresse($liste[$i]->id, $liste[$i]->idEntreprise, $liste[$i]->type);
            }
            return $dirigeant;
        }



    }
?>