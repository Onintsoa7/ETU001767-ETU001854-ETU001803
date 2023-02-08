<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_mod extends CI_Model {
// fonction qui prends la liste des categories
    public function getListeCategories(){
        $query=$this->db->query("SELECT * FROM CATEGORIE");
        return $query->result_array(); 

    }
    // fonction qui prends le nom d'un proprietaire d'objet
    public function getProprietaire($id){
        $sql="SELECT nomuser FROM user WHERE IDuser= ? ";
        $query=$this->db->query($sql,$id);
        $row=$query->row_array();
        return $row['nomuser'];

    }
     // fonction qui prends la liste des objets appartenant a un categorie
     public function getListeObjetParCategories($idcate){
            $sql="SELECT *  from categorieobjet join objet on categorieobjet.idobjet=objet.idobjet where idcategorie= ? ";
            $query=$this->db->query($sql,$idcate);
            return $query->result_array();

    }
    // fonction qui prends les informations sur un categorie
    public function getAbout($idcate){
        $sql="SELECT * FROM CATEGORIE WHERE IDCATEGORIE= ? ";
        $query=$this->db->query($sql,$idcate);
        $row=$query->row_array();
        return $row;
    }
    //fonction qui assure l'update de la modification
    public function UpdateModif($idcate,$nomcate){
        $sql="UPDATE CATEGORIE SET NOMCATEGORIE=%s WHERE IDCATEGORIE=%d";
        $sql=sprintf($sql,$this->db->escape($nomcate),$idcate);
         $this->db->query($sql);
       
    }
    // fonction qui insere la modification d'une categorie
    public function InsertCate($Nomcate){
        $sql="INSERT INTO CATEGORIE VALUES(null,%s)";
        $sql=sprintf($sql,$this->db->escape($Nomcate));
        $this->db->query($sql);
    }
    // fonction qui supprime une categorie
    public function deleteCate($idcate){
        $sql="DELETE FROM CATEGORIE WHERE IDCATEGORIE= ? ";
        $this->db->query($sql,$idcate);
    }
}