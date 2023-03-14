<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Connexion extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function accueil() {
            // $this->load->library('session');
            // $data = array();
            // $data = $this->session->flashdata("donnees");
            $this->load->view('pages/accueil');
            // echo "Connecter";
        }
    }
?>