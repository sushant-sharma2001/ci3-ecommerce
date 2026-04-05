<?php
defined('BASEPATH') or exit();

class AuthModel extends CI_Model{
    
    public function register($post){
        $data['user_id'] = mt_rand(11111,99999);
        $data['user_name'] = $post['name'];
        $data['email'] = $post['email'];
        $data['password'] = password_hash($post['password'],PASSWORD_BCRYPT);
        $data['status'] = 1;
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['added_on'] = date('y-m-d');

        $this->db->insert('ec_users',$data);
    }

    public function login($post){
        $q = $this->db->where(['email'=>$post['email'],'status'=>1])->get('ec_users');

        if($q->num_rows()){
            $arr = $q->row(); 
            $db_pass = $arr->password;
            $username = $arr->user_name; 
            if(password_verify($post['password'],$db_pass)){
                $this->session->set_userdata('login_id',$arr->user_id);
                $this->session->set_userdata('username',$username);
                $this->db->where('user_id',$this->session->userdata('user_id'))->update('ec_cart',['user_id'=>$arr->user_id]);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
?>