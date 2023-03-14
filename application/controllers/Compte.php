<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
		
	// }
	public function index(){
		$this->load->view('ajout_Compte');
	}
	public function ajout_compte(){
		$data = array(
            // 'id_compte' => 'default',
            'id_entreprise' => 1,
            'nom_categorie' => $this->input->post('categories'),
            'num_compte' => $this->input->post('num_Compte'),
			'nom_compte' => $this->input->post('nom_Compte')
		);
		$this->db->insert('compte',$data);
		redirect('compte/select');
        // echo "oui";
	}
    public function select(){
        $this->load->model('Compte_M');
        $tab['comptes'] = $this->Compte_M->listeCompte();
        $this->load->view('afficher_compte',$tab);
    }
	
	public function suppr(){
		$id=$this->input->post('id');
		$this->db->where('id_compte',$id)->delete('compte');
		redirect('compte/select');
	}
	public function modif(){
		$id = $this->input->post('id_comp');
		$nom = $this->input->post('cat');
		$num = $this->input->post('num_Co');
		$nom_c = $this->input->post('nom_Co');
		$data = array(
			'id_compte' => $id,
			'nom_categorie' => $nom,
			'num_compte' =>$num,
			'nom_compte' => $nom_c
		);
		$this->db->set($data);
		$this->db->where('id_compte',$id);
		$this->db->update('compte');
		redirect('compte/select');
	}
			
}
