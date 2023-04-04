<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Inscription extends CI_Controller {

        public function __construct() {
           parent::__construct();
        }

        //connecter
        public function index() {
            $this->load->model('Devise');
            $this->load->model('StatusEtat');
            $liste['typeStatus'] = $this->StatusEtat->listeTypeStatus();
            $liste['listeDevise'] = $this->Devise->listeDevise();
            $this->load->view('pages/inscription', $liste);            
        }

        public function inscription() {
            $this->load->model('Entreprise');
            $this->load->model('Devise');
            $this->load->model('TypeAdresse');
            $this->load->model('Adresse');
            $this->load->model('Dirigeant');
            $this->load->model('StatusEtat');

            $dateCreation = $this->input->post('dateCreation');
            $nomEntreprise = $this->input->post('nomEntreprise');
            $objet = $this->input->post('objet');
            $capital = $this->input->post('capital');
            $deviseTenuCompte = $this->input->post('deviseTenuCompte');

            $status = $this->input->post('status');
            $numeroStatus = $this->input->post('numeroStatus');

            $dateLieu = $this->input->post('dateLieu');
            $lieu = $this->input->post('lieu');
            $adresse = $this->input->post('adresse');
            $telephone = $this->input->post('telephone');

            $date = $this->input->post('date');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $entreprise = new Entreprise("0", $nomEntreprise, $capital, $objet, $dateCreation, $deviseTenuCompte);
            $entreprise->insert();
            $entreprise->select();

            $StatusEtat = new StatusEtat("0", $entreprise->id, $status, $numeroStatus);
            $StatusEtat->insert();

            $devise = new Devise("0", $entreprise->id, $deviseTenuCompte);
            $devise->insert();

            $typeAdresse1 = new TypeAdresse("0", $entreprise->id, "lieu");
            $typeAdresse1->insert();
            $typeAdresse1->select();
            $typeAdresse2 = new TypeAdresse("0", $entreprise->id, "adresse");
            $typeAdresse2->insert();
            $typeAdresse2->select();
            $typeAdresse3 = new TypeAdresse("0", $entreprise->id, "telephone");
            $typeAdresse3->insert();
            $typeAdresse3->select();

            $Adresse1 = new Adresse("0", $entreprise->id, $dateLieu, $typeAdresse1->id, $lieu);
            $Adresse1->insert();
            $Adresse2 = new Adresse("0", $entreprise->id, $dateLieu, $typeAdresse2->id, $adresse);
            $Adresse2->insert();
            $Adresse3 = new Adresse("0", $entreprise->id, $dateLieu, $typeAdresse3->id, $telephone);
            $Adresse3->insert();

            $Dirigeant = new Dirigeant("0", $entreprise->id, $nom, $prenom, $email, $password, $date);
            $Dirigeant->insert();
            
            redirect("Login/index");
        }

       

    


    
    

        
     }
?>