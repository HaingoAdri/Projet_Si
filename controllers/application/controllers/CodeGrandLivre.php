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
            $this->load->model('GrandLivre');
            $this->load->model('Compte');

            $idEntreprise = $_SESSION['id'];
            $data['exercices'] = $this->GrandLivre->listeExercice($idEntreprise);
            $data['comptes'] = $this->Compte->listeCompte($idEntreprise);

            $this->load->view('pages/ListesGrandLivre',$data);
        }

        public function afficheGrandLivre($code,$debut,$fin){
            $this->load->model('GrandLivre');
            $this->load->model('Code');
            $idEntreprise = $_SESSION['id'];
            // $data['nomCodeJournal'] = $this->Code->getOneCode($code,$idEntreprise);
            $data['debut'] = $debut;
            $data['fin'] = $fin;
            $data['details'] = $this->GrandLivre->detailsOneExercice($code,$idEntreprise,$debut,$fin);
            $data['sumDC'] = $this->GrandLivre->getSommeDC($code,$idEntreprise,$debut,$fin);
            $data['resteSolde'] = $this->GrandLivre->getSommeDC($code,$idEntreprise,$debut,$fin)['sumc'] - $this->GrandLivre->getSommeDC($code,$idEntreprise,$debut,$fin)['sumd'];
            $data['debug_message'] = 'JSON DATA work';
            $data['json'] = json_encode($data);
            $this->load->view('json' , $data );
        } 

        public function affichecodes($debut,$fin){
            $this->load->model('Code');
            $this->load->model('GrandLivre');
            $idEntreprise = $_SESSION['id'];
            $data['debut'] = $debut;
            $data['fin'] = $fin;
            $data['codes'] = $this->Code->listeCode($idEntreprise);
            $this->load->view('pages/ListesCodeJournals',$data);
        }
       
        
    }
?>