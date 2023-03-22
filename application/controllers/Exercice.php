<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Exercice extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout() {
            $this->load->model('Exercice_model');
            $type = new Exercice_model();
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $type->listeExercice();
            $this->load->view('pages/Exo', $liste);
        }

        public function insertJournal(){
            $this->load->model('Exercice_model');
            $idEntreprise = $_SESSION['id'];
            $debut = $this->input->post('debut');
            $fin = $this->input->post('fin');
            $Exercice_model = new Exercice_model("0", "" . $idEntreprise, $debut,$fin);
            $Exercice_model->insert();
            redirect("exercice/ajout");
        }

       

        
    }
?>