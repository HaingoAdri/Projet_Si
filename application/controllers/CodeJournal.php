<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CodeJournal extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout(){
            $this->load->model('Code');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Code->listeCode($idEntreprise);
            $this->load->view('pages/Code', $liste);
        }

        public function ajoutNouveauCode() {
            $this->load->model('Code');
            $code = $this->input->post('code');
            $intitule = $this->input->post('intitule');
            $idEntreprise = $_SESSION['id'];
            $code = new Code("0", $idEntreprise, $code, $intitule);
            $code->insert();
            redirect("CodeJournal/ajout");
        }

        public function supprimer($id){
            $this->load->model('Code');
            $Code = new Code($id = $id, $idEntreprise = $_SESSION['id']);
            $Code->update(1);
            redirect("CodeJournal/ajout");
        }

        public function restaurer($id){
            $this->load->model('Code');
            $Code = new Code($id = $id, $idEntreprise = $_SESSION['id']);
            $Code->update(0);
            redirect("CodeJournal/ajout");
        }

        public function Modifier($id){
            $this->load->model('Code');
            $code['code'] = $this->Code->donneesUnCompte($id);
            $this->load->view('pages/ModifierCodeJournal', $code);
        }

        public function ModifierUnCode() {
            $this->load->model('Code');
            $idEntreprise = $_SESSION['id'];
            $id = $this->input->post('id');
            $code = $this->input->post('code');
            $intitule = $this->input->post('intitule');
            $code = new Code( $id, $idEntreprise, $code, $intitule);
            $code->updateCode();
            redirect("CodeJournal/ajout");
        }

        public function test() {
            echo "Oui".'<br>';
            // <!-- checkdate(int month, day, hear) -->
            $date_start = date_create("2023-01-01");
            echo $date_start->format('Y-m-d').'<br>';
            $end_date = date_create("2021-01-05");
            $interval = DateInterval::createFromDateString('12 month, -1day');
            $daterange = new DatePeriod($date_start, $interval, $end_date);
            foreach($daterange as $date1){
                // echo $date1->format('Y-m-d').'<br>';
            }
            $date = date_add($date_start, $interval);
            echo $date->format('Y-m-d').'<br>';


        }


        

       
        
    }
?>