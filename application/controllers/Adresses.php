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
            $type = $this->input->post('type');
            $idEntreprise = $_SESSION['id'];
            $typeAdresse = new TypeAdresse("0", "" . $idEntreprise, $type);
            $typeAdresse->insert();
            redirect("adresses/ajout");
        }

        public function insertAdresse(){

        }
    }
?>