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
        $data_header['title'] = 'Home';
        $data_header['backgroud'] = 'assets/bg.jpg';
        $this->load->view('templates_administrator/header', $data_header);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('auth/dashboard');
        $this->load->view('templates_administrator/footer');
    }
}
