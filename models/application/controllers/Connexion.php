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
            $this->load->view('pages/accueil');
        }

        public function apropos() {
            $this->load->model('Adresse');
            $this->load->model('StatusEtat');
            $this->load->model('Devise');
            $this->load->model('Dirigeant');
            $idEntreprise = $_SESSION['id'];
            $data['listeAdresse'] = $this->Adresse->listeAdresse($idEntreprise);
            $data['status'] = $this->StatusEtat->statusEntreprise($idEntreprise);
            $data['devise'] = $this->Devise->listeDeviseEntreprise($idEntreprise);
            $data['dirigeant'] = $this->Dirigeant->donneeDirigeant($idEntreprise);
            $this->load->view('pages/Apropos', $data);
        }
    }
?>