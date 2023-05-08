<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Centre extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->model('Centre_Model');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Centre_Model->listeCentre($idEntreprise);
            $this->load->view('pages/AjoutCentre',$liste);
        }

        public function AjoutNouveauCentre(){
            $this->load->model('Centre_Model');
            $intitule = $this->input->post('intitule');
            $idEntreprise = $_SESSION['id'];
            $centre = new Centre_Model("0", $intitule, $idEntreprise);
            $centre->insert();
            redirect("Centre/index");   
        }
       
        
    }
?>