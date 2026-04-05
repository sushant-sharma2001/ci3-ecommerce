<?php
defined('BASEPATH') or exit();

class DashboardController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('components/header', $data);
        $this->load->view('index');
        $this->load->view('components/footer');
    }
}
