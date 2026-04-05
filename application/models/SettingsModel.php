<?php
defined('BASEPATH') or exit();

class SettingsModel extends CI_Model{
    public function add_pincode($post){
        $q = $this->db->insert('ec_pincode',$post);
        
        if($q){
            return true;
        }else{
            return false;
        }
    }

    public function add_banner($post){
        
        $post['added_on'] = date('d-M-y');
        $post['bann_id'] = mt_rand(11111,99999);
        $q = $this->db->insert('ec_banner',$post);

        if($q){
            return true;
        }
        else{
            return false;
        }
    }
}
?>