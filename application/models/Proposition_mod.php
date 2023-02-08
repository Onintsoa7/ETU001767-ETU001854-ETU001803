<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Proposition_mod extends CI_Model 
{
    public function getAllMyProposition($idUser){
        $request="Select echange.*,objet.nomObjet,user.* from echange 
        join objet on objet.idObjet = echange.idObjet1 
        join user on user.idUser = echange.idUser2
        where idUser1 = %u and (idEtat = 3 or dateAcceptation = null)";
        $request=sprintf($request,$idUser);
        $query=$this->db->query($request);
        return $query->result_array();
    }

    public function getPropoById($idObjet){
        $request="Select * from echange where idObjet1 = %u and (idEtat = 3 or dateAcceptation = null) ";
        $request=sprintf($request,$idObjet);
        echo $request;
        $query=$this->db->query($request);
        return $query->result_array();
    }
    public function updateProposition($idEtat,$idEchange) //1 Accepter   2 Refuser
    {
        if($idEtat == 2){
            $request="Update echange set idEtat = %u where idEchange = %u";
            $request=sprintf($request,$idEtat,$idEchange);
        }else if($idEtat == 1){
            $request="Update echange set idEtat = %u,dateAcceptation = now() where idEchange = %u";
            $request=sprintf($request,$idEtat,$idEchange);
        }
        echo $request;
    $this->db->query($request);
    }
    
    public function updateRefusDoffice($idObjet) //1 Accepter   2 Refuser
    {
            $request="Update echange set idEtat = 2 where idObjet1 = %u and idEtat = 3";
            $request=sprintf($request,$idObjet);
            echo $request;
        $this->db->query($request);
    }
    
    public function updateProprietaire($idUser,$idObjet) //1 Accepter   2 Refuser
    {
            $request="Update objet set idUser = %u where idObjet = %u";
            $request=sprintf($request,$idUser,$idObjet);
            echo $request;
       $this->db->query($request);
    }
    public function getTheProposition($idEchange){
        $request="Select * from echange  where idEchange = %u";
        $request=sprintf($request,$idEchange);
        $query=$this->db->query($request);
        return $query->result_array();
    }
}
?>