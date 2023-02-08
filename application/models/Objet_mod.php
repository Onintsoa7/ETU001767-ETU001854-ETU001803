<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objet_mod extends CI_Model {
    // fonction qui recupere les objets appartenat a  un utilisateur specifique
    public function getAllObjetByUser($iduser){
        $sql="SELECT * FROM OBJET WHERE IDUSER= ? ";
        $query=$this->db->query($sql,$iduser);
        return $query->result_array();
    }
    //fonction qui recupere les donees d'un objet par son id
    public function getAbout($idObj){
        $sql="SELECT * FROM OBJET WHERE IDOBJET= ? ";
        $query=$this->db->query($sql,$idObj);
        return $query->row_array();
    }
    // fonction update de l'objet
    public function Update($id,$nom,$prix){
        $sql="UPDATE OBJET SET nomObjet='%s',prixObjet=%u WHERE IDOBJET=%u";
        $sql= sprintf($sql,$nom,$prix,$id);
        $this->db->query($sql);
      
    }

    // fonction qui insere les donnees d'un objet
    public function Insert($id,$nom,$prix){
        $sql="INSERT INTO OBJET VALUES(null,'%s',%d,%d)";
        $sql=sprintf($sql,$nom,$prix,$id);
        $this->db->query($sql);
    }
     // fonction qui insere les donnees dans photo
     public function InsertPic($file){
        $id=$this->getLastIdObjet();
        for ($i=0; $i < count($file); $i++) { 
            $sql="INSERT INTO PHOTOS VALUES(null,$id,'$file[$i]')";
             $this->db->query($sql);
        }
                
    } 
    //fonction qui insere dans table categorieobjet
    public function InsertObjCat($idcate){
        $idobj=$this->getLastIdObjet();
        for ($i=0; $i <count($idcate) ; $i++) { 
            $sql="INSERT INTO CATEGORIEOBJET VALUES(null,$idcate[$i],$idobj)";
            $this->db->query($sql);
        }
        
    }
    // fonction qui update dans table categorieobjet
    public function UpdateObjCat($idcate,$objet){
        $allCat=$this->getAllObjCategorie($objet);
        for ($i=0; $i <count($idcate) ; $i++) { 
            if($allCat[$i]==null){
                $sql="INSERT INTO CATEGORIEOBJET VALUES(null,$idcate[$i],$objet)";
                $this->db->query($sql);
            }else {
                // var_dump($allCat);
                $sql="UPDATE CATEGORIEOBJET SET IDCATEGORIE= $idcate[$i] WHERE  idCatObjet=?";
                $this->db->query($sql, $allCat[$i]['idCatObjet']);
               
            }
        }
       
    }
    // fonction quibprends les id de objet categories
    public function getAllObjCategorie($objet){
        $sql="SELECT * FROM CATEGORIEOBJET  WHERE  idobjet=$objet";
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    // fonction qui prends le dernier indice
    public function getLastIdObjet(){
        $sql="SELECT idObjet FROM Objet ORDER BY idObjet DESC LIMIT 1";
        $query=$this->db->query($sql);
        $row=$query->row_array();

        return $row['idObjet'];
    }
    //fonction qui prens les categories d'un objet
    public function getCateByObjet($idobjet){
        $sql="SELECT * FROM CATEGORIEOBJET where idobjet=$idobjet";
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    // fonction qui supprime un objet
    public function Delete($idObjet){
        $sql="DELETE FROM OBJET WHERE IDOBJET= ? ";
        $this->db->query($sql,$idObjet);
    }
    // finction qui update dans photos
    public function UpdatePic($files,$id){
       $indPic=$this->getIdOfPic($id);
       if($indPic == null){
        for ($i=0; $i <count($files); $i++) { 
        $sql = "INSERT into photos Values (null,$id,'$files[$i]')";
        }
       }else{
        for ($i=0; $i <count($files); $i++) { 
           $sql="UPDATE PHOTOS set photopath='$files[$i]' WHERE IDPHOTOS= ?";
           
           $this->db->query($sql,$indPic[$i]['idPhotos']);
        }
       }
    }
    public function getIdOfPic($id){
        $sql="SELECT * FROM PHOTOS where idobjet=$id";
        $query=$this->db->query($sql);
        return $query->result_array();
    }


}