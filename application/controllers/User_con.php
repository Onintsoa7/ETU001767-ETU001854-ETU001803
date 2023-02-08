<?php
defined('BASEPATH') OR exit('No direct script access allowed');	//protection fichier
require_once (APPPATH . 'controllers/Mysession.php');

class User_con extends Mysession{
    public function index ()
    {
        $array = $this->session->get_userdata('user');
        var_dump($array);
        echo "coucou user ".$array['user'];
        
    }
}