<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class TauxDevise extends CI_Model {
        public $id;
        public $idEntreprise;
        public $idDevise;
        public $taux;
        public $date;
        public $devise;

        public function __construct($id = "",$idEntreprise = "", $idDevise = "", $taux = "", $date = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->idDevise = $idDevise;
            $this->taux = $taux;
            $this->date = $date;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'iddevise' => $this->idDevise,
                'taux' => $this->taux,
                'date' => $this->date
            );            
            $this->db->insert('tauxdevise', $data);
        }

        public function listeTauxDevise($idEntreprise) {
            $this->db->order_by('date', 'asc');
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('listetauxdevise');

            $liste = array();
            $liste2 = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $taux = new TauxDevise("0", "". $liste[$i]->identreprise, "" . $liste[$i]->iddevise, "" . $liste[$i]->taux, "" . $liste[$i]->date);
                    $taux->devise = $liste[$i]->devise;
                    $liste2[] = $taux;
                }
            }
            return $liste2;
        }
    }
?>