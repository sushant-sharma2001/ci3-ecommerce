<?php
defined('BASEPATH') or exit();

class Settings extends CI_Controller{

    public function pincode(){
        $this->form_validation->set_rules('pincode','Pincode','required|trim');
        $this->form_validation->set_rules('deliver_charge','Delivery Charge','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim',['required'=>'please select a status']);

        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->sm->add_pincode($post);
            if($check){
                $this->session->set_flashdata('msg','data inserted successfully');
                redirect('pincode-index');
            }
        }
        else{
            $data['title'] = 'Settings';
            $this->load->view('pincode',$data);
        }
    }

    public function banner(){
        if(empty($_FILES['bann_image']['name'])){
            $this->form_validation->set_rules('bann_image','Banner','required|trim',['required'=>'please upload a document']);
        }
        $this->form_validation->set_rules('status','Status','required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config = array(
                'upload_path' =>'./uploads',
                'allowed_types'=>'gif|jpg|png|jpeg',
                'max_size' => 2048,
                'encrypt_name' =>true
            );
            $this->upload->initialize($config);
            $this->upload->do_upload('bann_image');
            $image = $this->upload->data();
            $post['bann_image'] = $image['file_name'];

            $check = $this->sm->add_banner($post);
            if($check){
                $this->session->set_flashdata('msg','data inserted successfully');
                redirect('banner-index');
            }
        }
        else{
            $data['title'] = 'Banner';
            $this->load->view('banner',$data);
        }
    }
}
?>