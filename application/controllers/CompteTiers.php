<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CompteTiers extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout(){
            $this->load->model('Compte');
            $this->load->model('CompteClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Compte->compteClientFournisseur($idEntreprise);
            // var_dump( $liste['liste']);
            $liste['planTiers'] = $this->CompteClientFournisseur->listeCompteTiers($idEntreprise);
            $this->load->view('pages/CompteTiers', $liste);
        }

        public function ajoutNouveauCompteTiers() {
            $this->load->model('CompteClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $idType = $this->input->post('idType');
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new CompteClientFournisseur("0", $idEntreprise, $idType, $numero, $intitule);
            $compte->insert();
            redirect("CompteTiers/ajout");
        }

        public function supprimer($id){
             $this->load->model('CompteClientFournisseur');
            $CompteClientFournisseur = new CompteClientFournisseur($id = $id, $idEntreprise = $_SESSION['id']);
            $CompteClientFournisseur->update(1);
            redirect("CompteTiers/ajout");
        }

        public function restaurer($id){
             $this->load->model('CompteClientFournisseur');
            $CompteClientFournisseur = new CompteClientFournisseur($id = $id, $idEntreprise = $_SESSION['id']);
            $CompteClientFournisseur->update(0);
            redirect("CompteTiers/ajout");
        }

        public function traitementData(){
            $type = $this->input->post('idType');
        }

        public function modifier($id){
            $this->load->model('CompteClientFournisseur');
            $compteT['compteT'] = $this->CompteClientFournisseur->donneesUnCompte($id);
            $this->load->view('pages/ModifierCompteTiers', $compteT);
        }

        public function ModifierUnCompte() {
            $this->load->model('CompteClientFournisseur');
            $idEntreprise = $_SESSION['id'];
            $id = $this->input->post('id');
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new CompteClientFournisseur( $id, $idEntreprise, "0", $numero, $intitule);
            $compte->updateTiers();
            redirect("CompteTiers/ajout");
        }
       
       

        
        

       
        
    }
?>