<?php
defined('BASEPATH') or exit();

class CartController extends CI_Controller{

    public function index(){
        $data['carts'] = $this->cartm->get_cart();
        $data['total'] = $this->cartm->get_total();
        // dd($data);
        $this->load->view('front/cart',$data);
    }

    public function add_to_cart(){
        $post = $_POST;
        
        $check = $this->cartm->add_to_cart($post);
        if($check){
            $this->session->set_flashdata('msg','added to cart successfully');
            redirect('cart-index');
        }
        else{
            $this->session->set_flashdata('msg','already added to cart');
            redirect('cart-index');
        }
    }

    public function update_cart(){
        $post = $this->input->post();
        // dd($post);
        $check = $this->cartm->update_cart($post);
        if($check){
            $this->session->set_flashdata('msg','cart updated successfully');
            redirect('cart-index');
        }else{
            $this->session->set_flashdata('msg','cart can not be updated');
            redirect('cart-index');
        }
    }

    public function remove_product(){
        $pro_id = base64_decode($this->uri->segment(2));
        $check = $this->cartm->delete_product($pro_id);
        if($check){
            $this->session->set_flashdata('msg','product deleted successfully');
            redirect('cart-index');
        }else{
            $this->session->set_flashdata('msg','product not deleted!');
            redirect('cart-index');
        }
    }
}
?>