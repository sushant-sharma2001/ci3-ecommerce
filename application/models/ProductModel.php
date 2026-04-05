<?php
defined('BASEPATH') or exit();

class ProductModel extends CI_Model{

    public function add_product($post){
        $post['category'] = base64_decode($post['category']);
        $post['added_on'] = date('d-m-y');
        $post['slug'] = $this->slug($post['pro_name']);
        // echo"<pre>";print_r($post);
        $q = $this->db->insert('ec_product',$post);
        if($q){
            $this->session->unset_userdata('pro_id');
            return true;
        }
        else{
            return false;
        }
    }

    public function slug($string){
        $slug = strtolower($string); 
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}
?>