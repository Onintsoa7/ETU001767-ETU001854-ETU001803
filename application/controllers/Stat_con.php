<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Mysession.php');

class Stat_con extends Mysession {
    public function index(){
        $data=array();
        $data['content']='statistique';
        $data['nbEchange']=$this->getNbExhange();
        $data['nbUser']=$this->getNbUser();

        $this->load->view("template",$data);

    }
    // Fonction qui donne le nombre d'echange
    public function getNbExhange(){
        $this->load->model("stat_mod");
       $nb = $this->stat_mod->getNbExhange();
       return $nb;
    }
    // Fonction qui donne le nombre d'utilisateur
    public function getNbUser(){
        $this->load->model("stat_mod");
        $nb = $this->stat_mod->getNbUser();
        return $nb;
    }

}