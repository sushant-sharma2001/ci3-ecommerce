<?php
defined('BASEPATH') or exit();

class HomeModel extends CI_Model{
    public function get_banners(){
        $q = $this->db
            ->where('status',1)
            ->order_by('id','asc')
            ->get('ec_banner');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_categories(){
        $q = $this->db
            ->where('status',1)
            ->order_by('id','asc')
            ->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_products(){
        $q = $this->db
            ->where('status',1)
            ->get('ec_product');

        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function category_name($id){
        $q = $this->db
            ->where('cate_id',$id)
            ->get('ec_category');
        // echo"<pre>";print_r($q->row());die;
        if($q->num_rows()){
            return $q->row()->cate_name;
        }
        else{
            return false;
        }
    }

    public function product_details($slug){
        $q = $this->db
            ->where(['slug'=>$slug,'status'=>1])
            ->get('ec_product');
        if($q->num_rows()){
            return $q->row();
        }
        else{
            return false;
        }
    }
}
?>