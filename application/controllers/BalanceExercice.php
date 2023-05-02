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
            $idExercice = $this->input->post('idExercice');
            $liste = $this->Balance->listeResultat( $_SESSION['id'], $idExercice);
            header('Content-Type: application/json');
            $data['liste'] = $liste;
            $data['json'] = json_encode($data);
            $this->load->view('json.php',$data);
        }



        

       
        
    }
?>