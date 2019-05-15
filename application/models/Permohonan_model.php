<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Permohonan_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    
    function getPermohonanInfoByEmail($userId)
    {
      return $this->db->query("SELECT * FROM tbl_fppc Where userId =".$userId);
    }
        
    function addNew_Fppc($tr_mst_fppc)
    {
      
        $this->db->trans_start();
        $this->db->insert('tbl_fppc', $tr_mst_fppc);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function getdetailfppc($no_fppc)
    {
      return $this->db->query("SELECT * FROM dtl_fppc Where no_fppc =".$no_fppc);
    }
    
}

?>