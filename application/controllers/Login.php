<?php
defined('BASEPATH') OR exit('No direct script access allowed');	//protection fichier
class Login extends CI_Controller {	///Code Initeur ///class tjr MAJ

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

	 // localhost/index.php/welcome/index
	 //raha tsy mitemy localhost/index.php/welcome dia index no tadiaviny sinon manao erreur

	public function index(){
		$this->load->view('login');
	}

	public function register(){
		$this->load->view('registration');
	}
	

	public function deconnexion(){
		$this->session->unset_userdata('user');
		redirect(site_url('login'));
	}

	public function receive(){
		$this->load->model('login_mod');
		$email = $this->input->post('mail');
		$mdp = $this->input->post('mdp');
		$array=$this->login_mod->getAllUser($email,$mdp);
		if($array == 1){
				echo "yes";
				$this->session->set_userdata('user',$array);
				redirect('category_con');
		}else if($array > 1){
				echo "no";
				$this->session->set_userdata('user',$array);
				redirect('fiche_con');
		}else if($array == 0){
			redirect(site_url('login'));
		}
	}
	public function insertUser(){
		$this->load->model('registration_mod');
		$email = $this->input->post('email');
		$motDePasse = $this->input->post('motDePasse');
		$nomUser = $this->input->post('nomUser');
		$prenomUser = $this->input->post('prenomUser');
		$dateDeNaissance = $this->input->post('dateDeNaissance');
		$this->registration_mod->insertUser($nomUser,$prenomUser,$email,$motDePasse,$dateDeNaissance);
		redirect(site_url('login'));
	}
	
}