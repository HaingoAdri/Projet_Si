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
            $liste['liste'] =$this->Exercice_model->listeExercice();
            if($erreur = $this->input->get('erreur')){
                $liste['erreur'] = $erreur;
                $this->load->view('pages/Exo', $liste);
            }
            else{
                $this->load->view('pages/Exo', $liste);
            }
        }

        public function insertExo(){
            $this->load->model('Exercice_model');
            $idEntreprise = $_SESSION['id'];
            $debut = $this->input->post('debut');
            if($this->Exercice_model->testDebutExercice($debut)==true){
                $ereur = "Insert de date invalide";
                redirect("exercice/ajout?erreur=".$ereur);
            }
            $date_start = date_create($debut);
            $interval = DateInterval::createFromDateString('12 month, -1day');
            $fin = date_add($date_start, $interval);
            $Exercice_model = new Exercice_model("0", "" . $idEntreprise, $debut,$fin->format('Y-m-d'));
            $Exercice_model->insert();
            redirect("exercice/ajout");
        }

        public function oneExo($idExercice){
            $this->load->model('Exercice_model');
            $idEntreprise = $_SESSION['id'];
            $exercice = $this->Exercice_model->getOneExercice($idExercice,$idEntreprise);
            header('Content-Type: application/json');
            $data['debug_message'] = 'JSON DATA work';
            $data['exercice'] = $exercice;
            $data['json'] = json_encode($data);
            $this->load->view('json' , $data );

       }
       

        
    }
?>