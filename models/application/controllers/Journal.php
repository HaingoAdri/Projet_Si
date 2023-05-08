<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Journal extends CI_Controller {
        public function __construct() {
            parent::__construct();
            session_start();
            if(!isset($_SESSION['id'])){
                redirect("Login/index");
            }
        }

        public function index(){
            $this->load->model('Code');
            $this->load->model('Devise');
            $this->load->model('Journal_models');
            $this->load->model('Exercice_model');
            $idEntreprise = $_SESSION['id'];
            $liste['liste'] = $this->Code->listeCode($idEntreprise);
            $liste['listes'] = $this->Devise->listeDeviseEntreprise($idEntreprise);
            $liste['listeJ'] = $this->Journal_models->listeJournauxs($idEntreprise);
            $liste['listeE'] = $this->Exercice_model->listeExercice();
            // var_dump($liste['listeJ']);
            $this->load->view('pages/Vue_Journal',$liste);
        }

        public function ajout(){
            $this->load->model('Journal_models');
            $idEntreprise = $_SESSION['id'];
            $liste['listeJ'] = $this->Code->listeJournaux();
            $this->load->view('pages/Vue_Journal', $liste);
        }

        public function ajoutJournal() {
            $this->load->model('Code');
            $this->load->model('Devise');
            $this->load->model('Journal_models');
            $date = $this->input->post('date');
            $devise = $this->input->post('devis');
            $taux = $this->input->post('taux');
            $exo = $this->input->post('exo');
            for($i=0; $i<count($date); $i++){
                $dates = $date[$i];
                $pce = $this->input->post('code')[$i];
                $cact = $this->input->post('compte')[$i];
                $libelle = $this->input->post('nom')[$i];
                $debit = $this->input->post('debit')[$i];
                $credit = $this->input->post('credit')[$i];
                $montant = $this->input->post('montant')[$i];
                $numero = $this->input->post('insert')[$i];
                $cause = $this->input->post('cause')[$i];
                $idEntreprise = $_SESSION['id'];
                $journal = new Journal_models("0", $idEntreprise, $dates, $pce, $cact, $libelle, $devise, $taux, $debit, $credit, $montant, $numero,$cause,$exo);
                $journal->insert();
            }
            redirect("Journal/index");
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

        public function lireFichier() {
            $this->load->model('Compte');
            $this->load->model('Journal_models');
            $this->load->model('CompteClientFournisseur');
            $this->load->model('Exercice_model');
            $this->load->model('TauxDevise');
            $idEntreprise = $_SESSION['id'];
            $idExercice = $this->input->post('idExercice');
            $idDevise = $this->input->post('idDevise');
            if($idExercice == 0 || $idDevise == 0 || $taux == -1) {
                $erreurLire = "Vous devriez d'abord choisir un exercice et une devise, <br> avant d'ajouter le fichier";
                redirect("Journal/index?erreurLire=".$erreurLire);
            }
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
                        if(count($ligne)>8){
                            $erreurLire = "Nombre de colonne superieur a huit, verifier ligne " . $i;
                            redirect("Journal/index?erreurLire=".$erreurLire);
                        }
                        if(count($ligne)<8) {
                            $erreurLire = "Nombre de colonne manquante, verifier ligne " . $i;
                            redirect("Journal/index?erreurLire=".$erreurLire);
                        }
                        $taux = $this->TauxDevise->taux($idEntreprise, $ligne[0], $idDevise)->taux;
                        $debit = $ligne[6];
                        $credit = $ligne[7];
                        $montant = 0;
                        if($debit!=0) {
                            $montant = $debit;
                            if($taux != 0)
                                $debit = $debit * $taux;
                        }
                        if($credit!=0) {
                            $montant = $credit;
                            if($taux != 0)
                                $credit = $credit * $taux;
                        }
                        $journal = new Journal_models("0", $idEntreprise, trim($ligne[0]), trim($ligne[5]), trim($ligne[2]), trim($ligne[3]), $idDevise, $taux, $debit, $credit, $montant, trim($ligne[1]), trim($ligne[4]), $idExercice);
                        $compte = $this->Compte->donneesParNumeroC($idEntreprise, $ligne[2]);
                        $tiers = $this->CompteClientFournisseur->donneesParCompteNumero($idEntreprise, $ligne[2], $ligne[3]);
                        $test_exercice = $this->Exercice_model->dateIncluDansUneExercice($idEntreprise, $idExercice, $ligne[0]);
                        if($compte->id == "") {
                            $erreurLire = "Le numero de compte " . $ligne[2] . " <br> n'existe pas encore, verifier ligne " . $i;
                            redirect("Journal/index?erreurLire=".$erreurLire);
                        }
                        else if($compte->id!="" && $ligne[3]!="" &&  $tiers->id==""){
                            $tiers = new CompteClientFournisseur("", $idEntreprise, $compte->id, $ligne[3], $ligne[3]);
                            $tiers->insert();
                        }
                        if($test_exercice == 0) {
                            $erreurLire = "La date " . $ligne[0] . " <br> est en dehors de l'exercice, verifier ligne " . $i;
                            redirect("Journal/index?erreurLire=".$erreurLire);
                        }
                        if($journal->journalDejaInserer() == false) {
                            $journal->insert();
                        }
                        $i++;
                    }

                    // Fermer le fichier
                    fclose($fichier);
                } else {
                    $erreurLire = 'Erreur lors du chargement du fichier.';
                    redirect("Journal/index?erreurLire=".$erreurLire);
                }
            } else {
                $erreurLire = 'Erreur lors du chargement du fichier.';
                redirect("Journal/index?erreurLire=".$erreurLire);
            }
            redirect("Journal/index");
        }

        public function taux() {
            $this->load->model('TauxDevise');
            $idEntreprise = $_SESSION['id'];
            $idDevise = $this->input->post('idDevise');
            $date = $this->input->post('date');
            $taux = $this->TauxDevise->taux($idEntreprise, $date, $idDevise);
            header('Content-Type: application/json');
            echo json_encode($taux);
        }

        

       
        
    }
?>