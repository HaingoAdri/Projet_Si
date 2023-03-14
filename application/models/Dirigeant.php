<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Dirigeant extends CI_Model {
        public $id;
        public $idEntreprise;
        public $nom;
        public $prenom;
        public $email;
        public $motDePasse;
        public $date;
       
        public function __construct($id = "",$idEntreprise = "", $nom = "", $prenom = "", $email = "", $motDePasse = "", $date = "") {
            parent::__construct();
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->date = $date;
        }

        public function insert() {
            $data = array(
                'identreprise' => $this->idEntreprise,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'motdepasse' => $this->motDePasse,
                'date' => $this->date
            );            
            $this->db->insert('dirigeant', $data);
        }

        public function select() {
            $conditions = array(
                'identreprise' => $this->idEntreprise,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'motdepasse' => $this->motDePasse,
                'date' => $this->date
            );
            $query = $this->db->get_where('dirigeant', $conditions);

            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }

            $this->id = $liste[0]->id;
        }

        public function donneeDirigeant($id) {
            $conditions = array(
                'identreprise' => $id,
                'ORDER BY' => 'date desc limit 1'
            );
            $query = $this->db->get_where('dirigeant', $conditions);
            $dirigeant = new Dirigeant();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(county($liste) == 1) {
                $dirigeant = new Dirigeant($liste[0]->id, $liste[0]->idEntreprise, $liste[0]->nom, $liste[0]->prenom, $liste[0]->email, $liste[0]->motDePasse, $liste[0]->date);
            }
            return $dirigeant;
        }

        public function checkUtilisateurExist($mail, $pswd) {
            $requette = "select * from dirigeant where email='%s' and motdepasse='%s'";
            $requette = sprintf($requette, $mail, $pswd);
            $query = $this->db->query($requette);            
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
                $count = 1;
            }
            $tab['count'] = $count;
            
            return $tab;
        }


    }
?>