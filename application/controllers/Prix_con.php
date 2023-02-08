<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Mysession.php');

class Prix_con extends Mysession {
    public function index(){

        }
     // fonction qui recupere les produits au marge de +/-20%
    public function twenty(){
        $idObj=$this->input->get("idObj");
        $taux=0.02;
        $prix=$this->getPrice($idObj);
        $valInf=$prix-($prix*0.02);
        $valSup=$prix+($prix*0.02);

        $data=array(); 
        $data['prix']= $prix;
        $data['valInf']=$valInf;
        $data['valSup']= $valSup;
        
        $data['content']="prod_estim";
        $data['TabObj']=$this->tab_Obj($valInf,$valSup,$idObj);
      
        $this->load->view("template",$data);
    }
    // fonction qui recupere les produits au marge de +/- 10%
    public function ten(){
        $idObj=$this->input->get("idObj");
        $taux=0.01;
        $prix=$this->getPrice($idObj);
        $valInf=$prix - ($prix * $taux);
        $valSup=$prix + ($prix * $taux);

        $data=array(); 
        $data['prix']= $prix;
        $data['valInf']=$valInf;
        $data['valSup']= $valSup;
        $data['content']="prod_estim";

        $data['TabObj']=$this->tab_Obj($valInf,$valSup,$idObj);
      
        $this->load->view("template",$data);
    }
    // fonction qui prends le prix d'un objet
    public function getPrice($idObj){
        $this->load->model("prix_mod");
        $prix= $this->prix_mod->getPrice($idObj);
        return $prix;
    }
    // fonction qui prends les tables ayant une difference de 10%
    public function tab_Obj($valInf,$valSup,$id){
        $this->load->model("prix_mod");
        $tab=$this->prix_mod->getTabBetween($valInf,$valSup,$id);
        return $tab;

    }
}