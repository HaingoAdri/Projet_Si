<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {

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
		$this->load->view('code_Journaux');
	}
	public function ajout_code(){
		$data = array(
			// 'id' => 'default',
			'nom' => $this->input->post('code')
		);
		$this->db->insert('code',$data);
		redirect('code/conf');
	}
	public function conf(){
		$this->load->model('Code_Journaux');
		$tab['code'] = $this->Code_Journaux->listeCode();
		$this->load->view('afficher_code',$tab);
	}
	public function suppr(){
		$id=$this->input->post('id');
		$this->db->where('id',$id)->delete('code');
		redirect('code/conf');
	}
	public function modif(){
		$id = $this->input->post('id_c');
		$nom = $this->input->post('name_code');
		$data = array(
			'id' => $id,
			'nom' => $nom
		);
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('code');
		redirect('code/conf');
	}
			
}
