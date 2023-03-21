<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Journal extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->model('Code');
            $this->load->model('Devise');
            $this->load->model('Journal_models');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Code->listeCode($idEntreprise);
            $liste['listes'] = $this->Devise->listeDevise();
            $liste['listeJ'] = $this->Journal_models->listeJournauxs($idEntreprise);
            $this->load->view('pages/Vue_Journal',$liste);
        }

        public function ajout(){
            $this->load->model('Journal_models');
            $idEntreprise = $_SESSION['id'];
            $liste['listeJ'] = $this->Code->listeJournaux();
            $this->load->view('pages/Vue_Journal', $liste);
        }

        public function ajoutJournal() {
            $this->load->model('Code');
            $this->load->model('Devise');
            $this->load->model('Journal_models');
            $date = $this->input->post('date');
            $pce = $this->input->post('code');
            $cact = $this->input->post('compte');
            $libelle = $this->input->post('nom');
            $devise = $this->input->post('devis');
            $taux = $this->input->post('taux');
            $debit = $this->input->post('debit');
            $credit = $this->input->post('credit');
            $montant = $this->input->post('montant');
            $numero = $this->input->post('insert');
            $cause = $this->input->post('cause');
            $idEntreprise = $_SESSION['id'];
            $code = new Journal_models("0", $idEntreprise, $date, $pce, $cact, $libelle, $devise, $taux, $debit, $credit, $montant, $numero,$cause);
            $code->insert();
            redirect("Journal/index");
        }

        public function supprimer($id){
            $this->load->model('Code');
            $Code = new Code($id = $id, $idEntreprise = $_SESSION['id']);
            $Code->update(1);
            redirect("CodeJournal/ajout");
        }

        public function restaurer($id){
            $this->load->model('Code');
            $Code = new Code($id = $id, $idEntreprise = $_SESSION['id']);
            $Code->update(0);
            redirect("CodeJournal/ajout");
        }

        

       
        
    }
?>