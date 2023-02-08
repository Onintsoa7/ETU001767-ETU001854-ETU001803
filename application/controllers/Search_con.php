<?php
defined('BASEPATH') OR exit('No direct script access allowed');	//protection fichier
require_once (APPPATH . 'controllers/Mysession.php');

class Search_con extends Mysession{
    public function index ()
    {
        $data=array();
        $data['content']='search';
        $this->load->model('fiche_mod');
        $data['objet'] = $this->fiche_mod->getListeCategories();
        $this->load->view('template',$data);
    }

    public function search (){
        $data=array();
        $data['content']='search';
        $this->load->model('fiche_mod');
        $data['objet'] = $this->fiche_mod->getListeCategories();
        $search = $this->input->get('search');
        $idCategorie = $this->input->get('idCategorie');
        $this->load->model('search_mod');
        $data['objet1'] = $this->search_mod->search($search,$idCategorie);
        $this->load->view('template',$data);
    }
}