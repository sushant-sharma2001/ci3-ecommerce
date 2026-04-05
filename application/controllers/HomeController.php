<?php
defined('BASEPATH') or exit();

class HomeController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('user_id')){
            
        }
        else{
            $this->session->set_userdata('user_id',mt_rand(11111,99999));
        }
    }

    public function index()
    {   
        $data['banners'] = $this->hm->get_banners();
        // dd($data['banners']);
        $data['categories'] = $this->hm->get_categories();
        // dd($data['categories']);
        $data['products'] = $this->hm->get_products();
        // dd($data['products']);
        $this->load->view('front/index',$data);
    }

    public function product_details($slug){
        $data['product'] = $this->hm->product_details($slug); 
        // dd($data['details']);
        $this->load->view('front/product-details',$data);
    }
}
