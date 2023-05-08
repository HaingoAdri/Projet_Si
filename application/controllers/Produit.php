<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Produit extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->model('Produit_Model');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Produit_Model->listeProduit($idEntreprise);
            $this->load->view('pages/AjoutProduit',$liste);
        }

        public function AjoutNouveauProduit(){
            $this->load->model('Produit_Model');
            $intitule = $this->input->post('intitule');
            $idEntreprise = $_SESSION['id'];
            $produit = new Produit_Model("0", $intitule, $idEntreprise);
            $produit->insert();
            redirect("Produit/index");   
        }
       
        
    }
?>