<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stat_mod extends CI_Model {
    // fonction qui prens le nombre d'utilisateur
    public function getNbUser(){
        $sql="SELECT count(*) as nb from user";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        return $row['nb'];
    }
    // fonction qui prends le nombre d'echange
    public function getNbExhange(){
        $sql=" SELECT COUNT(*) AS NB FROM ECHANGE WHERE idETAT= 1";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        return $row['NB'];
    }
}
