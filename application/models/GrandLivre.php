<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class GrandLivre extends CI_Model {

        public function listeExercice($idEntreprise) {
            $requette = "select * from Exercice where idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['idEntreprise'] = $row['identreprise'];
                $typeS['debut'] = $row['debut'];
                $typeS['fin'] = $row['fin'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        public function detailsOneExercice($code, $idEntreprise,$debut, $fin) {
            $requette = "select * from AllJournaux where date >= '".$debut."' and date <= '".$fin."' and compte = '".$code."' and idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $typeS = array();
                $typeS['id'] = $row['id']; 
                $typeS['idEntreprise'] = $row['identreprise'];
                $typeS['date'] = $row['date'];
                $typeS['pcg'] = $row['pcg'];
                $typeS['compte'] = $row['compte'];
                $typeS['num'] = $row['num'];
                $typeS['libelle'] = $row['libelle'];
                $typeS['montant'] = $row['montant'];
                $typeS['taux'] = $row['taux'];
                $typeS['devise'] = $row['devise'];
                $typeS['debit'] = $row['debit'];
                $typeS['credit'] = $row['credit'];
                $typeS['intitule'] = $row['intitule'];
                $typeS['code'] = $row['code'];
                $tab[] = $typeS;
            }
            return $tab;
        }

        public function getSommeDC($code,$idEntreprise,$debut, $fin){
            $requette = "select sum(debit) as sumD, sum(credit) as sumC from AllJournaux where date >= '".$debut."' and date <= '".$fin."' and compte = '".$code."' and idEntreprise = ".$idEntreprise;
            $query = $this->db->query($requette);            
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }

    }
?>