<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Registration_mod extends CI_Model 
{
    public function insertUser($nomUser,$prenomUser,$email,$motDePasse,$dateDeNaissance)
    {
        $request="Insert into user values(null,0,'%s','%s','%s','%s','%s')";
        $request=sprintf($request,$nomUser,$prenomUser,$email,$motDePasse,$dateDeNaissance);
        echo $request;
        $this->db->query($request);
    }
}
?>