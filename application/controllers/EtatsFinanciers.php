<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class EtatsFinanciers extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->view('pages/BilanPage');
        }

        public function maxFor695($resultatAvantImpot, $compte70) {
            $avantImpot = $resultatAvantImpot * (20/100);
            $all70 = ((5/1000) * $compte70) + 320000;
            if($avantImpot > $all70) {
                return $avantImpot;
            }else{
                return $all70;
            }
        }

        public function calculsResultats($tableau) {
            $temporaire = array();

            $temporaire['productionExercice'] = $tableau['sum70']+$tableau['sum71'];
            $temporaire['consommationExercice'] = $tableau['sum60']+$tableau['sum61_62'];
            $temporaire['valeurAjouteeExploitation'] = $temporaire['productionExercice']-$temporaire['consommationExercice'];
            $temporaire['excedentBrutExploitation'] = $tableau['sum64']+$tableau['sum63'];
            $temporaire['resultatOperationnel'] = $tableau['sum75']+$tableau['sum65']+$tableau['sum68']+$tableau['sum78'];
            $temporaire['resultatFinancier'] = $tableau['sum76']+$tableau['sum66'];
            $temporaire['resultatExtraordinaire'] = $tableau['sum77']+$tableau['sum67'];
            $temporaire['resultatAvantImpot'] = $temporaire['resultatOperationnel']+$temporaire['resultatFinancier'];
            $temporaire['impotExisibleSurResultat'] = $this->maxFor695($temporaire['resultatAvantImpot'],$tableau['sum70']);

            return $temporaire;
        }

        public function showAll() {
            $this->load->model('Bilan');
            $this->load->model('Exercice_Model');
            $this->load->model('Adresse');
            $this->load->model('StatusEtat');

            $idEntreprise = $_SESSION['id'];

            $idEntreprise = $_SESSION['id'];
            $capital = $_SESSION['capital'];
            $date = $this->input->post('date');
            $debut = $this->Exercice_Model->getExercice($idEntreprise, $date)['debut'];
            
            $resultats = $this->Bilan->getResultat($idEntreprise, $date, $debut);
            $totalResultats = $this->calculsResultats($resultats);

            $liste['resultatSimple'] = $resultats;
            $liste['totalResultats'] = $totalResultats;
            $liste['debut'] = $debut;
            $liste['finTemporaire'] = $date;
            $liste['listeAdresse'] = $this->Adresse->listeAdresse($idEntreprise);
            $liste['status'] = $this->StatusEtat->statusEntreprise($idEntreprise);

            $this->load->view('pages/Resultat', $liste); 
        }
    }
?>