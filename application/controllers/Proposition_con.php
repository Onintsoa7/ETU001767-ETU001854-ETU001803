<?php
defined('BASEPATH') or exit('No direct script access allowed');    //protection fichier
require_once(APPPATH . 'controllers/Mysession.php');

class Proposition_con extends Mysession
{
    public function index()
    {
        $data = array();
        $array = $this->session->get_userdata('user');
        $data['content'] = 'proposition';
        $this->load->model('proposition_mod');
        $data['objet'] = $this->proposition_mod->getAllMyProposition($array['user']);
        $this->load->view('template', $data);
    }
    public function details()
    {
        $data = array();
        $array = $this->session->get_userdata('user');
        $idEchange = $this->input->get('idEchange');
        $data['content'] = 'details_echange';
        $this->load->model('proposition_mod');
        $this->load->model('fiche_mod');
        $data['objet'] = $this->proposition_mod->getTheProposition($idEchange);
        $objet = $data['objet'];
        $data['objet1'] = $this->fiche_mod->getAllObjet(-1, $objet[0]['idObjet1']);
        $data['objet2'] = $this->fiche_mod->getAllObjet(-1, $objet[0]['idObjet2']);
        //var_dump($data['objet2']);
        $data['idEchange'] = $idEchange;
        $this->load->view('template', $data);
    }
    public function refuse($idEchange)
    {
        $data = array();
        $array = $this->session->get_userdata('user');
        $data['content'] = 'details_echange';
        $this->load->model('proposition_mod');
        $this->proposition_mod->updateProposition(2, $idEchange);
        redirect(site_url('proposition_con'));
    }
    public function accept($idEchange, $idObjet1, $idNewProp, $idObjet2)
    {
        $data = array();
        $array = $this->session->get_userdata('user');
        $data['content'] = 'details_echange';
        $this->load->model('proposition_mod');
        $this->proposition_mod->updateProprietaire($idNewProp, $idObjet1);
        $this->proposition_mod->updateProprietaire($array['user'], $idObjet2);
        $this->proposition_mod->updateProposition(1, $idEchange);
        $data['all'] = $this->proposition_mod->getPropoById($idObjet1);
        $data['all1'] = $this->proposition_mod->getPropoById($idObjet1);
        $try = $data['all'];
        $try1 = $data['all1'];
        if (count($try) >= 1) {
            for ($i = 0; $i < count($try); $i++) {
                $this->proposition_mod->updateRefusDoffice($idObjet1);
            }
        }
        if (count($try1) >= 1) {
            for ($i = 0; $i < count($try1); $i++) {
                $this->proposition_mod->updateRefusDoffice($idObjet2);
            }
        }
        redirect(site_url('proposition_con'));
    }
}
