<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Mysession.php');

class Fiche_con extends Mysession {
    public function index(){
        $data=array();
        $array = $this->session->get_userdata('user');
        $data['content']='fiche_objet';
        $this->load->model('fiche_mod');
        $data['objet'] = $this->fiche_mod->getAllObjet(0,$array['user']);
        $this->load->view('template',$data);
    }
    public function echanger($idObjet){
        $data=array();
        $array = $this->session->get_userdata('user');
        $data['content']='fiche_echange';
        $this->load->model('fiche_mod');
        $data['objetAutrui'] = $this->fiche_mod->getAllObjet(-1,$idObjet);
        $data['objetMoi'] = $this->fiche_mod->getAllObjet($idObjet,$array['user']);
        $this->load->view('template',$data);
    }
    
    public function insertEchange(){
        $this->load->model('fiche_mod');
        $array = $this->session->get_userdata('user');
		$idObjet1 = $this->input->post('idObjet1');
		$idObjet2 = $this->input->post('idObjet2');
		$idUser1 = $this->input->post('idUser1');
        $this->fiche_mod->insertEchange($idObjet1,$idObjet2,$idUser1,$array['user']);
        redirect(site_url('fiche_con'));
    }
    public function sendRedirect(){
        $way = $this->input->get('way');
        redirect(site_url($way));
    }
}