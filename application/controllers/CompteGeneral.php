<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CompteGeneral extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout(){
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Compte->listeCompte($idEntreprise);
            $this->load->view('pages/CompteGeneral', $liste);
        }

        public function ajoutNouveauCompte() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new Compte("0", $idEntreprise, $numero, $intitule);
            $compte->insert();
            redirect("CompteGeneral/ajout");
        }

        public function supprimer($id){
            $this->load->model('Compte');
            $Compte = new Compte($id = $id, $idEntreprise = $_SESSION['id']);
            $Compte->update(1);
            redirect("CompteGeneral/ajout");
        }

        public function restaurer($id){
            $this->load->model('Compte');
            $Compte = new Compte($id = $id, $idEntreprise = $_SESSION['id']);
            $Compte->update(0);
            redirect("CompteGeneral/ajout");
        }

        public function modifier($id){
            $this->load->model('Compte');
            $compte['Compte'] = $this->Compte->donneesUnCompte($id);
            // var_dump($compte['Compte']);
            $this->load->view('pages/ModifierCompteGeneral', $compte);
        }

        public function ModifierUnCompte() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $id = $this->input->post('id');
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new Compte( $id, $idEntreprise, $numero, $intitule);
            $compte->updateCompte();
            redirect("CompteGeneral/ajout");
        }

        public function listPlanComptable(){
            $this->load->model('Compte');
            $postData = $this->input->post('search');
            $data = $this->Compte->searchCompte($postData);
            echo json_encode($data);
        }
        
        

       
        
    }
?>