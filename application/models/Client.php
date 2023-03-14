<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Client extends CI_Model {
        public $idClient;
        public $idEntreprise;
        public $nom;

        public function __construct($id = "",$idEntreprise = "",$nom= "") {
            parent::__construct();
            $this->idClient= $id;
            $this->idEntreprise = $idEntreprise;
            $this->$nom = $nom;
           
        }

        public function insert() {
            $data = array(
                'idClient' => $this->idClient,
                'idEntreprise' => $this->idEntreprise,
                'nom' => $this->$nom,
                'numCompte' => '0'
            );            
            $this->db->insert('client', $data);
        }

        public function update() {
            $data = array(
                'idClient' => $this->idClient,
                'idEntreprise' => $this->idEntreprise,
                'nom' => nom
            );            
            $this->db->update('client', $data);
        }

        public function delete($id) {
            $data = array(
                'idClient' => $id
            );            
            $this->db->delete('client', $data);
        }

        public function checkClientExist($mail, $pswd) {
            $requette = "select * from client where mail='%s' and password='%s'";
            $requette = sprintf($requette, $mail, $pswd);
            // $db = $this->load->database('base1', TRUE);
            $query = $this->db->query($requette);            
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $client = array();
                $client['id'] = $row['idclient']; 
                $client['mail'] = $row['mail'];
                $client['nom'] = $row['nom'];
                $client['prenom'] = $row['prenom'];
                $client['contact'] = $row['contact'];
                $tab = $client;
                $count = 2;
            }
            $tab['count'] = $count;
            
            return $tab;
        }

        public function checkSuperUtilisateur($mail, $pswd) {
            $requette = "select * from superutilisateur where mail='%s' and password='%s'";
            $requette = sprintf($requette, $mail, $pswd);
            // $db = $this->load->database('base1', TRUE);
            $query = $this->db->query($requette);
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $client = array();
                $client['id'] = $row['idsuperutilisateur'];
                $client['mail'] = $row['mail'];
                $client['nom'] = $row['nom'];
                $client['prenom'] = $row['prenom'];
                $client['contact'] = $row['contact'];
                $tab = $client;
                $count = 1;
            }
            $tab['count'] = $count;
            
            return $tab;
        }


        public function ckechCompteExist($mail, $pswd) {
            $tab = $this->checkClientExist($mail, $pswd);
            if($tab['count'] == 0){
                $tab = $this->checkSuperUtilisateur($mail, $pswd);
            }
            return $tab;
        }

        

    }
?>