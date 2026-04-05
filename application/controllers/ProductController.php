<?php
defined('BASEPATH') or exit();

class ProductController extends CI_Controller{

    public function index(){
        $this->form_validation->set_rules('pro_id', 'Product Id', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('pro_name', 'Product Name', 'required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('brand', 'Product Brand', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('featured', 'Featured', 'required|in_list[1,2]');
        $this->form_validation->set_rules('highlights', 'Highlights', 'required|min_length[5]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');
        $this->form_validation->set_rules('stock', 'Product Stock', 'required|integer|greater_than_equal_to[0]');
        $this->form_validation->set_rules('mrp', 'Product MRP', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('selling_price', 'Product Selling Price', 'required|numeric|greater_than[0]|less_than_equal_to['.$this->input->post('mrp').']');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');
        if(empty($_FILES['pro_main_image']['name'])){
            $this->form_validation->set_rules('pro_main_image', 'Product Image', 'required');
        }

        if($this->form_validation->run()){
            $post = $this->input->post();
            $config = array(
                'upload_path' => './uploads',
                'allowed_types' => 'png|jpg|jpeg|gif',
                'max_size' => 2048,
                'encrypt_name' => true,
            );

            $this->upload->initialize($config);
            $this->upload->do_upload('pro_main_image');
            $image = $this->upload->data();
            $post['pro_main_image'] = $image['file_name'];

            $check = $this->pm->add_product($post);
            if($check){
                $this->session->set_flashdata('msg','data added successfully');
                redirect('product-index');
            }
        }
        else{
            $data['title'] = 'Product';
            $data['pro_id'] = mt_rand(11111,99999);
            $data['categories'] = $this->cm->all_category();
            $this->load->view('product',$data);
        }
    }
}
?>