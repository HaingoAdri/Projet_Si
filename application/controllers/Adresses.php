<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Adresses extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout() {
            $this->load->model('TypeAdresse');
            $type = new TypeAdresse();
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $type->listeTypeAdresse($idEntreprise);
            $this->load->view('pages/AjoutAdresse', $liste);
        }

        public function insertType(){
            $this->load->model('TypeAdresse');
            $idEntreprise = $_SESSION['id'];
            $type = $this->input->post('type');
            $typeAdresse = new TypeAdresse("0", "" . $idEntreprise, $type);
            $typeAdresse->insert();
            redirect("adresses/ajout");
        }

        public function insertAdresse(){
            $this->load->model('Adresse');
            $idEntreprise = $_SESSION['id'];
            $type = $this->input->post('type');
            $date = $this->input->post('date');
            $idType = $this->input->post('idType');
            $valeur = $this->input->post('valeur');
            $Adresse = new Adresse("0", "" . $idEntreprise, "" . $date, "" . $idType, "" . $valeur);
            $Adresse->insert();
            redirect("adresses/ajout");
        }

        public function listeAdresse() {
            $this->load->model('Adresse');
            $liste['liste'] = $this->Adresse->listeAdresse($_SESSION['id']);
            $this->load->view('pages/ListeAdresse', $liste);
        }

        public function supprimer($id){
            $this->load->model('Adresse');
            $Adresse = new Adresse($id = $id, $idEntreprise = $_SESSION['id']);
            $Adresse->update(1);
            redirect("adresses/listeAdresse");
        }

        public function restaurer($id){
            $this->load->model('Adresse');
            $Adresse = new Adresse($id = $id, $idEntreprise = $_SESSION['id']);
            $Adresse->update(0);
            redirect("adresses/listeAdresse");
        }

        
    }
?>