<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeEchange_mod extends CI_Model {
// fonction qui prends la liste des categories
    public function getAllObjets(){
        $request="Select * from objet";
        $query=$this->db->query($request);
        return $query->result_array();
    }
    public function getUser($id){
        $request="Select * from user where idUser = $id";
        $query=$this->db->query($request);
        return $query->result_array();
    }
    public function getObjet($id){
        $request="Select * from Objet where idobjet = $id";
        $query=$this->db->query($request);
        return $query->result_array();
    }
    //fonction qui prends les tableaux d'appartennance
    public function getTabByObjet(){
        $tab=array();
        $id=$this->getAllObjets();
        $result=array();
        for($i=0;$i<count($id);$i++){
           $tab1=$this->getTabOneSideLeft($id[$i]['idObjet']);
           $tab2=$this->getTabOneSideRight($id[$i]['idObjet']);
           $result[]=array(0=>$tab1,1=>$tab2);
        }
        return $result;
    }
    public function getTabOneSideLeft($id){
        $sql="SELECT * FROM ECHANGE WHERE IDOBJET1=$id AND IDETAT=1";
        $query=$this->db->query($sql);
        $tab=$query->result_array();
        $answer=array();
        foreach($tab as $row){
            $array['objet']=$row['idObjet1'];
            $array['proprio']=$row['idUser2'];
            $array['temp']=$row['dateAcceptation'];
            $answer[]=$array;
        }
        return $answer;
    }
    public function getTabOneSideRight($id){
        $sql="SELECT * FROM ECHANGE WHERE IDOBJET2=$id AND IDETAT=1";
        $query=$this->db->query($sql);
        $tab=$query->result_array();
        $answer=array();
        foreach($tab as $row){
            $array['objet']=$row['idObjet2'];
            $array['proprio']=$row['idUser1'];
            $array['temp']=$row['dateEchange'];
            $answer[]=$array;
        }
        return $answer;
    }
}