<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Mysession.php');

class Category_Con extends Mysession {
    public function index(){
        $data=array();
        $data['cate']=$this->ListeCategories();
        $data['content']='category';
        
        $this->load->view('template',$data);
    }
    // Fonction qui prends la liste des categories 
    public function ListeCategories(){
        $this->load->model('category_mod');
        $array=array();
        $array=$this->category_mod->getListeCategories();
        return $array;
    }

    // fonction qui prends la liste des objets avec leur proprietaire
    public function ListeObjetParCategories(){
       $this->load->model('category_mod');
        
        $idCate= $this->input->get('idCate');
        $data=array();
        $data['cate']=array();
        $data['cate']=$this->ListeCategories();

        $data['proprio']=array();

        $this->load->model('category_mod');
        $data['objet']=array();
        $data['objet'] = $this->category_mod->getListeObjetParCategories($idCate);

        foreach($data['objet'] as $row){
            $data['proprio'][]=$this->getProprietaire($row['idObjet']);
        }
        $data['content']='category';
        $this->load->view('template',$data);
    }

    // fonction qui prends le nom d'un proprietaire
    public function getProprietaire($idpro){
        $this->load->model('category_mod');
        $nom=$this->category_mod->getProprietaire($idpro);
        return $nom;
    }
    // fonction qui redirige vers la page modifier
    public function Modifier(){
        $idCate=$this->input->get('idCate');
        $data=array();
        $data['info']=$this->getAbout($idCate);
        $data['content']="modif_cate";
        $this->load->view("template",$data);
    }
    public function Insert(){
        $data=array();
        $data['content']="insert_cate";
        $this->load->view("template",$data);
    }
    // Traitement de la modification
    public function TraitModif(){
        $idCate=$this->input->post('idcate');
        $Nomcate=$this->input->post('name_cate');
        $this->load->model("category_mod");
        $this->category_mod->UpdateModif($idCate,$Nomcate);
        redirect(site_url("category_con"));

    }
    // Traitement insertion de la categorie
    public function TraitInsert(){
        $Nomcate=$this->input->post('nom_cate');
        $this->load->model("category_mod");
        $this->category_mod->InsertCate($Nomcate);
        redirect(site_url("category_con"));
    }
    //Treitement pour la suppresion
    public function TraitSuppr(){
        $idcate=$this->input->get('idCate');
        $this->load->model("category_mod");
        $this->category_mod->deleteCate($idcate);
        redirect(site_url("category_con"));

    }
    // Fonction qui appelle la fonction getAboutCate
    public function getAbout($idCate){
        $this->load->model("category_mod");
        $array=$this->category_mod->getAbout($idCate);
        return $array;
    }

    



}