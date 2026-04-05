<?php
defined('BASEPATH') or exit();

class CategoryController extends CI_Controller
{

    // public function __construct(){
    //     parent::__construct();
    //     $this->load->model('categorymodel','cm');
    // }
    public function index()
    {   $this->form_validation->set_rules([
            [
                'field' => 'cate_name',
                'label' => 'Category Name',
                'rules'=> 'required|trim',
            ],
            [
                'field' => 'status',
                'label'=> 'Status',
                'rules' => 'required|trim',
            ],
        ]);
        if(empty($_FILES['cate_image']['name'])){
            $this->form_validation->set_rules('cate_image', 'Category Image', 'required');
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
            $this->upload->do_upload('cate_image');
            $image = $this->upload->data();
            $post['cate_image'] = $image['file_name'];

            $check = $this->cm->add_category($post);
            if($check){
                $this->session->set_flashdata('msg','data inserted successfully');
                redirect('category-index');
            }
        }
        else{
            $data['title'] = 'Category';
            $data['categories'] = $this->cm->all_category();
            $this->load->view('category',$data);
        }
    }

    public function get_subcategory(){

        $cate_id = base64_decode($this->input->get('cate_id'));
        print_r($this->cm->get_subcategory($cate_id));
    }

}
