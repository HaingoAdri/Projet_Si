<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct() {
           parent::__construct();
        }

        //connecter
        public function index() {
            if($erreur = $this->input->get('erreur')){
                $data['erreur'] = $erreur;
                $this->load->view('pages/login', $data);
            }
            else{
                $this->load->view('pages/Login');
            }
            
        }
    
        public function login(){
            $this->load->model('Dirigeant');
            $this->load->model('Entreprise');
            $mail = $this->input->post('email');
            $pswd = $this->input->post('password');
            $tab =  $this->Dirigeant->checkUtilisateurExist($mail, $pswd);
            if($tab['count'] == 1){
                session_start();
                $entreprise = new Entreprise();
                $entreprise = $entreprise->donneeEntreprise($tab['identreprise']);
                $_SESSION['id'] = $entreprise->id;
                $_SESSION['nom'] = $entreprise->nom;
                $_SESSION['capital'] = $entreprise->capital;
                $_SESSION['objet'] = $entreprise->objet;
                $_SESSION['dateDeCreation'] = $entreprise->dateDeCreation;
                $_SESSION['idDeviseTenuCompte'] = $entreprise->idDeviseTenuCompte;
                redirect("Connexion/accueil");
            }
            else{
                $erreur = "Erreur de e-mail ou bien mot de pass invalide";
                redirect("Login/index?erreur=".$erreur);
            }
        }

        public function deconnecter(){
            session_start();
            session_destroy();
            redirect("Login");
        }

        
     }
?>