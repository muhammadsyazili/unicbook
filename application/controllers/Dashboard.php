<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function index()
    {
        $data_header['title'] = 'Dashboard';
        $data_header['backgroud'] = 'assets/bg.jpg';

        $this->load->view('templates/header', $data_header);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
