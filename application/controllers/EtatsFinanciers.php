<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class EtatsFinanciers extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->view('pages/BilanPage');
        }

        public function showResultat(){
            $this->load->view('pages/Resultat');
        }
    }
?>