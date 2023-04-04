<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class FournisseurClient extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        // ************ CLIENT ******************//
        public function ajoutClient() {
            $this->load->model('ClientFournisseur');
            $liste['numero'] = $this->ClientFournisseur->numeroClient();
            $this->load->view('pages/AjoutClient',$liste); 
        }

        public function ajoutUnNouveauClient() {
            $this->load->model('ClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $intitule = $this->input->post('intitule');
            $idcompte = 0;
            $numero = 0;

            $ClientFournisseur= new ClientFournisseur("0", $idEntreprise, $idcompte, $numero, $intitule);
            $Dirigeant->insert();
            
            redirect("FournisseurClient/ajoutClient");
        }

        public function listesClients() {
            $this->load->model('ClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->ClientFournisseur->listesClients($idEntreprise);
            $this->load->view('pages/ListesClients', $liste); 
        }

        public function callMe(){
            $this->load->model('ClientFournisseur');
            $numero = $this->input->post('numero');
            $liste['liste'] = $this->ClientFournisseur->numeroClient($numero);
            $this->load->view('pages/ListesClients', $liste); 
        }

        // ************ FOURNISSEUR ************** //
        public function ajoutFournisseur() {
            $this->load->model('ClientFournisseur');
            $liste['numero'] = $this->ClientFournisseur->numeroFournisseur();
            $this->load->view('pages/AjoutFournisseur',$liste); 
        }

        public function ajoutUnNouveauFournisseur() {
            $this->load->model('ClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $intitule = $this->input->post('intitule');
            $idcompte = 0;
            $numero = 0;

            $ClientFournisseur= new ClientFournisseur("0", $idEntreprise, $idcompte, $numero, $intitule);
            $Dirigeant->insertFournisseur();
            
            redirect("FournisseurClient/ajoutFournisseur");
        }

        public function listesFournisseurs() {
            $this->load->model('ClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->ClientFournisseur->listesFournisseurs($idEntreprise);
            $this->load->view('pages/ListesFournisseurs', $liste); 
        }
    }
?>