<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Search_mod extends CI_Model 
{
    public function search($search,$idCategorie)
    {
        if($idCategorie != 0){
            $sql = "Select * from categorie where idCategorie = %u";
            $sql = sprintf($sql,$idCategorie);
        }else if($idCategorie == 0){
            $sql = "Select * from categorie";
        }
        $query=$this->db->query($sql);
        $category = $query->result_array(); /* 
        $sql1 = array(); 
        $a = 0;
        $sql1 = "Select * from categorieObjet";
        $query1=$this->db->query($sql1);
        $categoryObjet = $query1->result_array(); 
        $cat = array();
        $a = 0;
        for($i = 0; $i < count($categoryObjet); $i++){
            for($u = 0; $u< count($category); $u++){
                if($categoryObjet[$i]['idCategorie'] == $category[$u]['idCategorie']){
                    $cat[$a] = $categoryObjet[$i];
                    $a++;
                }else{
                }
            }
        }
        $answer = array();
        echo count($cat); */
        for($i = 0; $i<count($category); $i++){
            $sql = "SELECT objet.*,categorie.*,user.* from categorieobjet 
            join objet on categorieobjet.idobjet=objet.idobjet 
            join categorie on categorieobjet.idCategorie = categorie.idCategorie
            join user on user.idUser = objet.idUser
            where categorie.idCategorie = %u and objet.nomObjet LIKE '%s%s%s'";
            $sql = sprintf($sql,$category[$i]['idCategorie'],'%',$search,'%');
            $query=$this->db->query($sql);
            $answer[] = $query->result_array(); 
        }
        if($search == null){
            return null;
        }
        return $answer;
    }
}
?>