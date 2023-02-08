<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Mysession.php');

class Objet_con extends Mysession {
    public function index(){
        $data=array();
        $data['content']="gestion_obj";
        $data['objet']=$this->getAllObjetByUser();

        $this->load->view("template",$data);
    }
    // prends tous les objets appartenat a un utilsateur
    public function getAllObjetByUser (){
        $array = $this->session->get_userdata('user');
        $data=array();
        $this->load->model("objet_mod");
       $data=$this->objet_mod->getAllObjetByUser($array['user']);
        //$data=$this->objet_mod->getAllObjetByUser(1);
        return $data;
    }
    //fonction qui dirige vers la page modifier
    public function Modifier(){
        $this->load->helper('form'); 
        $idObj=$this->input->get("idObj");
        $data=array();

        $this->load->model("objet_mod");
        $data['info']=$this->objet_mod->getAbout($idObj);
        
        $this->load->model("category_mod");
        $data['cate']=$this->category_mod->getListeCategories();
        $data['catChoosed']=$this->objet_mod->getCateByObjet($idObj);
        $data['content']="modif_obj";
        $this->load->view("template",$data);

    }
    // traitement de la modification
    public function TraitModif(){

        $nom=$this->input->post("nom");
        $prix=$this->input->post("prix");
        $id=$this->input->post("id");
        $idcate=$this->input->post("idcate[]");

        $this->load->model("objet_mod");
        
       $files=$this->do_upload();
       
         $this->objet_mod->Update($id,$nom,$prix);
        $this->objet_mod->UpdateObjCat($idcate,$id);
         $this->objet_mod->UpdatePic($files,$id);

        redirect(site_url("objet_con"));

    }
    // Traitement insertion
    public function TraitInsert(){
        $nom=$this->input->post("nom");
        $prix=$this->input->post("prix");
        $idcate=$this->input->post("idcate[]");

       $files= $this->do_upload();
        $array = $this->session->get_userdata('user');
         $this->load->model("objet_mod");
         $this->objet_mod->Insert($array['user'],$nom,$prix);
     //   $this->objet_mod->Insert(1,$nom,$prix);
         $this->objet_mod->InsertObjCat($idcate);
         $this->objet_mod->InsertPic($files);

        redirect(site_url("objet_con"));

    }
    // Traitement de delete
    public function Delete(){
        $idObj=$this->input->get("idObj");
        $this->load->model("objet_mod");
        $this->objet_mod->Delete($idObj);

        redirect(site_url("objet_con"));

    }
    //redirection page insertion
    public function InsertObject(){
        $this->load->helper('form'); 
       $data=array();
       $data['content']="insert_obj";
       $this->load->model("category_mod");
       $data['cate']=$this->category_mod->getListeCategories();
       $this->load->view("template",$data);

    }
    // fonction qui upload ficher
    public function do_upload() { 
        
        $config['upload_path']   ="./assets/Image/"; 
        $config['allowed_types'] = 'gif|jpg|png|avif|webp|jpeg'; 
        $config['max_size']      = 100000000000; 
        $config['max_width']     = 1024000000000; 
        $config['max_height']    = 7680000000;  
        $this->load->library('upload', $config);
           $file=array();
        if ( ! $this->upload->do_upload('file')) {
           $error = array('error' => $this->upload->display_errors()); 
           //$this->load->view('insert_obj', $error); 
        }
        else { 
           $data = array('upload_data' => $this->upload->data()); 
           $file[]= $_FILES['file']['name'];
        } 
        
        if ( ! $this->upload->do_upload('file1')) {
            $error = array('error' => $this->upload->display_errors()); 
           // $this->load->view('insert_obj', $error); 
           echo $error;
         }
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $file[]= $_FILES['file1']['name'];
         } 
         if ( ! $this->upload->do_upload('file2')) {
            $error = array('error' => $this->upload->display_errors()); 
           // $this->load->view('insert_obj', $error); 
         }
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $file[]= $_FILES['file2']['name'];
         } 
         return $file;
     } 



}