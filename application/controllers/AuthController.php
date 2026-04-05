<?php
defined('BASEPATH') or exit();

class AuthController extends CI_Controller{
    
    public function index(){
        if($this->session->userdata('login_id')){
            $this->load->view('front/checkout');
        }
        else{
            redirect('user-login');
        }
    }

    public function login(){
        if($this->session->userdata('login_id')){
            redirect('cart-checkout');
        }
        $this->form_validation->set_rules('email','email','required|trim|valid_email');
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]');

        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->am->login($post);
            if($check){
                redirect('cart-checkout');
            }
            else{
                $this->session->set_flashdata('msg','invalid credentials');
                redirect('user-login');
            }
        }
        else{
            $this->load->view('front/login');
        }
    }

    public function register(){
        $this->form_validation->set_rules('name',' name','required|trim');
        $this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[ec_users.email]');
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->am->register($post);
        }
        else{
            $this->load->view('front/register');
        }
    }

    public function logout(){
        // $this->session->unset_userdata('login_id');
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
?>