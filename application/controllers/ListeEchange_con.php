<?php
defined('BASEPATH') or exit('No direct script access allowed');    //protection fichier
require_once(APPPATH . 'controllers/Mysession.php');

class ListeEchange_con extends Mysession
{
    public function index()
    {
        $data=array();
        $data['content']='listeEchange';
        $this->load->model('listeEchange_mod');
        $data['history'] = $this->listeEchange_mod->getTabByObjet();
        $this->load->view('template',$data);
    }
}
