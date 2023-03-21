<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CodeGrandLivre extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->view('pages/AffichageGrandLivre');
        }
       
        
    }
?>