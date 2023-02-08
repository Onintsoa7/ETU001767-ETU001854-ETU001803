<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Login_mod extends CI_Model 
{
    public function getAllUser($mail,$mdp)
    {
        $request="Select * from user where email='%s' and motDePasse='%s'";
        $request=sprintf($request,$mail,$mdp);
        $tab = $this->db->query($request);
        $test = array();
        foreach($tab -> result_array() as $row){
            $test['idUser'] = $row['idUser'];
            $test['isAdmin'] = $row['isAdmin'];
        }
        if($test != 0){
            return $test['idUser'][0];
        }else{
            return 0;
        }
    }
}
?>