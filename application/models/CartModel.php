<?php
defined('BASEPATH') or exit();

class CartModel extends CI_Model{
    private $userId = '';
    public function __construct(){
        parent::__construct();
        $this->userId = $this->get_user_id();
    }

    public function get_user_id(){
        if($this->session->userdata('login_id')){
            return $this->session->userdata('login_id');
        }
        else{
            return $this->session->userdata('user_id');
        }
    }

    public function get_cart(){
        $q = $this->db->where('user_id',$this->userId)->get('ec_cart');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }
    
    public function add_to_cart($post){
        $exists = $this->db->where(['pro_id'=>$post['pro_id'],'user_id'=>$this->userId])->get('ec_cart');
        if($exists->num_rows()){
            return false;
        }
        else{
            // echo"<pre>";print_r($post);
            $q = $this->db
                 ->select('pro_name,selling_price,slug,pro_main_image')
                 ->where('pro_id',$post['pro_id'])
                 ->get('ec_product');
            if($q->num_rows()){
            // echo"<pre>";print_r($q->row());
                $details = $q->row();
    
                $data['cart_id'] = mt_rand(11111,99999);
                $data['user_id'] = $this->userId;
                $data['pro_id'] = $post['pro_id'];
                $data['pro_qty'] = $post['cart_qty'];
                $data['added_on'] = date('y-m-d');
                $data['pro_name'] = $details->pro_name;
                $data['pro_price'] = $details->selling_price;
                $data['slug'] = $details->slug;
                $data['pro_image'] = $details->pro_main_image;
            // echo"<pre>";print_r($data);
                $this->db->insert('ec_cart',$data);
                return true;
            }
            else{
                return false;
            }
        }

    }

    public function update_cart($post){
        // dd($post);
        foreach($post['upd_pro_id'] as $index => $pro_id){
            $qty = $post['upd_qty'][$index];
            // echo $qty.'<br>';
            $q = $this->db->where(['pro_id'=>$pro_id,'user_id'=>$this->userId])->update('ec_cart',['pro_qty'=>$qty]);
        }
        return true;
    }

    public function delete_product($id){
        $q = $this->db
            ->where(['pro_id'=>$id,'user_id'=>$this->userId])->delete('ec_cart');
        if($q){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_total(){
        $q = $this->db
            ->select('sum(pro_price) as total_price') 
            -> where(['user_id'=>$this->userId])->get('ec_cart');
        if($q->num_rows()){ 
            $total = $q->row()->total_price;
            if($total > 499 ){
                return array('subtotal' => $total,'grandtotal' => $total,'delivery'=>0);
            }else{
                return array('subtotal'=>$total,'grandtotal' => $total + 50,'delivery'=>50);
            }
        }else{
            return false;
        }
    }
}
?>