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
            $this->db->order_by('date', 'desc');
            $this->db->where('identreprise', $id); 
            $query = $this->db->get('dirigeant'); 
            $dirigeant = new Dirigeant();
            $liste = [];
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            if(count($liste) > 0) {
                $dirigeant = new Dirigeant($liste[0]->id, $liste[0]->identreprise, $liste[0]->nom, $liste[0]->prenom, $liste[0]->email, $liste[0]->motdepasse, $liste[0]->date);
            }
            return $dirigeant;
        }

        public function listeDirigeants($idEntreprise) {
            $this->db->order_by('date', 'asc');
            $this->db->where('identreprise', $idEntreprise); 
            $query = $this->db->get('dirigeant'); 

            $liste = array();
            if ($query->num_rows() > 0) {
                $liste = $query->result();
            }
            $liste2 = array();
            if(count($liste) > 0) {
                for($i = 0; $i < count($liste); $i++) {
                    $dirigeant['id'] = $liste[$i]->id;
                    $dirigeant['idEntreprise'] = $liste[$i]->identreprise;
                    $dirigeant['nom'] = $liste[$i]->nom;
                    $dirigeant['prenom'] = $liste[$i]->prenom;
                    $dirigeant['email'] = $liste[$i]->email;
                    $dirigeant['date'] = $liste[$i]->date;
                    $liste2[] = $dirigeant;
                }
            }
            return $liste2;
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