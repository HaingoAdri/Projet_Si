<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Devises extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout() {
            $this->load->model('Devise');
            $liste['liste'] = $this->Devise->listeDevise();
            $this->load->view('pages/AjoutDevise', $liste); 
        }

        public function ajouterNouveauDevise() {
            $this->load->model('Devise');
            $idDevise = $this->input->post('idDevise');
            $idEntreprise = $_SESSION['id'];
            echo $idEntreprise ;
            $devise = new Devise("0", $idEntreprise, $idDevise);
            $devise->insert();
            redirect("Devises/ajout");
        }

        public function listeDevise() {
            $this->load->model('Devise');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Devise->listeDeviseEntreprise($idEntreprise);
            $this->load->view('pages/ListesDevise', $liste); 
        }

        public function supprimer($id){
            $this->load->model('Devise');
            $devise = new Devise($id = $id);
            $devise->update(1);
            redirect("Devises/listeDevise");
        }

        public function restaurer($id){
            $this->load->model('Devise');
            $devise = new Devise($id = $id);
            $devise->update(0);
            redirect("Devises/listeDevise");
        }

        public function tauxDevise() {
            $this->load->model('Devise');
            $this->load->model('TauxDevise');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Devise->listeDeviseEntreprise($idEntreprise);
            $liste['taux'] = $this->TauxDevise->listeTauxDevise($idEntreprise);
            $this->load->view('pages/TauxDevise', $liste); 
        }

        public function ajoutTauxDevise() {
            $this->load->model('TauxDevise');
            $idEntreprise = $_SESSION['id'];
            $date = $this->input->post('date');
            $idDevise = $this->input->post('idDevise');
            $taux = $this->input->post('taux');
            $taux = new TauxDevise("0", "". $idEntreprise, $idDevise, $taux, $date);
            $taux->insert();
            redirect("Devises/tauxDevise");
        }

    }
?>