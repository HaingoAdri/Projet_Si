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

        public function ajoutNouveauCCompte() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new Compte("0", $idEntreprise, $numero, $intitule);
            $compte->insert();
            redirect("CompteGeneral/ajout");
        }
        
        

       
        
    }
?>