<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fiche_mod extends CI_Model {
// fonction qui prends la liste des categories
    public function getListeCategories(){
        $query=$this->db->query("SELECT * FROM CATEGORIE");
        return $query->result_array(); 
    }

     // fonction qui prends la liste des objets
     public function getAllObjet($id,$idUser){
        if($id == 0){
            $sql="SELECT objet.*,categorie.*,user.nomUser from categorieobjet 
            join objet on categorieobjet.idobjet=objet.idobjet 
            join categorie on categorieobjet.idCategorie = categorie.idCategorie
            join user on user.idUser = objet.idUser 
            where user.idUser != $idUser";
        }else if($id > 0){
            $sql="SELECT objet.*,categorie.*,user.nomUser ,photos.*  from categorieObjet 
                join objet on categorieobjet.idobjet=objet.idobjet 
                join categorie on categorieobjet.idCategorie = categorie.idCategorie
                join user on user.idUser = objet.idUser
                 join photos on photos.idObjet=categorieObjet.idObjet 
                where user.idUser = $idUser";
        }else if($id == -1){
            $sql="SELECT objet.*,categorie.*,user.nomUser,photos.* from categorieObjet 
                join objet on categorieobjet.idobjet=objet.idobjet 
                join categorie on categorieobjet.idCategorie = categorie.idCategorie
                join user on user.idUser = objet.idUser
                 join photos on photos.idObjet=categorieObjet.idObjet 
                where objet.idObjet = $idUser";
        }
                $query=$this->db->query($sql);
                return $query->result_array();
        }
    
        public function insertEchange($idObjet1,$idObjet2,$idUser1,$idUser2)
            {
                $request="Insert into Echange values(null,%u,%u,%u,%u,now(),null,3)";
                $request=sprintf($request,$idObjet1,$idObjet2,$idUser1,$idUser2);
                echo $request;
                $this->db->query($request);
            }
}