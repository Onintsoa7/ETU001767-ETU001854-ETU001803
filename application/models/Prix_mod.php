<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prix_mod extends CI_Model {
// fonction qui prens le prix d;un objet specifique par son id
   public function getPrice($idObj){
        $sql="SELECT prixObjet FROM OBJET WHERE IdObjet=$idObj";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        return $row['prixObjet'];
    }
// fonction qui prens la liste des objets qyant un prix estimatif entre deux valeurs
public function getTabBetween($valInf,$valSup,$id){
    $sql="SELECT * FROM OBJET WHERE prixObjet>=$valInf AND prixObjet<=$valSup and IdObjet!=$id";
    $query=$this->db->query($sql);
    return $query->result_array();
}

}