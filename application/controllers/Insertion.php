<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Insertions extends CI_Controller {

        public function __construct() {
           parent::__construct();
        }

        //Insertion

        //-- Client

        public function indexClient() {
            $this->load->model('Client');
            
            $idEntreprise = $this->input->post('identreprise');
            $nom = $this->input->post('nom');

            $client = new Client("0", $idEntreprise, $nom);
            $client->insert();

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }

        //-- Fournisseur

        public function indexFournisseur() {
            $this->load->model('Fournisseur');
            
            $idEntreprise = $this->input->post('identreprise');
            $nom = $this->input->post('nom');

            $fournisseur= new Fournisseur("0", $idEntreprise, $nom);
            $fournisseur->insert();

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }

        //IUpdate

        //-- Client

        public function updateClient() {
            $this->load->model('Client');
            
            $idEntreprise = $this->input->post('identreprise');
            $nom = $this->input->post('nom');

            $client = new Client("0", $idEntreprise, $nom);
            $client->update();

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }

        //-- Fournisseur

        public function updateFournisseur() {
            $this->load->model('Fournisseur');
            
            $idEntreprise = $this->input->post('identreprise');
            $nom = $this->input->post('nom');

            $fournisseur= new Fournisseur("0", $idEntreprise, $nom);
            $fournisseur->update();

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }
       
        //Delete

        //-- Client

        public function deleteClient() {
            $this->load->model('Client');
            
            $id = $this->input->get('idclient');

            $client = new Client("0", $idEntreprise, $nom);
            $client->delete($id);

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }

        //-- Fournisseur

        public function deleteFournisseur() {
            $this->load->model('Fournisseur');
            
            $id = $this->input->get('idfournisseur');

            $fournisseur= new Fournisseur("0", $idEntreprise, $nom);
            $fournisseur->delete($id);

            // $liste = [];
            //tsy aiko ty hoe miverina aiza
            $this->load->view('pages/inscription');            
        }
        
     }
?>