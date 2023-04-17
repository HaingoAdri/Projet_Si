<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Balance extends CI_Model {
        public $idEntreprise;
        public $compte;
        public $intitule;
        public $exo;
        public $debit;
        public $credit;
        public $soldeDebiteur;
        public $soldeCrediteur;


        public function __construct($idEntreprise = "", $compte = "", $intitule = "", $exo = "", $debit = "", $credit = "", $soldeDebiteur = "", $soldeCrediteur = "") {
            parent::__construct();
            $this->idEntreprise = $idEntreprise;
            $this->compte = $compte;
            $this->intitule = $intitule;
            $this->exo = $exo;
            $this->debit = $debit;
            $this->credit = $credit;
            $this->soldeDebiteur = $soldeDebiteur;
            $this->soldeCrediteur = $soldeCrediteur;
        }
        
        public function listeResultat($idEntreprise, $idExercice) {
            $this->load->model('Compte');
            $requette = "SELECT idEntreprise, compte, exo," . 
            "SUM(debit) AS debit,  
                            SUM(credit) AS credit,
                            CASE 
                            WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
                            ELSE 0 
                            END AS soldeDebiteur,
                            CASE 
                                WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
                                ELSE 0 
                                END AS soldeCrediteur
                                FROM journaux 
                                WHERE (CAST(compte AS VARCHAR) LIKE '1%' 
                                or CAST(compte AS VARCHAR) LIKE '2%'
                                or CAST(compte AS VARCHAR) LIKE '3%' 
                                or CAST(compte AS VARCHAR) LIKE '5%' 
                                or CAST(compte AS VARCHAR) LIKE '6%' 
                                or CAST(compte AS VARCHAR) LIKE '7%' 
                                or (CAST(compte AS VARCHAR) LIKE '4%' and compte != 4457 and compte != 4456 ))
                                AND idEntreprise = ". $idEntreprise ." and exo = ". $idExercice ."
                                GROUP BY idEntreprise, compte, exo";
                                // echo $requette;
                                $query = $this->db->query($requette);            
                                $tab = array();
            foreach($query->result_array() as $row){
                $compte = new Compte();
                $compte = $compte->donneesParNumeroC($idEntreprise, $row['compte']);
                $tab[] = new Balance("" . $row['identreprise'], "" .  $row['compte'], $compte->intitule, "" . $row['exo'] , "" .  $row['debit'], "" .  $row['credit'], "" .  $row['soldedebiteur'], "" . $row['soldecrediteur']);
            }
            $tab[] = $this->resultat($idEntreprise, $idExercice);
            $tab[] = $this->total($idEntreprise, $idExercice);
            return $tab;
        }

        public function resultat($idEntreprise, $idExercice) {
            $this->load->model('Compte');
            $requette = "SELECT idEntreprise, compte, exo," . 
            "SUM(debit) AS debit,  
                            SUM(credit) AS credit,
                            CASE 
                            WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
                            ELSE 0 
                            END AS soldeDebiteur,
                            CASE 
                                WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
                                ELSE 0 
                                END AS soldeCrediteur
                                FROM journaux 
                                WHERE compte IN (4457, 4456)
                                AND idEntreprise = ". $idEntreprise ." and exo = ". $idExercice ."
                                GROUP BY idEntreprise, compte, exo";
            $query = $this->db->query($requette);
            $sommeDebit = 0;
            $sommeCredit = 0; 
            $tab[] = array();
            foreach($query->result_array() as $row){
                $sommeDebit += $row['debit'];
                $sommeCredit += $row['credit'];
                $compte = new Compte();
                $compte = $compte->donneesParNumeroC($idEntreprise, $row['compte']);
                $tab[] = new Balance("" . $row['identreprise'], "" .  $row['compte'], $compte->intitule, "" . $row['exo'] , "" .  $row['debit'], "" .  $row['credit'], "" .  $row['soldedebiteur'], "" . $row['soldecrediteur']);
            }
            $soldeCrediteur = 0;
            $soldeDebiteur = 0;
            $resultat = $sommeCredit - $sommeDebit;
            if($resultat < 0) 
                $soldeCrediteur = $resultat;
            else if($resultat > 0)
                $soldeDebiteur = $resultat;        
            return  new Balance("" . $idEntreprise, "12", "Resultats", "" . $idExercice , "" . $sommeDebit, "" . $sommeCredit, "" .  $soldeDebiteur, "" . $soldeCrediteur);
        }

        public function total($idEntreprise, $idExercice) {
            $this->load->model('Compte');
            $requette = "SELECT SUM(tab.soldeDebiteur)::integer AS soldeDebiteur, " .
                            "SUM(tab.soldeCrediteur)::integer AS soldeCrediteur 
                            FROM 
                            (
                            SELECT idEntreprise, compte, exo, 
                                    SUM(debit) AS debit, 
                                    SUM(credit) AS credit, 
                                    CASE 
                                        WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
                                        ELSE 0 
                                    END AS soldeDebiteur,
                                    CASE 
                                        WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
                                        ELSE 0 
                                    END AS soldeCrediteur
                            FROM journaux 
                            WHERE (CAST(compte AS VARCHAR) LIKE '1%' 
                                OR CAST(compte AS VARCHAR) LIKE '2%' 
                                OR CAST(compte AS VARCHAR) LIKE '5%' 
                                OR CAST(compte AS VARCHAR) LIKE '6%' 
                                OR CAST(compte AS VARCHAR) LIKE '7%' 
                                OR (CAST(compte AS VARCHAR) LIKE '4%' AND compte != 4457 AND compte != 4456) 
                                OR (compte IN (4457, 4456)))
                                AND idEntreprise = " . $idEntreprise ." and exo = ". $idExercice ."
                            GROUP BY idEntreprise, compte, exo
                        )tab;";
            $query = $this->db->query($requette);
            $liste = $query->result_array();
            return  new Balance("" . $idEntreprise, "", "", "" . $idExercice , "", "Total", "" .  $liste[0]['soldedebiteur'], "" . $liste[0]['soldecrediteur']);
        }
        
    }
?>