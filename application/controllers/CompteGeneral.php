<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CompteGeneral extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function ajout(){
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Compte->listeCompte($idEntreprise);
            if($erreur = $this->input->get('erreur')) {
                $liste['erreur'] = $erreur;
            }
            if($erreurAjoutSimple = $this->input->get('erreur1')) {
                $liste['erreurAjoutSimple'] = $erreurAjoutSimple;
            }
            $this->load->view('pages/CompteGeneral', $liste);
        }

        public function searchajout(){
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $postData = $this->input->post('search');
            $liste['liste'] = $this->Compte->searchCompte($this->input->post('search'),$idEntreprise);
            $this->load->view('pages/CompteGeneral', $liste);
        }

        public function ajoutNouveauCompte() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new Compte("0", $idEntreprise, $numero, $intitule);
            if($compte ->numeroDeCompteExisteDeja()==1) {
                $erreur = "Le numero de compte ". $numero ." existe deja";
                redirect("CompteGeneral/ajout?erreur1=".$erreur);
            }
            else if($compte ->compteExisteDeja(0)==1){
                $erreur = "Ce compte existe deja";
                redirect("CompteGeneral/ajout?erreur1=".$erreur);
            }
            else if($compte ->compteExisteDeja(0)==0 && $compte ->compteExisteDeja(1)==0){
                $compte->insert();
            }
            else if($compte ->compteExisteDeja(1)==1){
                $erreur = "Ce compte a ete supprimer recement, vous pouver juste la restaure";
                redirect("CompteGeneral/ajout?erreur1=".$erreur);
            }
            redirect("CompteGeneral/ajout");
        }

        public function supprimer($id){
            $this->load->model('Compte');
            $Compte = new Compte($id = $id, $idEntreprise = $_SESSION['id']);
            $Compte->update(1);
            redirect("CompteGeneral/ajout");
        }

        public function restaurer($id){
            $this->load->model('Compte');
            $Compte = new Compte($id = $id, $idEntreprise = $_SESSION['id']);
            $Compte->update(0);
            redirect("CompteGeneral/ajout");
        }

        public function modifier($id){
            $this->load->model('Compte');
            $compte['Compte'] = $this->Compte->donneesUnCompte($id);
            // var_dump($compte['Compte']);
            $this->load->view('pages/ModifierCompteGeneral', $compte);
        }

        public function ModifierUnCompte() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            $id = $this->input->post('id');
            $numero = $this->input->post('numero');
            $intitule = $this->input->post('intitule');
            $compte = new Compte( $id, $idEntreprise, $numero, $intitule);
            $compte->updateCompte();
            redirect("CompteGeneral/ajout");
        }

        public function listPlanComptable(){
            $this->load->model('Compte');
            $postData = $this->input->post('search');
            $data = $this->Compte->searchCompte($postData);
            echo json_encode($data);
        }

        // Dans le contrôleur
        public function lireFichier() {
            $this->load->model('Compte');
            $idEntreprise = $_SESSION['id'];
            // Vérifier si un fichier a été soumis
            if (isset($_POST['submit'])) {
                // Vérifier si le fichier a été correctement uploadé
                if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    // Ouvrir le fichier en mode lecture
                    $fichier = fopen($_FILES['file']['tmp_name'], 'r');

                    // Parcourir le fichier ligne par ligne
                    $data = [];
                    while(($ligne = fgetcsv($fichier)) !== false){
                        $data[] = $ligne;
                    }
                    $i = 1;
                    foreach($data as $ligne){
                        if(count($ligne)>2){
                            $erreur = "Nombre de colonne superieur a deux, verifier ligne " . $i;
                            redirect("CompteGeneral/ajout?erreur=".$erreur);
                        }
                        if(count($ligne)<2) {
                            $erreur = "Nombre de colonne manquante, verifier ligne " . $i;
                            redirect("CompteGeneral/ajout?erreur=".$erreur);
                        }
                        $compte = new Compte( "0", $idEntreprise, $ligne[0], $ligne[1]);
                        if($compte ->numeroDeCompteExisteDeja()==1) {
                            $erreur = "Le numero de compte ". $ligne[0] ." existe deja, verifier ligne " . $i;
                            redirect("CompteGeneral/ajout?erreur=".$erreur);
                        }
                        else if($compte ->compteExisteDeja(0)==0 && $compte ->compteExisteDeja(1)==0){
                            $compte->insert();
                        }
                        else if($compte ->compteExisteDeja(1)==1){
                            $compte->modifierUnCompteDonnees();
                        }
                        $i++;
                    }

                    // Fermer le fichier
                    fclose($fichier);
                } else {
                    // Afficher un message d'erreur
                    $erreur = 'Erreur lors du chargement du fichier.';
                    redirect("CompteGeneral/ajout?erreur=".$erreur);
                }
            } else {
                $erreur = 'Erreur lors du chargement du fichier.';
                redirect("CompteGeneral/ajout?erreur=".$erreur);
            }
            redirect("CompteGeneral/ajout");
        }

        

       
        
    }
?>