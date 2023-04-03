<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Journal_models extends CI_Model {
        public $id;
        public $idEntreprise;
        public $date;
        public $pcg;
        public $compte;
        public $libelle;
        public $devise;
        public $taux;
        public $debit;
        public $credit;
        public $montant;
        public $num;
        public $cause;
        public $exo;

        public function __construct($id = "",$idEntreprise = "", $date = "", $pcg = "", $compte="", $libelle="", $devise="", $taux="", $debit="", $credit="", $montant="", $num="",$cause="",$exo="") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->date = $date;
            $this->pcg = $pcg;
            $this->compte = $compte;
            $this->libelle = $libelle;
            $this->devise = $devise;
            $this->taux = $taux;
            $this->debit = $debit;
            $this->credit = $credit;
            $this->montant = $montant;
            $this->num = $num;
            $this->cause = $cause;
            $this->exo = $exo;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'date' => $this->date,
                'pcg' => $this->pcg,
                'compte' => $this->compte,
                'num' => $this->num,
                'libelle' => $this->libelle,
                'montant' => $this->montant,
                'taux' => $this->taux,
                'devise' => $this->devise,
                'debit' => $this->debit,
                'credit' => $this->credit,
                'cause' => $this->cause,
                'exo' => $this->exo
            );            
            $this->db->insert('journaux', $data);
        }

        public function update($valeur) {
            $data = array(
                'exist' => $valeur
            );            
            $this->db->where('id', $this->id);
            $this->db->update('journaux', $data);
        }

        public function listeJournaux($idEntreprise) {
            $this->db->order_by('id', 'asc');
            $this->db->where('identreprise', $idEntreprise);
            $query = $this->db->get('journaux');

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $code = new Journal_models("".$liste[$i]->id, "".$liste[$i]->identreprise, "".$liste[$i]->date, "".$liste[$i]->pcg, "".$liste[$i]->compte, "".$liste[$i]->libelle, "".$liste[$i]->devise, "".$liste[$i]->taux, "".$liste[$i]->debit, "".$liste[$i]->credit, "".$liste[$i]->montant, "".$liste[$i]->num);     
                    // $code->exist = $liste[$i]->exist;
                    $liste2[] = $code;
                }
            }
            return $liste2;
        }
        public function listeJournauxs(){
            $query = "select * from listeJournaux";
            $sql = $this->db->query($query);
            $tab = array();
            foreach($sql->result_array() as $row){
                $tt = array();
                $tt['date'] = $row['date'];
                $tt['intitule'] = $row['intitule'];
                $tt['compte'] = $row['compte'];
                $tt['num'] = $row['num'];
                $tt['libelle'] = $row['libelle'];
                $tt['montant'] = $row['montant'];
                $tt['taux'] = $row['taux'];
                $tt['devise'] = $row['devise'];
                $tt['debit'] = $row['debit'];
                $tt['credit'] = $row['credit'];
                $tt['cause'] = $row['cause'];
                $tt['exo'] = $row['exo'];
                $tab[] = $tt;
            }
            return $tab;
        }
      
    }
?>