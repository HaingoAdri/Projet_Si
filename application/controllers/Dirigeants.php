<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Dirigeants extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout() {
            $this->load->view('pages/AjoutDirigeant'); 
        }

        public function ajoutUnNouveauDirigeant() {
            $this->load->model('Dirigeant');
            $idEntreprise = $_SESSION['id'];
            $date = $this->input->post('date');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $Dirigeant = new Dirigeant("0", $idEntreprise, $nom, $prenom, $email, $password, $date);
            $Dirigeant->insert();
            
            redirect("Dirigeants/ajout");
        }

        public function listesDirigeants() {
            $this->load->model('Dirigeant');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Dirigeant->listeDirigeants($idEntreprise);
            $this->load->view('pages/ListesDirigeants', $liste); 
        }
    }
?>