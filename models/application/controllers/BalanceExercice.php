<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class BalanceExercice extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index() {
            $this->load->model('Exercice_model');
            $exercice = new Exercice_model();
            $exercice->idEntreprise = $_SESSION['id'];
            $liste['exercice'] = $exercice->listeExerciceByIdEntrerise();
            $this->load->view('pages/Balance',$liste);
        }

        public function balance() {
            $this->load->model('Balance');
            $this->load->model('Exercice_model');
            $this->load->model('Devise');
            $idExercice = $this->input->post('idExercice');
            $liste["exercice"] = $this->Exercice_model->getOneExercice($idExercice, $_SESSION['id']);
            $liste["liste"] = $this->Balance->listeResultat( $_SESSION['id'], $idExercice);
            $liste["devise"] = $this->Devise->listeDeviseEntreprise($_SESSION['id']);
            header('Content-Type: application/json');
            echo json_encode($liste);
        }



        

       
        
    }
?>