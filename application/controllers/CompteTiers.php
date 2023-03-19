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
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Compte->compteClientFournisseur($idEntreprise);
            var_dump( $liste['liste']);
            // $this->load->view('pages/CompteTiers', $liste);
        }

        public function ajoutNouveauClient() {
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